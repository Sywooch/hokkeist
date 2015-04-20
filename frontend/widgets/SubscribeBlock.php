<?php

namespace frontend\widgets;

class SubscribeBlock extends \yii\base\Widget {

    public $options = array();

    public function init() {
        parent::init();

        if(\Yii::$app->controller->id == 'subscribe')
            return;
        
        $model = new \common\models\Subscribe;
        if ($this->options['visible'])
            echo $this->render('subscribeBlock', ['model' => $model]);
    }

}
