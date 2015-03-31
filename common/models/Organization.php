<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "organization".
 *
 * @property integer $id
 * @property string $name
 * @property string $fullname
 * @property string $abbr
 * @property integer $city
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $address
 * @property string $phone
 * @property string $email
 * @property string $about
 * @property integer $creator
 * @property integer $updator
 * @property integer $status
 *
 * @property City $city0
 * @property User $creator0
 */
class Organization extends BaseModel {

    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'organization';
    }

    public static function find() {
        return parent::find()->orderBy('id DESC');
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name', 'fullname', 'city', 'created_at', 'creator'], 'required'],
            [['city_id', 'created_at', 'updated_at', 'creator_id', 'updator_id', 'status'], 'integer'],
            [['about'], 'string'],
            [['name', 'abbr', 'phone', 'email'], 'string', 'max' => 100],
            [['fullname', 'address'], 'string', 'max' => 255],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'fullname' => 'Полное наименование',
            'abbr' => 'Аббревиатура',
            'city_id' => 'Город',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата обновления',
            'address' => 'Адрес',
            'phone' => 'Телефон',
            'email' => 'Email',
            'about' => 'Об организации',
            'creator_id' => 'Создал',
            'updator_id' => 'Обновил',
            'status' => 'Активный',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity() {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreator() {
        return $this->hasOne(User::className(), ['id' => 'creator_id']);
    }

}
