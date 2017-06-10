<?php

namespace frontend\modules\usuarios;

/**
 * usuarios module definition class
 */
class Usuarios extends \yii\base\Module {

    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'frontend\modules\usuarios\controllers';

    /**
     * @inheritdoc
     */
    public function init() {
        if (\Yii::$app->user->isGuest) {
            \Yii::$app->response->redirect(\Yii::$app->urlManager->createUrl("site/login"));
            \Yii::$app->end();
        }
        parent::init();

        // custom initialization code goes here
    }

}
