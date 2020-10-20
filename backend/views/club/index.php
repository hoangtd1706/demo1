<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Câu lạc bộ');
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
                    <?= Html::a(Yii::t('app', 'Tạo câu lạc bộ'), ['create'], ['class' => 'btn btn-success']) ?>
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
                        [
                            'attribute' => 'created_at',
                            'value' => function ($model) {
                                return date('d-m-Y', $model->created_at);
                            }
                        ],
                        [
                            'attribute' => 'updated_at',
                            'value' => function ($model) {
                                return date('d-m-Y', $model->updated_at);
                            },
                        ],

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
                                'delete' => function ($url,$model) {
                                    return Html::a('<i class="fas fa-trash"></i>', $url, [
                                        'title' => Yii::t('app', 'delete'),
                                        'class' => 'btn btn-sm ml-2 btn-danger',
                                        'data' => [
                                            'confirm' => 'Bạn muốn xóa câu lạc bộ: '.$model->club_name.'?',
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