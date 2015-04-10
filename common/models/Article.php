<?php

namespace common\models;

use yii\db\ActiveQuery;
use Yii;

/**
 * This is the model class for table "article".
 *
 * @property integer $id
 * @property string $title
 * @property string $subtitle
 * @property string $fulltext
 * @property integer $category_id
 * @property integer $publish_at
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 * @property string $author_alias
 * @property integer $modif_by
 * @property integer $status
 * @property integer $comments
 * @property string $imgtitle
 * @property integer $showImage
 * @property integer $hits
 *
 * @property User $createdBy
 * @property ArticleCategory $category
 */
class Article extends BaseModel {

    protected $_imgPath = "@frontend/web/uploads/article/";
    protected $_img = "/uploads/article/";
    protected $_imgSizes = ['_small' => ["125", "70"], '_medium' => ["320"], '_large' => ["800"]];
    public $image_;
    public $deleteImage;
    public $close;
    
    protected $_imglink = array();

    static function useImages() {
        return true;
    }

    static function useFiles() {
        return true;
    }

    static function usePhotos() {
        return true;
    }

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'article';
    }

    public function beforeSave($insert) {
        parent::beforeSave($insert);
        $this->publish_at = Yii::$app->formatter->format($this->publish_at, 'timestamp');
        return true;
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['title', 'fulltext', 'category_id', 'publish_at'], 'required'],
            [['subtitle', 'fulltext'], 'string'],
            [['category_id', 'created_at', 'updated_at', 'creator_id', 'updator_id', 'status', 'comments', 'showImage', 'hits', 'sort', 'deleteImage', 'imagever'], 'integer'],
            [['title', 'author_alias', 'imgtitle'], 'string', 'max' => 255],
            [['image_'], 'image', 'skipOnEmpty' => true],
            [['close'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'subtitle' => 'Подзаголовок',
            'fulltext' => 'Текст материала',
            'category_id' => 'Категория',
            'publish_at' => 'Дата публикации',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата изменения',
            'creator_id' => 'Создал',
            'author_alias' => 'Псевдоним автора',
            'updator_id' => 'Изменил',
            'status' => 'Опублиновано',
            'comments' => 'Комментарии включены',
            'imgtitle' => 'Подпись изображения',
            'showImage' => 'Показывать изображение внутри материала',
            'hits' => 'Просмотров',
            'sort' => 'Сортировка',
            'image_' => 'Основное изображение',
            'deleteImage' => 'Удалить изображение',
            'imagever' => 'Версия файла изображения'
        ];
    }

    public static function find() {
        return new ArticleQuery(get_called_class());
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy() {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory() {
        return $this->hasOne(ArticleCategory::className(), ['id' => 'category_id']);
    }

    /**
     * @return Ссылку на метериал
     */
    public function getLink($absolute = false) {
        return \yii\helpers\Url::to(['article/view', 'category' => $this->category->alias, 'id' => $this->id], $absolute);
    }

}

class ArticleQuery extends ActiveQuery {

    public function published() {
        return $this->andWhere(['<', 'publish_at', time()])->andWhere(['=', 'status', Article::STATUS_ACTIVE]);
    }

}
