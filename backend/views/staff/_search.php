<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Department;

/* @var $this yii\web\View */
/* @var $model backend\models\StaffSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
]); ?>
<div class="form-group row">
    <div class="col-sm-2">
        <?= $form->field($model, 'staff_name')->label(false) ?>
    </div>
    <div class="col-sm-10">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
    </div>
</div>


<div class="col-sm-12 col-md-6">
    <?php //$form->field($model, 'staff_email') ?>
</div>
<div class="col-sm-12 col-md-6">
    <?php //$form->field($model, 'dep_id')->dropDownList(ArrayHelper::map(Department::find()->all(),'id','dep_name'),[ 'prompt'=>'--Chon phong ban--',]) ?>
</div>
<div class="col-sm-12 col-md-6">
    <?php // echo $form->field($model, 'status') ?>
</div>
<div class="col-sm-12 col-md-6"></div>


<?php // echo $form->field($model, 'created_at') ?>

<?php // echo $form->field($model, 'updated_at') ?>


<?php ActiveForm::end(); ?>

