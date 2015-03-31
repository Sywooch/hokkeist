<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "stadium".
 *
 * @property integer $id
 * @property string $name
 * @property string $fullname
 * @property string $abbr
 * @property string $address
 * @property string $phone
 * @property string $description
 * @property integer $city_id
 * @property integer $capacity
 * @property string $created_at
 * @property string $updated_at
 * @property integer $sort
 * @property integer $active
 * @property integer $creator_id
 * @property integer $updator_id
 *
 * @property User $creator
 * @property City $city
 */
class Stadium extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stadium';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'city_id'], 'required'],
            [['description'], 'string'],
            [['city_id', 'capacity', 'sort', 'status', 'creator_id', 'updator_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'phone'], 'string', 'max' => 100],
            [['fullname', 'abbr', 'address'], 'string', 'max' => 255]
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
            'fullname' => 'Полное название',
            'abbr' => 'Аббревиатура',
            'address' => 'Адрес',
            'phone' => 'Телефон',
            'description' => 'Описание',
            'city_id' => 'Город',
            'capacity' => 'Вместимость',
            'created_at' => 'Создано',
            'updated_at' => 'Обновлено',
            'sort' => 'Сортировка',
            'status' => 'Активный',
            'creator_id' => 'Создал',
            'updator_id' => 'Изменил',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }
}
