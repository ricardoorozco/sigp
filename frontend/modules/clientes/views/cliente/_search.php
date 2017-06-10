<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\clientes\models\ClienteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cliente-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'documento_numero') ?>

    <?= $form->field($model, 'primer_nombre') ?>

    <?= $form->field($model, 'segundo_nombre') ?>

    <?= $form->field($model, 'primer_apellido') ?>

    <?php // echo $form->field($model, 'segundo_apellido') ?>

    <?php // echo $form->field($model, 'telefono_principal') ?>

    <?php // echo $form->field($model, 'telefonos') ?>

    <?php // echo $form->field($model, 'direccion_principal') ?>

    <?php // echo $form->field($model, 'direcciones') ?>

    <?php // echo $form->field($model, 'ubicacion') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
