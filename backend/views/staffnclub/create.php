<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Staffnclub */

$this->title = Yii::t('app', 'Create Staffnclub');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Staffnclubs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staffnclub-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
