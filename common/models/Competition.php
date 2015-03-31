<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "competition".
 *
 * @property integer $id
 * @property integer $status
 * @property integer $sort
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $creator_id
 * @property integer $updator_id
 * @property integer $season_id
 * @property string $name
 * @property string $fullname
 * @property integer $is_now
 * @property integer $is_request_now
 * @property integer $transition_type
 * @property integer $is_modered
 * @property integer $is_closed
 * @property string $hashtag
 * @property integer $for_import
 *
 * @property User $creator
 */
class Competition extends BaseModel
{
        const FOR_IMPORT = 10;
        const IS_CLOSED = 10;
        const IS_MODERED = 10;
        const IS_NOW = 10;
        const IS_REQUEST_NOW = 10;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'competition';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'sort', 'created_at', 'updated_at', 'creator_id', 'updator_id', 'season_id', 'is_now', 'is_request_now', 'transition_type', 'is_modered', 'is_closed', 'for_import'], 'integer'],
            [['season_id', 'name'], 'required'],
            [['name', 'fullname'], 'string', 'max' => 255],
            [['hashtag'], 'string', 'max' => 150]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status' => 'Активно',
            'sort' => 'Сортировка',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата обновления',
            'creator_id' => 'Создал',
            'updator_id' => 'Обновил',
            'season_id' => 'Сезон',
            'name' => 'Наименование',
            'fullname' => 'Полное наименование',
            'is_now' => 'Текущее соревнование',
            'is_request_now' => 'Заявочная компания',
            'transition_type' => 'Тип перехода',
            'is_modered' => 'Промодерировано',
            'is_closed' => 'Закрыто',
            'hashtag' => 'Хештег',
            'for_import' => 'Импортировать',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreator()
    {
        return $this->hasOne(User::className(), ['id' => 'creator_id']);
    }
    
    public function getSeason()
    {
        return $this->hasOne(Season::className(), ['id' => 'season_id']);
    }
}
