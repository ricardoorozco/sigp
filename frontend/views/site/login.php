<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <a class="hiddenanchor" id="signup"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <h1><?= Yii::t('app', 'Welcome') ?> <?= Yii::t('app', 'to') ?> &nbsp;<i class="fa fa-usd"></i>IGP</h1>
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <div>
                    <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => Yii::t('app', 'Username')])->label(false) ?>
                </div>
                <div>
                    <?= $form->field($model, 'password')->passwordInput(['placeholder' => Yii::t('app', 'Password')])->label(false) ?>
                </div>
                <div>
                    <?= Html::submitButton(Yii::t('app', 'Login'), ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    <?= Yii::t('app', 'If you forgot your password you can') ?> <?= Html::a(Yii::t('app', 'reset it'), ['site/request-password-reset']) ?>.
                </div>
                <?php ActiveForm::end(); ?>
                <div class="clearfix"></div>

                <div class="separator">
                    <div class="clearfix"></div>
                    <br />

                    <div>
                        <h3><?= Yii::t('app', 'Sistema Integral para la Gestion de Prestamos') ?>!</h3>
                        <p>©<?= date('Y') ?> All Rights Reserved. Privacy and Terms.</p>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
