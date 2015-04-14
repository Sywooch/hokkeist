<?php

namespace frontend\widgets;

class SimplySearchBlock extends \yii\base\Widget {

    public $options = array();

    public function init() {
        parent::init();

        if ($this->options['visible'])
            echo $this->render('simplySearchBlock');
    }

}
