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

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'club_id')->dropDownList(ArrayHelper::map(Club::find()->where(['status'=>1])->all(),'id','club_name')) ?>

    <?= $form->field($model, 'staff_id')->dropDownList(ArrayHelper::map(Staff::find()->where(['status'=>1])->all(),'id','staff_name')) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
