<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Club */

$this->title = Yii::t('app', 'Tạo câu lạc bộ');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Câu lạc bộ'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary"><?= Html::encode($this->title) ?></h4>
    </div>
    <div class="card-body">
        <div class="table-responsive p-1">
            <div class="club-create">

                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>

            </div>
        </div>
    </div>
</div>