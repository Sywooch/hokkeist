<?php

namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class User extends BaseModel implements IdentityInterface {

    const ROLE_USER = 1;
    const ROLE_MANAGER = 5;
    const ROLE_ADMIN = 10;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
//            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            //Регистрация (создание)
            [['username', 'password', 'email', 'first_name', 'last_name'], 'required', 'on' => 'register'],
            [['username', 'email'], 'unique', 'on' => 'register'],
            [['username', 'email'], 'trim', 'on' => 'register'],
            //Обновление
            [['username', 'email', 'first_name', 'last_name'], 'required', 'on' => 'update'],
            [['username'], 'checkLogin', 'on' => 'update'],
//            [['email'], 'checkEmail', 'on' => 'update'],
            //Авторизация
            [['username', 'password'], 'required', 'on' => 'login'],
            ['email', 'email'],
            [['sort','role'], 'integer'],
//            ['email', 'checkEmail', 'on' => 'register'],;
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
            [['role'], 'in', 'range'=> ['1','5','10']],
        ];
    }

    public function checkLogin($attribute) {

        $search = static::find()->where(['=', 'LOWER(username)', mb_strtolower($this->username)])
                        ->andWhere(['!=', 'id', $this->id])->one();
        if ($search)
            $this->addError($attribute, 'Такой логин уже существует');

        return true;
    }

    public function checkEmail($attribute) {
        
    }

    public function attributeLabels() {
        return [
            'status' => 'Активность',
            'username' => 'Логин',
            'password' => 'Пароль',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата обновления',
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'creator_id' => 'Добавил',
            'updator_id' => 'Обновил',
            'role' => 'Роль'
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id) {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null) {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username) {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token) {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
                    'password_reset_token' => $token,
                    'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token) {
        if (empty($token)) {
            return false;
        }
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        $parts = explode('_', $token);
        $timestamp = (int) end($parts);
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId() {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey() {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey) {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password) {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password) {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey() {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken() {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken() {
        $this->password_reset_token = null;
    }

    public function beforeSave($insert) {
        if ($this->isNewRecord) {
            $this->created_at = Yii::$app->formatter->asDate('now', 'yyyy-MM-dd H:i:s');
        } else {
            $this->updated_at = Yii::$app->formatter->asDate('now', 'yyyy-MM-dd H:i:s');
        }
        return $insert;
    }

    public function getFullName($link = false, $options = []) {
        $name = $this->first_name . ' ' . $this->last_name;
        return $link ? \yii\helpers\Html::a($name, ['/user/view', 'id' => $this->id], $options) : $name;
    }

    public function getFullNameWithLogin($link = false, $options = []) {
        $name = $this->first_name . ' ' . $this->last_name . ' (' . $this->username . ')';
        return $link ? \yii\helpers\Html::a($name, ['/user/view', 'id' => $this->id], $options) : $name;
    }

}
