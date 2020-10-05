<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\StaffSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model backend\models\Staff */

//$this->title = Yii::t('app', 'Success!');
?>
<div class="staff-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="d-flex shadow-lg p-3 mb-5 bg-white">
                <div class="row">

                    <div class="col-12 justify-content-center">
                        <div class="form-group  align-items-center">
                            <h2 class="">Success</h2>
                        </div>
                    </div>
                    <div class="col-12">
                        <?= Html::a(Yii::t('app', 'Ok'), 'index', ['class' => 'btn btn-success btn-block',]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>