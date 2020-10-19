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
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary"><?= Html::encode($this->title) ?></h4>
    </div>
    <div class="card-body">
        <div class="table-responsive p-1">
            <div class="staff-update">

                <h3 class="alert alert-success"><?= Html::encode($this->title) ?></h3>

                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id',
                        'dep_name',
                        'dep_desciption',
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
                        <div class="d-flex shadow-sm">
                            <div class="row">
                                <div class="col-12">
                                    <?= Html::a(Yii::t('app', '&larr; Back to Dashboard'), 'index', ['class' => 'btn btn-success btn-block',]) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>