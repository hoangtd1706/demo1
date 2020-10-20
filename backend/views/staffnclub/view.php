<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Staffnclub */
$staff_name = \backend\models\Staff::findOne($model->staff_id);
$this->title = $model->id .' - '. $staff_name->staff_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Chi tiết câu lạc bộ'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary"><?= Html::encode($this->title) ?></h4>
    </div>
    <div class="card-body">
        <div class="table-responsive p-1">
            <div class="staffnclub-view">

                <p>
                    <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => Yii::t('app', 'Bạn muốn xóa thành viên: ' .$staff_name->staff_name. '?'),
                            'method' => 'post',
                        ],
                    ]) ?>
                </p>

                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id',
                        [
                            'attribute' => 'club',
                            'value' => function ($model) {
                                $club = \backend\models\Club::findOne($model->club_id);
                                return $club->id . ' - ' . $club->club_name;
                            }
                        ],
                        [
                            'attribute' => 'staff',
                            'value' => function ($model) {
                                $staff = \backend\models\Staff::findOne($model->staff_id);
                                return $staff->id . ' - ' . $staff->staff_name;
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