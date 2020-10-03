<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\StaffSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model backend\models\Staff */

$this->title = Yii::t('app', 'Success!');
?>
<div class="staff-update">

    <h1><?= Html::encode($this->title) ?></h1>


    <div class="container" style="padding-top: 12.5%; padding-left:35%">
        <div class="row">
            <div class="d-flex shadow-lg p-3 mb-5 bg-white">Success</div>
            <div class="form-group">
                <?= Html::a(Yii::t('app', 'Ok'), 'index', ['class' => 'btn btn-primary',]) ?>
            </div>
        </div>
    </div>



</div>