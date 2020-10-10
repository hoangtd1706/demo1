<?php

use yii\helpers\Html;
use yii\grid\GridView;
use \yii\bootstrap4\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DepartmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Phòng ban';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="department-index">

    <p>
        <?= Html::a('Thêm phòng ban mới', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php if (Yii::$app->session->hasFlash('nodata')): ?>
        <div class="alert alert-danger alert-dismissible">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <h4><?= Yii::$app->session->getFlash('nodata') ?></h4>
        </div>
    <?php endif; ?>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'pager' => [
            'class' => LinkPager::class
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'dep_name',
            'dep_desciption',
            [
                'attribute' => 'status',
                'value' =>function ($model) {
                    return $model->status == 1 ? 'Hoạt động' :  'Không hoạt động';
                }
            ],
            //'created_at',
            //'updated_at',
            [
                'attribute' => 'created_at',
                'value' => function ($model) {
                    return date('d-m-Y', $model->created_at);
                },
            ],
            [
                'attribute' => 'updated_at',
                'value' => function ($model) {
                    return date('d-m-Y', $model->updated_at);
                },
            ],
            ['class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'update' =>  function($url) {
                        return Html::a('<i class="fas fa-edit"></i>', $url, [
                            'title' => Yii::t('app', 'update'),
                            'class' => 'btn btn-sm ml-2 btn-primary',
                        ]);
                    },
                    'view' =>  function($url) {
                        return Html::a('<i class="fas fa-eye"></i>', $url, [
                            'title' => Yii::t('app', 'view'),
                            'class' => 'btn btn-sm ml-2 btn-success',
                        ]);
                    },
                    'delete' => function($url) {
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
