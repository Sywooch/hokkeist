<?php

namespace common\models;

use Yii;
use \Imagine\Gmagick\Image;

/**
 * This is the model class for table "player".
 *
 * @property integer $id
 * @property string $firstname
 * @property string $lastname
 * @property string $middlename
 * @property string $birthday
 * @property integer $height
 * @property double $weight
 * @property string $grip
 * @property string $role_id
 * @property string $death_date
 * @property string $birth_place
 * @property string $email
 * @property string $phone
 * @property integer $pass_serial
 * @property integer $pass_number
 * @property string $pass_issue_date
 * @property string $pass_issued
 * @property string $foreign_pass
 * @property string $address
 * @property integer $city_id
 * @property integer $sort
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $creator_id
 * @property integer $updator_id
 * @property integer $status
 * @property integer $team_id
 *
 * @property City $city
 * @property Team $team
 */
class Player extends BaseModel {

    public $image;
    protected $_imgPath = "@frontend/web/uploads/player/";
    protected $_img = "/uploads/player/";
    protected $_imgSizes = ['_small' => ["58", "58"], '_medium' => ["265", "265"], '_large' => ["800"]];
    public $image_;
    public $deleteImage;
    
    protected $_emptyImgUrl = "/img/template/player_empty.jpg";
    protected $_emptySmallImgUrl = "/img/template/player_small_empty.jpg";
    
    protected $_imglink = array();

    static function useImages() {
        return true;
    }

    static function useFiles() {
        return true;
    }

    static function usePhotos() {
        return true;
    }

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'player';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
//            [['firstname', 'lastname', 'birthday', 'height', 'grip', 'role_id', 'phone', 'city_id'], 'required'],
            [['firstname', 'lastname', 'birthday', 'city_id', 'id_'], 'required'],
            [['birthday', 'death_date', 'pass_issue_date'], 'safe'],
            [['height', 'role_id', 'pass_serial', 'pass_number', 'city_id', 'sort', 'created_at', 'updated_at', 'creator_id', 'updator_id', 'status', 'team_id', 'deleteImage'], 'integer'],
            [['weight'], 'number'],
            [['grip'], 'string'],
            [['firstname', 'lastname', 'middlename', 'email', 'pass_issued'], 'string', 'max' => 100],
            [['birth_place', 'foreign_pass', 'address'], 'string', 'max' => 150],
            [['phone'], 'string', 'max' => 50],
            [['birth_certificate', 'id_'], 'string', 'max' => 20],
            [['image_'], 'image', 'skipOnEmpty' => true],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'firstname' => 'Имя',
            'lastname' => 'Фамилия',
            'middlename' => 'Отчество',
            'birthday' => 'Дата рождения',
            'height' => 'Рост',
            'weight' => 'Вес',
            'grip' => 'Хват',
            'role_id' => 'Амплуа',
            'death_date' => 'Дата смерти',
            'birth_place' => 'Место рождения',
            'email' => 'Email',
            'phone' => 'Телефон',
            'pass_serial' => 'Серия',
            'pass_number' => 'Номер',
            'pass_issue_date' => 'Дата выдачи',
            'pass_issued' => 'Кем выдан',
            'foreign_pass' => 'Иностранный паспорт',
            'address' => 'Адрес',
            'city_id' => 'Город',
            'sort' => 'Сортировка',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата обновления',
            'creator_id' => 'Создал',
            'updator_id' => 'Обновил',
            'status' => 'Активный',
            'team_id' => 'Команда',
            'id_' => 'Идентификационный номер',
            'birth_certificate' => 'Серия и номер св-ва о рождении',
            'image_' => 'Основная фотография игрока',
            'deleteImage' => 'Удалить изображение',
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
    public function getTeam() {
        return $this->hasOne(Team::className(), ['id' => 'team_id']);
    }

    public function getRole() {
        return $this->hasOne(PlayerRole::className(), ['id' => 'role_id']);
    }

    public function getTeamList() {
        $model = Team::find()->orderBy('city_id, sort, name')->all();
        $return = [];

        if (empty($model))
            return $return;

        foreach ($model as $item) {
            if (!isset($return[$item->city->name])) {
                $return[$item->city->name] = [$item->id => $item->name];
            } else {
                $return[$item->city->name][$item->id] = $item->name;
            }
        }
        return $return;
    }

    public function getAge() {
        $datetime = new \DateTime($this->birthday);
        $interval = $datetime->diff(new \DateTime(date("Y-m-d")));
//        return '1213';
        return $interval->format("%Y") == "00" ? "-" : $interval->format("%Y");
    }

    public function getFullname() {
        return $this->lastname . ' ' . $this->firstname . ' ' . $this->middlename;
    }

    public function beforeSave($insert) {
        parent::beforeSave($insert);

        $this->birthday = Yii::$app->formatter->asDate($this->birthday, 'yyyy-MM-dd');
        return true;
    }

}
