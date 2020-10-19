<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Staff */
/* @var $clubs backend\models\Club */

$this->title = Yii::t('app', 'Update Staff: {name}', [
    'name' => $model->staff_name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Staff'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="staff-update">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary"><?= Html::encode($this->title) ?></h4>
        </div>
        <div class="card-body">
            <div class="table-responsive p-1">
                <?= $this->render('_form', [
                    'model' => $model,
                    'clubs' => $clubs,
                ]) ?>
            </div>
        </div>
    </div>
</div>

