<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Staff */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="staff-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'staff_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'staff_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'staff_tel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dep_name')->dropDownList($dep_name, ['prompt' => '- Chon phong ban -']) ?>

    <?= $form->field($model, 'status')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), [
            'class' => 'btn btn-success',
        ]) ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>
