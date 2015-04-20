<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "subscribe".
 *
 * @property integer $id
 * @property string $email
 * @property integer $news
 * @property integer $tour
 * @property integer $status
 * @property string $hash
 */
class Subscribe extends \yii\db\ActiveRecord
{
    CONST STATUS_ACTIVE = 10;
    CONST STATUS_DELETED = 0;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subscribe';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email'], 'required'],
            [['news', 'tour', 'status'], 'integer'],
            [['email'], 'string', 'max' => 255],
            [['hash'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'news' => 'На новости',
            'tour' => 'На предстоящие турниры',
            'status' => 'Статус',
            'hash' => 'Hash',
        ];
    }
    
    public function beforeSave($insert) {
        parent::beforeSave($insert);
        
        $this->generateHash();
        
        return true;
    }
    public function generateHash(){
        $this->hash = md5($this->email . uniqid()); 
    }
}
