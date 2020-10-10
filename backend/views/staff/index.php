<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\StaffSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Nhân viên');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staff-index">



    <p>
        <?= Html::a(Yii::t('app', 'Thêm nhân viên mới'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php if (Yii::$app->session->hasFlash('nodata')): ?>
        <div class="alert alert-danger alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <h4><?= Yii::$app->session->getFlash('nodata') ?></h4>
        </div>
    <?php endif; ?>
    <?php echo $this->render('_search', [
        'model' => $searchModel,
        'dep_name' => $dep_name,
    ]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'pager' => [
            'class' => \yii\bootstrap4\LinkPager::class
        ],
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'staff_name',
            'staff_email:email',
            'staff_tel',
            'dep_name',
            /*[
                'attribute' => 'status',
                'value' =>function ($model) {
                    return $model->status == 1 ? 'Hoạt động' :  'Không hoạt động';
                }
            ],*/
            //'created_at',
            //'updated_at',

            /*[
                'attribute' => 'created_at',
                'value' => function ($model, $key, $index, $grid) {
                    return date('d-m-Y', $model->created_at);
                },
            ],
            [
                'attribute' => 'updated_at',
                'value' => function ($model, $key, $index, $grid) {
                    return date('d-m-Y', $model->updated_at);
                },
            ],*/
            ['class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::a('<i class="fas fa-edit"></i>', $url, [
                            'title' => Yii::t('app', 'update'),
                            'class' => 'btn btn-sm btn-primary',
                        ]);
                    },
                    'view' => function ($url, $model) {
                        return Html::a('<i class="fas fa-eye"></i>', $url, [
                            'title' => Yii::t('app', 'view'),
                            'class' => 'btn btn-sm btn-success',
                        ]);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a('<i class="fas fa-dumpster"></i>', $url, [
                            'title' => Yii::t('app', 'delete'),
                            'class' => 'btn btn-sm btn-danger',
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
