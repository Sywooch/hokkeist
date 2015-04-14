<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "article_category".
 *
 * @property integer $id
 * @property string $name
 * @property string $alias
 * @property integer $parent
 * @property integer $status
 * @property string $keywords
 * @property string $description
 *
 * @property Article[] $articles
 */
class ArticleCategory extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'article_category';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name', 'alias'], 'required'],
            [['parent_id', 'status'], 'integer'],
            [['name', 'alias', 'keywords', 'description'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'alias' => 'Псевдоним',
            'parent_id' => 'Родительская категория',
            'status' => 'Статус',
            'keywords' => 'Ключевые слова',
            'description' => 'Описание',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticles() {
        return $this->hasMany(Article::className(), ['category_id' => 'id']);
    }

    public function getParent() {
        return $this->hasOne(ArticleCategory::className(), ['id' => 'parent_id']);
    }

}
