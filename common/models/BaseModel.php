<?php

namespace common\models;

use Yii;

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

    public function beforeSave($insert) {
        parent::beforeSave($insert);

        $user_id = Yii::$app->user->identity->id;
        if ($this->isNewRecord) {
            $this->created_at = time();
            $this->creator_id = $user_id;
        } else {
            $this->updated_at = time();
            $this->updator_id = $user_id;
        }

        return true;
    }

//    public static function active($query) {
//        $query->andWhere('status = ' . self::STATUS_ACTIVE);
//    }

    public static function find() {
        return parent::find()->orderBy('status DESC, sort ASC, id DESC')->andWhere('status = ' . self::STATUS_ACTIVE);
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

}
