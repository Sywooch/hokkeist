<?php

namespace frontend\widgets;

class SimplySearchBlock extends \yii\base\Widget {

    public $options = array();

    public function init() {
        parent::init();

        if(\Yii::$app->controller->id == 'search')
            return;
        
        $model = new \frontend\models\SearchForm();
        if ($this->options['visible'])
            echo $this->render('simplySearchBlock', ['model' => $model]);
    }

}
