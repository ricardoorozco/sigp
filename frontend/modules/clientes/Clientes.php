<?php

namespace frontend\modules\clientes;

/**
 * clientes module definition class
 */
class Clientes extends \yii\base\Module {

    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'frontend\modules\clientes\controllers';

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
