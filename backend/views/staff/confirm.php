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
            'id',
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
    <?= Html::submitButton(Yii::t('app', 'Confirm'), [
        'class' => 'btn btn-primary',
        'data' => [
            'method' => 'post',
        ]
    ]) ?>
    <?= Html::a(Yii::t('app', 'Hủy'), ['index'], ['class' => 'btn btn-danger'
    ]) ?>
    <?php ActiveForm::end(); ?>
</div>
