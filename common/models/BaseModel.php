<?php

namespace common\models;

use Yii;
use \yii\imagine\Image;

//use Imagine\Image\Box;
//use Imagine\Gd\Imagine;

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
class BaseModel extends \yii\db\ActiveRecord {

    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;

    protected $_imgPath = "";
    protected $_imgSizes = [];
    protected $_tempDir = "@frontend/temp/";
    protected $_emptyImgUrl = NULL;
//    protected $image_;


    static function useImages() {
        return FALSE;
    }

    static function useFiles() {
        return FALSE;
    }

    static function usePhotos() {
        return FALSE;
    }

    static function useMap() {
        return FALSE;
    }

    /**
     * @return Изображение материала
     */
    public function getImage($type = '_medium', $options = array()) {
        return $this->imageLink ? \yii\helpers\Html::img($this->getImageLink($type), $options) : NULL;
    }

    public function getImageLink($type = '_medium', $small = false, $empty = true) {
        if (isset($this->_imglink[$type]))
            return $this->_imglink[$type];

        $url = Yii::$app->params['frontendUrl'];
        $path = $this->id . $type . '.jpg';
        if (is_file($this->getImgPath() . $path)) {
            $this->_imglink[$type] = $url . $this->_img . $path . '?ver=' . $this->imagever;
            return $this->_imglink[$type];
        }
        return $empty ? static::getEmptyImageUrl($this, $small) : NULL;
    }

//    public $imagever;
//    protected $_image;

    public function getImgPath() {
        return Yii::getAlias($this->_imgPath);
    }

    public function getImgSizes() {
        return $this->_imgSizes;
    }

    public function getTempDir() {
        return Yii::getAlias($this->_tempDir);
    }

    public function beforeSave($insert) {
        parent::beforeSave($insert);

        $file = \yii\web\UploadedFile::getInstance($this, 'image_');
        if ($file)
            $this->image_ = $file;

        $user_id = Yii::$app->user->identity->id;
        if ($this->isNewRecord) {
            $this->created_at = time();
            $this->creator_id = $user_id;
        } else {
            $this->updated_at = time();
            $this->updator_id = $user_id;
        }

        //Удаление изображения если это необходимо
        if ($this->deleteImage)
            static::deleteImage($this);

        if ($this->image_ && isset($this->imagever))
            $this->imagever++;

        return true;
    }

    public function afterSave($insert, $changedAttributes) {
        parent::afterSave($insert, $changedAttributes);

        if (static::useImages() && !empty($this->image_))
            self::generateLoadedImage($this);
    }
    
    static function getEmptyImageUrl(BaseModel $model, $small = false) {
        return !$small ?  Yii::getAlias($model->_emptyImgUrl) : Yii::getAlias($model->_emptySmallImgUrl);
    }

    static function generateLoadedImage(BaseModel $model) {
        static::deleteImage($model);

        $tempDir = $model->getImgPath();
        $dir = $model->getImgPath();
        $original = $dir . $model->id . '_original.jpg';

        if (!is_dir($dir))
            mkdir($dir);
//        die($original);
//        \yii\helpers\VarDumper::dump($model->image_);
//        die();
        ini_set('upload_max_filesize','20000');
        if (@$model->image_->saveAs($original)) {
            foreach ($model->getImgSizes() as $key => $size) {
                $img = Image::getImagine()->open($original);
                $size_ = $img->getSize();
                $ratio = $size_->getWidth() / $size_->getHeight();
                $width = $size[0];
                $height = !isset($size[1]) ? round($width / $ratio) : $size[1];

                Image::thumbnail($original, $width, $height)
                        ->save($dir . $model->id . $key . '.jpg', ['quality' => 80]);
            }
        } else {
            Yii::$app->session->setFlash('error', "Ошибка при сохранении изображения: " . $model->image_->error);
        }
    }

    static function deleteImage(BaseModel $model) {
        $dir = $model->getImgPath();
        foreach ($model->getImgSizes() as $key => $size) {
            @unlink($dir . $model->id . $key . '.jpg');
        }
        @unlink($dir . $model->id . '_original.jpg');
    }

    public function beforeDelete() {
        parent::beforeDelete();

        if (static::useImages())
            static::deleteImage($this);
    }

//    public static function active($query) {
//        $query->andWhere('status = ' . self::STATUS_ACTIVE);
//    }

    public static function find() {
        return parent::find()->andWhere('status = ' . self::STATUS_ACTIVE);
    }

    public static function findAnyWhere() {
        return parent::find()->orderBy('status DESC, sort ASC, id DESC');
    }

    public function getCreator() {
        return $this->hasOne(User::className(), ['id' => 'creator_id']);
    }

    public function getUpdator() {
        return $this->hasOne(User::className(), ['id' => 'updator_id']);
    }

    public function getActiveArray() {
        return [self::STATUS_ACTIVE => 'Активный', self::STATUS_DELETED => 'Не активный'];
    }

    public function getCreatedDate() {
        return Yii::$app->formatter->asDate($this->created_at);
    }

    public function delete() {
        $this->status = self::STATUS_DELETED;
        return $this->save();
    }

    public function getStatusLabel() {
        return $this->status == self::STATUS_ACTIVE ? 'Да' : 'Удален';
    }

    static function loadImage($id, $image) {

        return true;
    }

}
