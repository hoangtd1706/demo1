<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Staff */
/* @var $club backend\models\Staff */

$this->title = Yii::t('app', 'Update Staff: {name}', [
    'name' => $model->staff_name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Staff'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="staff-update">

    <?= $this->render('_form', [
        'model' => $model,
        'club' => $club,
    ]) ?>

</div>

