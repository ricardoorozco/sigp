<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\prestamos\models\Prestamo */

$this->title = Yii::t('app', 'Create Prestamo');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Prestamos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prestamo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
