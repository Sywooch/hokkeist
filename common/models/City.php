<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "city".
 *
 * @property integer $id
 * @property string $name
 * @property integer $sort
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 * @property integer $creator
 *
 * @property User $creator0
 * @property Organization[] $organizations
 * @property Player[] $players
 */
class City extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['sort', 'status', 'creator_id', 'updator_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'sort' => 'Сортировка',
            'status' => 'Активный',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата обновления',
            'creator_id' => 'Добавил',
            'updator_id' => 'Изменил',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreator()
    {
        return $this->hasOne(User::className(), ['id' => 'creator_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizations()
    {
        return $this->hasMany(Organization::className(), ['city' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlayers()
    {
        return $this->hasMany(Player::className(), ['city' => 'id']);
    }
}
