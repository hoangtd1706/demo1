<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Department;
use backend\models\Club;

/* @var $this yii\web\View */
/* @var $model backend\models\Staff */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $club backend\models\Club */

$clubs = Club::find()->where(['status'=>1])->all();
?>

<div class="staff-form overflow-hidden">

    <?php $form = ActiveForm::begin(); ?>
    <?php if ($this->title != 'Create Staff'): ?>
    <div class="row">
        <div class="col-sm-12 col-md-6  overflow-hidden">
            <?php endif; ?>
            <?= $form->field($model, 'staff_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'staff_email')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'staff_tel')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'dep_id')->dropDownList(ArrayHelper::map(Department::find()->where(['status' => 1])->all(), 'id', 'dep_name')) ?>

            <?= $form->field($model, 'status')->dropDownList([
                [
                    1 => 'Hoạt động',
                    2 => 'Không hoạt động'
                ],
            ]) ?>
            <?php if ($this->title != 'Create Staff'): ?>
        </div>
        <div class="col-sm-12 col-md-6  overflow-hidden">
            <label class="form-check-label" for="inlineCheckbox1">Câu lạc bộ</label>
            <?= $form->field($club, 'club_id')->checkboxList(ArrayHelper::map($clubs,'id','club_name'))?>
        </div>
    </div>
<?php endif; ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
