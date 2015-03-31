<?php

namespace common\models;

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
 * @property integer $modified_at
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
class Article extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'fulltext', 'category_id', 'publish_at'], 'required'],
            [['subtitle', 'fulltext'], 'string'],
            [['category_id', 'created_at', 'modified_at', 'creator_id', 'updator_id', 'status', 'comments', 'showImage', 'hits', 'sort'], 'integer'],
            [['title', 'author_alias', 'imgtitle'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'subtitle' => 'Подзаголовок',
            'fulltext' => 'Текст материала',
            'category_id' => 'Категория',
            'publish_at' => 'Дата публикации',
            'created_at' => 'Дата создания',
            'modified_at' => 'Дата изменения',
            'creator_id' => 'Создал',
            'author_alias' => 'Псевдоним автора',
            'updator_id' => 'Изменил',
            'status' => 'Опублиновано',
            'comments' => 'Комментарии включены',
            'imgtitle' => 'Подпись изображения',
            'showImage' => 'Показывать изображение внутри материала',
            'hits' => 'Просмотров',
            'sort' => 'Сортировка'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(ArticleCategory::className(), ['id' => 'category_id']);
    }
}
