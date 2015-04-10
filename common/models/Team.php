<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "team".
 *
 * @property integer $id
 * @property integer $status
 * @property integer $sort
 * @property string $created_at
 * @property string $updated_at
 * @property integer $cteator_id
 * @property integer $updator_id
 * @property string $name
 * @property string $abbr
 * @property integer $city_id
 * @property string $phone
 * @property string $email
 * @property string $site
 * @property string $site_nhl
 * @property string $description
 *
 * @property Player[] $players
 * @property City $city
 */
class Team extends BaseModel {

    public $logo;
    protected $_imgPath = "@frontend/web/uploads/team/";
    protected $_img = "/uploads/team/";
    protected $_imgSizes = ['_small' => ["58", "58"], '_medium' => ["265", "265"], '_large' => ["800"]];
    public $image_;
    public $deleteImage;
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
        return 'team';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['status', 'sort', 'city_id', 'creator_id', 'updator_id', 'organization_id', 'deleteImage'], 'integer'],
            [['abbr', 'name', 'city_id', 'organization_id'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['description'], 'string'],
            [['name', 'email', 'site', 'site_nhl'], 'string', 'max' => 255],
            [['abbr', 'phone'], 'string', 'max' => 100],
            [['image_'], 'image', 'skipOnEmpty' => true],
            ['logo', 'file'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'status' => 'Активный',
            'sort' => 'Сортировка',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата обновления',
            'creator_id' => 'Создатель',
            'updator_id' => 'Обновил',
            'name' => 'Название',
            'abbr' => 'Аббревиатура',
            'city_id' => 'Город',
            'phone' => 'Телефон',
            'email' => 'Email',
            'site' => 'Сайт',
            'site_nhl' => 'Сайт в НХЛ',
            'description' => 'Описание команды',
            'logo' => 'Логотип команды',
            'organization_id' => 'Организация',
            'image_' => 'Логотип команды',
            'deleteImage' => 'Удалить логотип'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlayers() {
        return $this->hasMany(Player::className(), ['team_id' => 'id']);
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
    public function getOrganization() {
        return $this->hasOne(Organization::className(), ['id' => 'organization_id']);
    }

    public function getContacts() {
        $phone = $this->phone ? 'тел.: ' . $this->phone . '<br />' : '';
        $email = $this->email ? 'email: ' . $this->email . '<br />' : '';
        $site = $this->site ? 'сайт: ' . $this->site . '' : '';
        return $phone . $email . $site;
    }

}
