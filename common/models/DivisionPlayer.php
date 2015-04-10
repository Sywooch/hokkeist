<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "division_player".
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
 * @property integer $division_team_id
 * @property integer $player_id
 * @property integer $number
 * @property integer $role_id
 * @property integer $is_captain
 * @property integer $in_game
 * @property string $description
 * @property integer $med
 * @property integer $player_status
 * @property string $strah_date
 *
 * @property User $creator
 * @property Season $season
 * @property Competition $competition
 * @property Division $division
 * @property DisivionTeam $divisionTeam
 * @property Player $player
 * @property Role $role
 */
class DivisionPlayer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'division_player';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'sort', 'created_at', 'updated_at', 'creator_id', 'updator_id', 'season_id', 'competition_id', 'division_id', 'division_team_id', 'player_id', 'number', 'role_id', 'is_captain', 'in_game', 'med', 'player_status'], 'integer'],
            [['created_at', 'creator_id', 'season_id', 'competition_id', 'division_id', 'division_team_id', 'player_id', 'role_id', 'is_captain', 'player_status'], 'required'],
            [['description'], 'string'],
            [['strah_date'], 'safe']
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
            'division_team_id' => 'Команда дивизиона',
            'player_id' => 'ID игрока',
            'number' => 'Игровой номер',
            'role_id' => 'Амплуа',
            'is_captain' => 'Капитан',
            'in_game' => 'В заявке на игру',
            'description' => 'Служебное описание игрока',
            'med' => 'Медицинский осмотр',
            'player_status' => 'Статус игрока в команде',
            'strah_date' => 'Strah Date',
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
    public function getDivisionTeam()
    {
        return $this->hasOne(DisivionTeam::className(), ['id' => 'division_team_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlayer()
    {
        return $this->hasOne(Player::className(), ['id' => 'player_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Role::className(), ['id' => 'role_id']);
    }
}
