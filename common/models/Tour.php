<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tour".
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
 * @property integer $division_id
 * @property integer $stage_id
 * @property string $name
 * @property integer $tour_number
 * @property integer $round
 *
 * @property User $creator
 * @property Season $season
 * @property Competition $competition
 * @property Division $division
 * @property Stage $stage
 */
class Tour extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tour';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'sort', 'created_at', 'updated_at', 'creator_id', 'updator_id', 'season_id', 'competition_id', 'division_id', 'stage_id', 'tour_number', 'round'], 'integer'],
            [['season_id', 'competition_id', 'division_id', 'stage_id', 'name', 'tour_number', 'round'], 'required'],
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
            'division_id' => 'Дивизион',
            'stage_id' => 'Стадия',
            'name' => 'Наименование',
            'tour_number' => 'Номер тура',
            'round' => 'Раунд',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDivision()
    {
        return $this->hasOne(Division::className(), ['id' => 'division_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStage()
    {
        return $this->hasOne(Stage::className(), ['id' => 'stage_id']);
    }
}
