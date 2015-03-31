<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "season".
 *
 * @property integer $id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 * @property integer $sort
 * @property integer $status
 * @property integer $creator
 * @property integer $changed
 *
 * @property User $creator0
 */
class Season extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'season';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name','sort'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['sort', 'status', 'creator_id', 'updator_id'], 'integer'],
            [['name'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '#ID',
            'name' => 'Наименование',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата обновления',
            'sort' => 'Сортировка',
            'status' => 'Статус',
            'creator_id' => 'Создал',
            'updator_id' => 'Изменил',
        ];
    }

}
