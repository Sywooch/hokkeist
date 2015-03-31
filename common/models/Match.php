<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "match".
 *
 * @property integer $id
 * @property integer $status
 * @property integer $sort
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $creator_id
 * @property integer $updator_id
 * @property integer $number
 * @property string $day
 * @property string $time
 * @property integer $team_1
 * @property integer $team_2
 * @property integer $stadium_id
 * @property integer $season_id
 * @property integer $competition_id
 * @property integer $division_id
 * @property integer $stage_id
 * @property integer $group_id
 * @property integer $tour_id
 * @property integer $goal_1
 * @property integer $goal_2
 * @property integer $points_1
 * @property integer $points_2
 * @property string $result
 *
 * @property User $creator
 * @property Team $team1
 * @property Team $team2
 * @property Stadium $stadium
 * @property Season $season
 * @property Competition $competition
 * @property Division $division
 * @property Stage $stage
 * @property Tour $tour
 */
class Match extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'match';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'sort', 'created_at', 'updated_at', 'creator_id', 'updator_id', 'number', 'team_1', 'team_2', 'stadium_id', 'season_id', 'competition_id', 'division_id', 'stage_id', 'group_id', 'tour_id', 'goal_1', 'goal_2', 'points_1', 'points_2'], 'integer'],
            [['day', 'time', 'team_1', 'team_2', 'stadium_id', 'season_id', 'competition_id', 'division_id', 'stage_id'], 'required'],
            [['day', 'time'], 'safe'],
            [['result'], 'string']
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
            'number' => 'Номер матча',
            'day' => 'День',
            'time' => 'Время',
            'team_1' => 'Команда 1',
            'team_2' => 'Команда 2',
            'stadium_id' => 'Место',
            'season_id' => 'Сезон',
            'competition_id' => 'Соревнование',
            'division_id' => 'Дивизион',
            'stage_id' => 'Стадия',
            'group_id' => 'Группа',
            'tour_id' => 'Тур',
            'goal_1' => 'Голы команды \'А\'',
            'goal_2' => 'Голы команды \'Б\'',
            'points_1' => 'Очки команды \'А\'',
            'points_2' => 'Очки команды \'Б\'',
            'result' => 'Результат',
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
    public function getTeam1()
    {
        return $this->hasOne(Team::className(), ['id' => 'team_1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeam2()
    {
        return $this->hasOne(Team::className(), ['id' => 'team_2']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStadium()
    {
        return $this->hasOne(Stadium::className(), ['id' => 'stadium_id']);
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTour()
    {
        return $this->hasOne(Tour::className(), ['id' => 'tour_id']);
    }
}
