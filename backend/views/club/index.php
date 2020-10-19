<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Clubs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary"><?= Html::encode($this->title) ?></h4>
    </div>
    <div class="card-body">
        <div class="table-responsive p-1">
            <div class="club-index">

                <p>
                    <?= Html::a(Yii::t('app', 'Create Club'), ['create'], ['class' => 'btn btn-success']) ?>
                </p>

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    //'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'id',
                        'club_name',
                        'club_description',
                        [
                            'attribute' => 'status',
                            'value' => function ($model) {
                                return $model->status == 1 ? 'Hoạt động' : 'Không hoạt động';
                            }
                        ],
                        'created_at',
                        //'updated_at',

                        ['class' => 'yii\grid\ActionColumn',
                            'buttons' => [
                                'update' => function ($url) {
                                    return Html::a('<i class="fas fa-edit"></i>', $url, [
                                        'title' => Yii::t('app', 'update'),
                                        'class' => 'btn btn-sm ml-2 btn-primary',
                                    ]);
                                },
                                'view' => function ($url) {
                                    return Html::a('<i class="fas fa-eye"></i>', $url, [
                                        'title' => Yii::t('app', 'view'),
                                        'class' => 'btn btn-sm ml-2 btn-success',
                                    ]);
                                },
                                'delete' => function ($url) {
                                    return Html::a('<i class="fas fa-trash"></i>', $url, [
                                        'title' => Yii::t('app', 'delete'),
                                        'class' => 'btn btn-sm ml-2 btn-danger',
                                        'data' => [
                                            'confirm' => 'Are you sure you want to delete this item?',
                                            'method' => 'post',
                                        ],
                                    ]);
                                }
                            ]
                        ],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>