<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Department */

$this->title = 'Thêm phòng ban mới';
$this->params['breadcrumbs'][] = ['label' => 'Departments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="department-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
