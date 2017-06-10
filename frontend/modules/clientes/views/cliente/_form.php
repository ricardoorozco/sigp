<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\clientes\models\Cliente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cliente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'documento_numero')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'primer_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'segundo_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'primer_apellido')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'segundo_apellido')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefono_principal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefonos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'direccion_principal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'direcciones')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ubicacion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
