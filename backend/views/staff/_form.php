<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Department;
use backend\models\Club;
use yii\bootstrap4\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Staff */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $clubs backend\models\Club */

$clubs = Club::find()->all();
?>

<div class="staff-form overflow-hidden p-2">

    <?php if ($this->title != "Thêm nhân viên"): ?>
        <?= Html::button('Tham gia câu lạc bộ', [
            'value' => Url::to('http://localhost:1999/demo1/backend/web/club/listsclub?id=' . $model->id),
            'class' => 'btn btn-outline-success mb-4', 'id' => 'modalButton'
        ]) ?>
        <?php
        Modal::begin([
            'title' => 'Tham gia câu lạc bộ',
            'id' => 'modal',
            'size' => 'modal-lg',
        ]);
        echo '<div id="modalContent"></div>';
        Modal::end();
        ?>
    <?php endif; ?>
    <div class="col-12 col-xl-4">
        <?php $form = ActiveForm::begin(); ?>
        <?php echo $form->errorSummary($model); ?>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-3 col-form-label">Tên</label>
            <div class="col-sm-9">
                <?= $form->field($model, 'staff_name')->textInput(['maxlength' => true])->label(false) ?>
            </div>
        </div>

        <div class="form-group row">
            <label for="staticEmail" class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-9">
                <?= $form->field($model, 'staff_email')->textInput(['maxlength' => true])->label(false) ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-3 col-form-label">Tel</label>
            <div class="col-sm-9">
                <?= $form->field($model, 'staff_tel')->textInput(['maxlength' => true])->label(false) ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-3 col-form-label">Phòng ban</label>
            <div class="col-sm-9">
                <?= $form->field($model, 'dep_id')->dropDownList(ArrayHelper::map(Department::find()->where(['status' => 1])->all(), 'id', 'dep_name'), [
                    'prompt' => '-- Chọn phòng ban --',
                ])->label(false) ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-3 col-form-label">Trạng thái</label>
            <div class="col-sm-9">
                <?= $form->field($model, 'status')->dropDownList([
                    1 => 'Hoạt động',
                    2 => 'Không hoạt động'
                ],
                    [
                        'prompt' => '-- Trạng thái --'
                    ])->label(false) ?>
            </div>
        </div>
    </div>
    <div class="col-12 col-xl-6 pl-0">
        <div class="form-group d-flex pl-1">
            <label for="staticEmail" class="col-sm-3 col-xl-2 d-none d-sm-block col-form-label pl-0"></label>
            <div class="col-sm-9 d-flex">
                <?= Html::submitButton(Yii::t('app', $model->isNewRecord ? 'Save' : 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success mr-2' : 'btn btn-primary mr-2']) ?>
                <?php if (!$model->isNewRecord): ?>

                    <?= Html::a('Delete', Url::to(['staff/delete?id='.$model->id]), ['data-method' => 'POST','class'=>'btn btn-danger mr-2']) ?>

                <?php endif; ?>
                <?= \yii\helpers\Html::a('Back', ['index'], ['class' => 'btn btn-outline-danger mr-2']) ?>
            </div>
        </div>
    </div>


    <?php ActiveForm::end(); ?>

</div>
