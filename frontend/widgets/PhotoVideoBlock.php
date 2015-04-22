<?php

namespace frontend\widgets;

use common\models\PhotoGallery as Gallery;

class PhotoVideoBlock extends \yii\base\Widget {

    public function init() {
        parent::init();

        $model = Gallery::find()->orderBy('sort, id DESC')->where('status = ' . \common\models\BaseModel::STATUS_ACTIVE)->one();

        if ($model)
            echo $this->render('photoVideoBlock', ['model' => $model]);
    }

}
