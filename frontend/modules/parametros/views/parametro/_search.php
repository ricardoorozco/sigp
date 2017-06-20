<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\parametros\models\ParametroSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="parametro-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'modulo_id') ?>

    <?= $form->field($model, 'codigo') ?>

    <?= $form->field($model, 'etiqueta') ?>

    <?= $form->field($model, 'posibles_valores') ?>

    <?php // echo $form->field($model, 'valor') ?>

    <?php // echo $form->field($model, 'tipo_de_dato') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
