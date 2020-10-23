<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Club;
use backend\models\Staff;

/* @var $this yii\web\View */
/* @var $model backend\models\Staffnclub */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="staffnclub-form">
    <?php if (Yii::$app->session->hasFlash('errorClub')): ?>
        <h4 class="alert alert-danger"><?= Yii::$app->session->getFlash('errorClub') ?></h4>
    <?php endif; ?>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'club_id')->dropDownList(ArrayHelper::map(Club::find()->where(['status' => 1])->all(), 'id', 'club_name'),[
            'prompt'=>'--Chọn câu lạc bộ--',
    ]) ?>

    <?= $form->field($model, 'staff_id')->dropDownList(ArrayHelper::map(Staff::find()->where(['status' => 1])->all(), 'id', 'staff_name'),[
        'prompt'=>'--Chọn thành viên--',
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
