<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Staff */

$this->title = Yii::t('app', 'Thêm nhân viên mới');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Staff'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staff-create">

    <?= $this->render('_form', [
        'model' => $model,
        'dep_name' => $dep_name,
    ]) ?>

</div>
