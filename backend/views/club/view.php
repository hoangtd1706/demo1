<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Club */

$this->title = $model->id . ' - ' . $model->club_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Câu lạc bộ'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary"><?= Html::encode($this->title) ?></h4>
    </div>
    <div class="card-body">
        <div class="table-responsive p-1">
            <div class="club-view">
                <p>
                    <?= Html::a(Yii::t('app', 'Cập nhật'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a(Yii::t('app', 'Xóa'), ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => Yii::t('app', 'Bạn muốn xóa câu lạc bộ: ' . $model->club_name . '?'),
                            'method' => 'post',
                        ],
                    ]) ?>
                </p>

                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
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
                            }
                        ],
                    ],
                ]) ?>

            </div>
        </div>
    </div>
</div>