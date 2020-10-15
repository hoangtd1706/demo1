<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Department;

/* @var $this yii\web\View */
/* @var $model backend\models\Staff */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="staff-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'staff_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'staff_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'staff_tel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dep_id')->dropDownList(ArrayHelper::map(Department::find()->where(['status' => 1])->all(), 'id', 'dep_name')) ?>

    <?= $form->field($model, 'status')->dropDownList([
        [
            1 => 'Hoạt động',
            2 => 'Không hoạt động'
        ],
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
