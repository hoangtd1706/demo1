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
    <?php if ($this->title != "Create Staff"): ?>
        <?= Html::button('Tham gia cau lac bo', [
            'value' => Url::to('http://localhost:1999/demo1/backend/web/club/listsclub?id=' . $model->id),
            'class' => 'btn btn-outline-success', 'id' => 'modalButton'
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

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'staff_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'staff_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'staff_tel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dep_id')->dropDownList(ArrayHelper::map(Department::find()->where(['status' => 1])->all(), 'id', 'dep_name'), [
        'prompt' => '-- Chọn phòng ban --',
    ]) ?>

    <?= $form->field($model, 'status')->dropDownList([
        1 => 'Hoạt động',
        2 => 'Không hoạt động'
    ],
        [
            'prompt' => '-- Trạng thái --'
        ]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Thêm mới'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
