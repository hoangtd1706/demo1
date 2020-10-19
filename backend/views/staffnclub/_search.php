<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Staff;
use backend\models\Club;

/* @var $this yii\web\View */
/* @var $model backend\models\StaffnclubSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="staffnclub-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'club_id')->dropDownList(ArrayHelper::map(Club::find()->all(),'id','club_name'),[
            'prompt'=>'-- Chọn câu lạc bộ --',
    ]) ?>

    <?= $form->field($model, 'staff_id')->dropDownList(ArrayHelper::map(Staff::find()->all(),'id','staff_name'),[
        'prompt'=>'-- Chọn thành viên --',
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Tìm kiếm'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
