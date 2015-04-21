<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;
/**
 * This is the model class for table "photo_gallery".
 *
 * @property integer $id
 * @property integer $status
 * @property integer $sort
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $creator_id
 * @property integer $updator_id
 * @property string $name
 * @property string $description
 * @property integer $count_photos
 * @property integer $hits
 *
 * @property PhotoFiles[] $photoFiles
 * @property User $creator
 */
class PhotoGallery extends BaseModel {

    protected $_imgPath = "@frontend/web/uploads/gallery/";
    protected $_img = "/uploads/gallery/";
    protected $_imgSizes = ['_small' => ["125", "70"], '_medium' => ["334", "192"], '_large' => ["1280"]];
    public $image_;
    public $images_;
    public $deleteImage;
    public $deleteImages;
    public $close;
    protected $_imglink = array();

    static function useImages() {
        return true;
    }

    static function usePhotos() {
        return true;
    }

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'photo_gallery';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['status', 'sort', 'created_at', 'updated_at', 'creator_id', 'updator_id', 'count_photos', 'hits'], 'integer'],
            [['name'], 'required'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['image_'], 'image', 'skipOnEmpty' => true, 'extensions' => 'jpeg, png, jpg'],
            [['images_'], 'image', 'skipOnEmpty' => true, 'extensions' => 'jpeg, png, jpg', 'maxFiles' => 40],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'status' => 'Статус',
            'sort' => 'Сортировка',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата обновления',
            'creator_id' => 'Создал',
            'updator_id' => 'Обновил',
            'name' => 'Наименование',
            'description' => 'Описание',
            'count_photos' => 'Количество фотографий в альбоме',
            'hits' => 'Количество просмотров',
            'image_' => 'Обложка альбома',
            'images_' => 'Фотографии',
            'deleteImage' => 'Удалить обложку альбома',
            'deleteImages' => 'Удалить все фотографии',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhotoFiles() {
        return $this->hasMany(PhotoFiles::className(), ['gallery_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreator() {
        return $this->hasOne(User::className(), ['id' => 'creator_id']);
    }

    public function beforeSave($insert) {
        parent::beforeSave($insert);
        $model->images_ = UploadedFile::getInstances($model, 'images_');

        return true;
    }

//    public function afterSave($insert, $changedAttributes) {
//        parent::afterSave($insert, $changedAttributes);
//
//        if ($model->images_ && $model->validate()) {
//            foreach ($model->images_ as $file) {
//                echo $file->baseName . '<br />';
////                    $file->saveAs('uploads/' . $file->baseName . '.' . $file->extension);
//            }
//            die();
//        }
//    }

}
