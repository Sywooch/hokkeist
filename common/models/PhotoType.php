<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "photo_type".
 *
 * @property integer $id
 * @property string $name
 * @property integer $width
 * @property integer $height
 *
 * @property PhotoFiles[] $photoFiles
 */
class PhotoType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'photo_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['width', 'height'], 'integer'],
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
            'name' => 'Наименование типа',
            'width' => 'Ширина',
            'height' => 'Высота',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhotoFiles()
    {
        return $this->hasMany(PhotoFiles::className(), ['type_id' => 'id']);
    }
}
