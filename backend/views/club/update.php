<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Club */

$this->title = Yii::t('app', 'Cập nhật câu lạc bộ: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Câu lạc bộ'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Cập nhật');
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary"><?= Html::encode($this->title) ?></h4>
    </div>
    <div class="card-body">
        <div class="table-responsive p-1">
            <div class="club-update">

                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>

            </div>
        </div>
    </div>
</div>