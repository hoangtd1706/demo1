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
                <?php $form = ActiveForm::begin(); ?>
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
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
                        [
                            'attribute' => 'status',
                            'value' => function ($model) {
                                return $model->status == 1 ? 'Hoạt động' : 'Không hoạt động';
                            }
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

                        <?= $form->field($model, 'dep_id') ?>

                        <?= $form->field($model, 'status') ?>
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
        </div>
    </div>
</div>
