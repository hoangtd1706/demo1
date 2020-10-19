<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Department;

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

        <div class="col-sm-12 col-md-6">
            <?= $form->field($model, 'staff_name') ?>
        </div>
        <div class="col-sm-12 col-md-6">
            <?= $form->field($model, 'staff_email') ?>
        </div>
        <div class="col-sm-12 col-md-6">
            <?= $form->field($model, 'dep_id')->dropDownList(ArrayHelper::map(Department::find()->all(),'id','dep_name'),[
                'prompt'=>'--Chon phong ban--',
            ]) ?>
        </div>
        <div class="col-sm-12 col-md-6">
            <?php // echo $form->field($model, 'status') ?>
        </div>
        <div class="col-sm-12 col-md-6"></div>

    </div>



    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
