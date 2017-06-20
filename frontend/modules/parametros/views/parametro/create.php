<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\parametros\models\Parametro */

$this->title = Yii::t('app', 'Create Parametro');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Parametros'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parametro-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
