<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Department;
use backend\models\Club;

/* @var $this yii\web\View */
/* @var $model backend\models\Staff */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $clubs backend\models\Club */

$clubs = Club::find()->all();
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
            <?php $form = ActiveForm::begin(); ?>

            <?php foreach ($clubs as $club): ?>
                <div class="custom-control custom-checkbox mt-2 mb-2">
                    <input type="checkbox" class="custom-control-input" id="customCheck<?php print_r($club->id) ?>"
                           value="<?php print_r($club->id) ?>">
                    <label class="custom-control-label"
                           for="customCheck<?php print_r($club->id) ?>"><?php print_r($club->club_name) ?></label>
                </div>
            <?php endforeach; ?>
            <div class="form-group mt-2">
                <?= Html::submitButton(Yii::t('app', 'Add'), ['class' => 'btn btn-success']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
<?php endif; ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
