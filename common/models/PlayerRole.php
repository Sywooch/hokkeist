<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "player_role".
 *
 * @property integer $id
 * @property string $name
 * @property string $short
 *
 * @property DivisionPlayer[] $divisionPlayers
 * @property Player[] $players
 */
class PlayerRole extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'player_role';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'short'], 'required'],
            [['name', 'short'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'short' => 'Short',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDivisionPlayers()
    {
        return $this->hasMany(DivisionPlayer::className(), ['role_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlayers()
    {
        return $this->hasMany(Player::className(), ['role_id' => 'id']);
    }
}
