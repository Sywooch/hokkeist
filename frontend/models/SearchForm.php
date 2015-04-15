<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class SearchForm extends Model {

    public $text;
    public $target;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
//            [['text'], 'required'],
            [['text', 'target'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'text' => 'Текст поиска',
        ];
    }

}
