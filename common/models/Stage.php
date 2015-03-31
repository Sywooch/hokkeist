<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "stage".
 *
 * @property integer $id
 * @property integer $status
 * @property integer $sort
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $creator_id
 * @property integer $updator_id
 * @property string $name
 * @property integer $season_id
 * @property integer $competition_id
 * @property integer $division_id
 * @property string $type
 * @property integer $tours_count
 * @property integer $round_count
 * @property integer $players_count
 * @property integer $points_win
 * @property integer $points_win_overtime
 * @property integer $points_win_shootouts
 * @property integer $points_draw
 * @property integer $points_defeat
 * @property integer $points_defeat_overtime
 * @property integer $points_defeat_shootouts
 *
 * @property User $creator
 * @property Season $season
 * @property Competition $competition
 * @property Division $division
 */
class Stage extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stage';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'sort', 'created_at', 'updated_at', 'creator_id', 'updator_id', 'season_id', 'competition_id', 'division_id', 'tours_count', 'round_count', 'players_count', 'points_win', 'points_win_overtime', 'points_win_shootouts', 'points_draw', 'points_defeat', 'points_defeat_overtime', 'points_defeat_shootouts'], 'integer'],
            [['name', 'season_id', 'competition_id', 'division_id', 'players_count'], 'required'],
            [['type'], 'string'],
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
            'name' => 'Наименование',
            'season_id' => 'Сезон',
            'competition_id' => 'Соревнование',
            'division_id' => 'Дивизия',
            'type' => 'Тип',
            'tours_count' => 'Количество туров',
            'round_count' => 'Количество раундов',
            'players_count' => 'Количество участников',
            'points_win' => 'Очков за победу',
            'points_win_overtime' => 'Очков за победу в овертайме',
            'points_win_shootouts' => 'Очков за победу по буллитам',
            'points_draw' => 'Очков за ничью',
            'points_defeat' => 'Очков за поражение',
            'points_defeat_overtime' => 'Очков за поражение в овертайме',
            'points_defeat_shootouts' => 'Очков за поражение по булитам',
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
}
