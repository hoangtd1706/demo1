<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap4\ActiveForm;
use backend\models\Department;

/* @var $this yii\web\View */

$this->title = Yii::t('app', 'Confirm');
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary"><?= Html::encode($this->title) ?></h4>
    </div>
    <div class="card-body">
        <div class="table-responsive p-1">
            <div class="department-form">
                <h3 class="alert alert-success">Xác nhận thông tin</h3>
                <?php if ($act == 'create'): ?>
                    <h5>Ấn nút Ok để ghi thông tin vào DB</h5>
                <?php endif; ?>
                <?php if ($act == 'update'): ?>
                    <h5>Ấn nút Ok để ghi thông tin vào DB</h5>
                <?php endif; ?>
                <?php if ($act == 'delete'): ?>
                    <h5>Ấn nút Delete để xóa thông tin từ DB</h5>
                <?php endif; ?>
                <?php $form = ActiveForm::begin(); ?>
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id',
                        'staff_name',
                        'staff_email',
                        'staff_tel',
                        [
                            'attribute' => 'dep_id',
                            'value' => function ($model) {
                                if ($model->dep_id == 0) {
                                    return "Không thuộc phòng ban nào";
                                } else {
                                    $dep = Department::find()->where(['id' => $model->dep_id])->one();
                                    return $dep->dep_name;
                                }
                            }
                        ],
                    ],
                ]) ?>
                <div class="department-form">

                    <div class="d-none">
                        <?php $form = ActiveForm::begin(); ?>

                        <?= $form->field($model, 'staff_name')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'staff_email')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'staff_tel')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'dep_id') ?>

                        <?= $form->field($model, 'status') ?>
                    </div>
                    <div class="form-group d-flex justify-content-center">
                        <?php if ($act == 'create'): ?>
                            <?= Html::submitButton('Ok', ['class' => 'btn btn-success m-2']) ?>
                            <?= \yii\helpers\Html::a('Back', ['create'], ['class' => 'btn btn-outline-danger m-2']) ?>
                        <?php endif; ?>
                        <?php if ($act == 'update'): ?>
                            <?= Html::submitButton('Ok', ['class' => 'btn btn-primary m-2']) ?>
                            <?= \yii\helpers\Html::a('Back', Yii::$app->request->referrer, ['class' => 'btn btn-outline-danger m-2']) ?>
                        <?php endif; ?>
                        <?php if ($act == 'delete'): ?>
                            <?= Html::submitButton('Delete', ['class' => 'btn btn-danger m-2']) ?>
                            <?= \yii\helpers\Html::a('Back', Yii::$app->request->referrer, ['class' => 'btn btn-outline-danger m-2']) ?>
                        <?php endif; ?>

                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
