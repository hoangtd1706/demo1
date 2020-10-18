<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ClubSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Clubs');
$this->params['breadcrumbs'][] = $this->title;
$staff = \backend\models\Staff::find()->where(['id' => $staff_id])->one();
?>
<div class="club-index">

    <p>
        <?= Html::a(Yii::t('app', 'Create Club'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php $form = ActiveForm::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\CheckBoxColumn'],

            'id',
            'club_name',
            'club_description',
            [
                'attribute' => 'Trang thai',
                'value' => function ($staff) {
                }
            ],
            [
                    'label'=>'name',
                'value'=>''
            ]
        ],
    ]); ?>

    <div class="row">
        <div class="col-sm-12 col-md-4">

            <h4><?php print_r($staff_id . '-' . $staff->staff_name) ?></h4>
        </div>
        <div class="col-sm-12 col-md-4">
            <?= Html::submitButton(Yii::t('app', 'Thêm'), ['class' => 'btn btn-success']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
