<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\controllers\StaffController;

/* @var $this yii\web\View */
/* @var $model backend\models\Staff */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="staff-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'staff_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'staff_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'staff_tel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dep_id')->dropDownList($dataDep,['prompt'=>'- Chon phong ban -']) ?>

    <?= $form->field($model, 'status')->checkbox() ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord?'Create':'update', ['class'=>$model->isNewRecord?'btn btn-success':'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
