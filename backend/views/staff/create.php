<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Staff */

$this->title = Yii::t('app', 'Thêm nhân viên');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Nhân viên'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staff-create">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Đăng ký nhân viên mới</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive p-1">
                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>
            </div>
        </div>
    </div>
</div>
