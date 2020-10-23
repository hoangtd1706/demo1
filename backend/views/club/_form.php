<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Club */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="club-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'club_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'club_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList([
            1=>'Hoạt động',
        2=>'Không hoạt động',
    ],['prompt'=>'-- Trạng thái --',]
    ) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
