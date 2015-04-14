<?php

namespace frontend\widgets;

use common\models\Player;

class PlayerBlock extends \yii\base\Widget {

    public function init() {
        parent::init();

        $model = Player::find()->limit(5)->where('status = ' . \common\models\BaseModel::STATUS_ACTIVE)->all();

        if ($model)
            echo $this->render('playerBlock', ['model' => $model]);
    }

}
