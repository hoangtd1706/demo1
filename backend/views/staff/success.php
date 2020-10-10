<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\StaffSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model backend\models\Staff */


$this->title = Yii::t('app', $message);

?>

<div class="staff-update">

    <h3 class="alert alert-success"><?= Html::encode($this->title) ?></h3>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'staff_name',
            'staff_email:email',
            'staff_tel',
            'dep_name',
            [
                'attribute' => 'status',
                'value' => (($model->status == 1) ? "Hoạt động" : "Không hoạt động"),
            ],
            'created_at:date',
            'updated_at:date',
        ],
    ]) ?>

    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="d-flex shadow-lg">
                <div class="row">
                    <div class="col-12">
                        <?= Html::a(Yii::t('app', '&larr; Back to Dashboard'), 'index', ['class' => 'btn btn-success btn-block',]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>