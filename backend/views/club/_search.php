<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ClubSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="club-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-sm-12 col-md-6">
            <?= $form->field($model, 'id') ?>
        </div>
        <div class="col-sm-12 col-md-6">
            <?= $form->field($model, 'club_name') ?>
        </div>
        <div class="col-sm-12 col-md-6">
            <?= $form->field($model, 'club_description') ?>
        </div>
        <div class="col-sm-12 col-md-6">
            <?= $form->field($model, 'status')->dropDownList([1 => 'Hoạt động', 0 => 'Không hoạt động'], [
                'prompt' => '--Trạng thái--',
            ]) ?>
        </div>

        <?php // echo $form->field($model, 'updated_at') ?>
    </div>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
