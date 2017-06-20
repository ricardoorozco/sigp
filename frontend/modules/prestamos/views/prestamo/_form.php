<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\prestamos\models\Prestamo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prestamo-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php
    $fieldOptions1 = [
        'options' => ['class' => 'form-group has-feedback'],
        'inputTemplate' => '{input}<span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>'
    ];
    ?>
    
    <?= $form->field($model, 'cliente_id', $fieldOptions1)->dropDownList($clientes, ['placeholder' => 'Cliente...',]) ?>

    <?= $form->field($model, 'valor')->textInput() ?>

    <?= $form->field($model, 'numero_cuotas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'valor_cuota')->textInput() ?>

    <?= $form->field($model, 'interes_cuota')->textInput() ?>

    <?= $form->field($model, 'total_abonado')->textInput() ?>

    <?= $form->field($model, 'cuota_actual')->textInput() ?>

    <?= $form->field($model, 'fecha_inicio')->textInput() ?>

    <?= $form->field($model, 'fecha_fin')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
