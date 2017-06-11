<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\prestamos\models\PrestamoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prestamo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cliente_id') ?>

    <?= $form->field($model, 'valor') ?>

    <?= $form->field($model, 'numero_cuotas') ?>

    <?= $form->field($model, 'valor_cuota') ?>

    <?php // echo $form->field($model, 'interes_cuota') ?>

    <?php // echo $form->field($model, 'total_abonado') ?>

    <?php // echo $form->field($model, 'cuota_actual') ?>

    <?php // echo $form->field($model, 'fecha_inicio') ?>

    <?php // echo $form->field($model, 'fecha_fin') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
