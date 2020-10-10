<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */

$this->title = Yii::t('app', 'Confirm');
?>

<div class="staff-view">
    <h3 class="alert alert-success">Xác nhận thông tin</h3>
    <?php $form = ActiveForm::begin(); ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'staff_name',
            'staff_email:email',
            'staff_tel',
            'dep_name',
            [
                'attribute' => 'status',
                'value' => (($model->status == 1) ? "Hoạt động" : "Không hoạt động"),
            ],
            'created_at:date',
            'updated_at:date',
        ],
    ]) ?>
    <div class="department-form">

        <div class="d-none">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'staff_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'staff_email')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'staff_tel')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'dep_name')->textInput() ?>

            <?= $form->field($model, 'status')->checkbox() ?>
        </div>
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            <?= Html::a(Yii::t('app', 'Hủy'), ['index'], ['class' => 'btn btn-danger'
            ]) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

    <?php ActiveForm::end(); ?>
</div>
