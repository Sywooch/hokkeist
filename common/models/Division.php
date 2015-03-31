<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "division".
 *
 * @property integer $id
 * @property integer $status
 * @property integer $sort
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $creator_id
 * @property integer $updator_id
 * @property integer $season_id
 * @property integer $competition_id
 * @property string $start_year
 * @property string $end_year
 * @property integer $is_modered
 * @property integer $is_closed
 * @property integer $is_bid
 * @property string $name
 *
 * @property User $creator
 * @property Season $season
 * @property Competition $competition
 */
class Division extends BaseModel
{
    const STATUS_MODERED = 10;
    const STATUS_CLOSED = 10;
    const STATUS_BID = 10;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'division';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'sort', 'created_at', 'updated_at', 'creator_id', 'updator_id', 'season_id', 'competition_id', 'is_modered', 'is_closed', 'is_bid'], 'integer'],
            [['season_id', 'competition_id', 'start_year', 'name'], 'required'],
            [['start_year', 'end_year'], 'string', 'max' => 4,'min' => 4],
//            [['start_year', 'end_year'], 'in', 'range' => [ '1940']],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status' => 'Активный',
            'sort' => 'Сортировка',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата обновления',
            'creator_id' => 'Создал',
            'updator_id' => 'Обновил',
            'season_id' => 'Сезон',
            'competition_id' => 'Соревнование',
            'start_year' => 'Ограничение по возрасту от',
            'end_year' => 'Ограничение по возрасту до',
            'is_modered' => 'Промодерирован',
            'is_closed' => 'Закрыт',
            'is_bid' => 'Заявочная компания',
            'name' => 'Наименование',
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
    public function getSeason()
    {
        return $this->hasOne(Season::className(), ['id' => 'season_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompetition()
    {
        return $this->hasOne(Competition::className(), ['id' => 'competition_id']);
    }
}
