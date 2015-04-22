<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;
use \yii\imagine\Image;

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
    public $gallery;
    public $deleteImage;
    public $deleteImages;
    public $close;
    protected $_imglink = array();
    protected $_galleryPath = '@frontend/web/uploads/gallery/';

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
            [['description','author'], 'string'],
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
            'author' => 'Автор',
            'date' => 'Дата'
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
        $this->images_ = UploadedFile::getInstances($this, 'images_');

        return true;
    }

    public function afterSave($insert, $changedAttributes) {
        parent::afterSave($insert, $changedAttributes);

        if ($this->images_ && $this->validate()) {
            foreach ($this->images_ as $file) {
//                echo $file->baseName . '<br />';
                $name = uniqid() . '.' . $file->extension;
                $dir = Yii::getAlias($this->galleryPath . $this->id . '/');

                if (!is_dir($dir))
                    try {
                        mkdir($dir);
                    } catch (Exception $ex) {
                        throw new \yii\web\HttpException(500, 'Ошибка создания папки для галереи');
                    }

                $types = PhotoType::find()->all();

                if ($file->saveAs($dir . $name)) {

                    $img = Image::getImagine()->open($dir . $name);
                    $size_ = $img->getSize();
                    foreach ($types as $type) {
                        $width = 0;
                        $height = 0;

                        $width = ($type->width == 0) ? $size_->getWidth() : $type->width;
                        $height = ($type->height == 0) ? $size_->getHeight() : $type->height; // round($width / $size_->getWidth() / $size_->getHeight());


                        if (Image::thumbnail($dir . $name, $width, $height)->save($dir . $type->id . '_' . $name, ['quality' => 80])) {
                            $photo = new PhotoFile();
                            $photo->filename = $type->id . '_' . $name;
                            $photo->gallery_id = $this->id;
                            $photo->width = $width;
                            $photo->height = $height;
                            $photo->type_id = $type->id;
                            $photo->save();
                        }
                    }

//                    $size_ = $img->getSize();
//                    $ratio = $size_->getWidth() / $size_->getHeight();
//                    $width = $size[0];
//                    $height = !isset($size[1]) ? round($width / $ratio) : $size[1];
//                    Image::thumbnail($original, $size_->getWidth(), $size_->getHeight())
//                            ->save($dir . $model->id . $key . '.jpg', ['quality' => 80]);
                }
            }
        }
    }

    public function getGalleryPath() {
        return $this->_galleryPath;
    }

    public function getGalleryUrl() {
        return Yii::$app->params['frontendUrl'] . '/uploads/gallery/';
    }
    
    public function getPhotos() {
         return $this->hasMany(PhotoFile::className(), ['gallery_id' => 'id']);
    }

}
