<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\StaffSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="staff-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>


    <div class="row">
        <?= $form->field($model, 'staff_name',['options' => ['class' => 'col-lg-4']])->textInput()->input('text', ['placeholder' => "Nhập tên nhân viên"])->label(false); ?>
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php // echo $form->field($model, 'dep_name') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>


    <?php ActiveForm::end(); ?>

</div>
