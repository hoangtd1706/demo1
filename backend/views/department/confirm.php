<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */

$this->title = Yii::t('app', 'Confirm');
?>

<div class="department-form">
    <h3 class="alert alert-success">Xác nhận thông tin</h3>
    <?php $form = ActiveForm::begin(); ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'dep_name',
            'dep_desciption',
            'status',
            'created_at:date',
            'updated_at:date',
        ],
    ]) ?>
    <div class="department-form">

        <div class="d-none">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'dep_name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'dep_desciption')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'status')->checkbox() ?>
        </div>
        <div class="form-group">
            <?php if ($act == 'create'): ?>
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            <?php endif; ?>
            <?php if ($act == 'update'): ?>
                <?= Html::submitButton('Update', ['class' => 'btn btn-primary']) ?>
            <?php endif; ?>
            <?php if ($act == 'delete'): ?>
                <?= Html::submitButton('Delete', ['class' => 'btn btn-danger']) ?>
            <?php endif; ?>
            <?= Html::a(Yii::t('app', 'Hủy'), ['index'], ['class' => 'btn btn-outline-danger'
            ]) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

    <?php ActiveForm::end(); ?>
</div>
