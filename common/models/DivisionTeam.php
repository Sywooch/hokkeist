<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "division_team".
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
 * @property integer $team_id
 * @property integer $final_place
 * @property string $descriotion
 *
 * @property DivisionPersonal[] $divisionPersonals
 * @property DivisionPlayer[] $divisionPlayers
 * @property User $creator
 * @property Season $season
 * @property Competition $competition
 * @property Division $division
 * @property Team $team
 */
class DivisionTeam extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'division_team';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'sort', 'created_at', 'updated_at', 'creator_id', 'updator_id', 'season_id', 'competition_id', 'division_id', 'team_id', 'final_place'], 'integer'],
            [['created_at', 'creator_id', 'season_id', 'competition_id', 'division_id', 'team_id'], 'required'],
            [['descriotion'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status' => 'Статус',
            'sort' => 'Сортировка',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата обновления',
            'creator_id' => 'Создал',
            'updator_id' => 'Обновил',
            'season_id' => 'Сезон',
            'competition_id' => 'Соревнование',
            'division_id' => 'Дивизион',
            'team_id' => 'Команда',
            'final_place' => 'Финальное место',
            'descriotion' => 'Описание',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDivisionPersonals()
    {
        return $this->hasMany(DivisionPersonal::className(), ['division_team_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDivisionPlayers()
    {
        return $this->hasMany(DivisionPlayer::className(), ['division_team_id' => 'id']);
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
    public function getTeam()
    {
        return $this->hasOne(Team::className(), ['id' => 'team_id']);
    }
}
