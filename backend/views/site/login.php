<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */

/* @var $model \common\models\LoginForm */

/* @var $error \backend\controllers\SiteController */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Login';
?>
<div class="site-login">
    <div class="col-sm-12 col-md-4 mt-4">
        <div class="">
            <!-- <h1 class="h4 text-gray-900 mb-4"><? /*= Html::encode($this->title) */ ?></h1>-->
            <p>Hãy nhập LoginID và Password</p>
        </div>

        <?php $form = ActiveForm::begin(['class' => 'user', 'id' => 'login-form']); ?>
        <?php echo $form->errorSummary($model); ?>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">LoginID</label>
            <div class="col-sm-10">
                <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'class' => 'form-control form-control-user'])->label(false) ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control form-control-user'])->label(false) ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
                <?= $form->field($model, 'rememberMe')->checkbox(['class' => 'custom-control-input']) ?>
            </div>
        </div>


        <div class="form-group d-flex justify-content-center">
            <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-user', 'name' => 'login-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>