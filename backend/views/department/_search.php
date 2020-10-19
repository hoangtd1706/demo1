<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DepartmentSearch */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="department-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <?= $form->field($model, 'dep_name') ?>
        </div>
        <div class="col-sm-12 col-md-6">
            <?= $form->field($model, 'status')->dropDownList(

                [
                    1 => 'Hoạt động',
                    0 => 'Không hoạt động'
                ], ['prompt' => '-- Trạng thái --',]
            ) ?>
        </div>
    </div>
    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Tìm kiếm', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
