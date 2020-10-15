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



    <?= $form->field($model, 'dep_id')->dropDownList(ArrayHelper::map(Department::find()->where(['status'=>1])->all(),'id','dep_name'),
        [
            'prompt'=>'-- Chon phong ban --',
            'onchange'=>'
                        $.get( "'.Url::toRoute('/lists/dep').'", { id: $(this).val() } )
                            .done(function( data ) {
                                $( "#'.Html::getInputId($model, 'admin_email').'" ).html( data );
                            }
                        );
                    '
        ])?>
    <?= $form->field($model, 'admin_id')->textInput() ?>
    
    <?= $form->field($model, 'admin_name')->dropDownList(['prompt'=>'Selecione um estado'])  ?>

    <?= $form->field($model, 'admin_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'admin_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
