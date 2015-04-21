<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "photo_files".
 *
 * @property integer $id
 * @property string $filename
 * @property integer $type_id
 * @property integer $height
 * @property integer $width
 * @property integer $created_at
 * @property integer $gallery_id
 * @property integer $sort
 *
 * @property PhotoType $type
 * @property PhotoGallery $gallery
 */
class PhotoFile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'photo_files';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['filename', 'height', 'width', 'gallery_id'], 'required'],
            [['type_id', 'height', 'width', 'created_at', 'gallery_id', 'sort'], 'integer'],
            [['filename'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'filename' => 'Наименование файла',
            'type_id' => 'Тип фотографии',
            'height' => 'Высота',
            'width' => 'Ширина',
            'created_at' => 'Дата добавления',
            'gallery_id' => 'Gallery ID',
            'sort' => 'Сортировка',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(PhotoType::className(), ['id' => 'type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGallery()
    {
        return $this->hasOne(PhotoGallery::className(), ['id' => 'gallery_id']);
    }
}
