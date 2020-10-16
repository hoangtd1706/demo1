<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Department;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Admin */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="admin-form">

    <?php $form = ActiveForm::begin(); ?>



    <?= $form->field($model, 'dep_id')->dropDownList(ArrayHelper::map(Department::find()->where(['status' => 1])->all(), 'id', 'dep_name'),
        [
            'prompt' => '-- Chon phong ban --',
            'onchange' => '
                        $.get( "' . Url::toRoute('staff/stafflists') . '", { id: $(this).val() } )
                            .done(function( data ) {
                                $( "#' . Html::getInputId($model, 'admin_id') . '" ).html( data );
                            }
                        );
                    '
        ]) ?>
    <?= $form->field($model, 'admin_id')->dropDownList(['prompt' => '']); ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
