<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\StaffSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model backend\models\Staff */


$this->title = Yii::t('app', $message);

?>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="container h-100">
            <h3 class="col-md-auto text-center mt-4 mb-4"><?= Html::encode($this->title) ?></h3>
            <div class="row h-100 justify-content-center align-items-center">
                <div class="row mt-4 mb-4">
                    <div class="col-12">
                        <?= Html::a(Yii::t('app', 'Ok'), 'index', ['class' => 'btn btn-success btn-block',]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>