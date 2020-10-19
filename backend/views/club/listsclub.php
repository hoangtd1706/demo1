<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap4\ActiveForm;
use backend\models\Staffnclub;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ClubSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Clubs');
$this->params['breadcrumbs'][] = $this->title;
$staff = \backend\models\Staff::find()->where(['id' => $staff_id])->one();
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary"><?= Html::encode($this->title) ?></h4>
    </div>
    <div class="card-body">
        <div class="table-responsive p-1">
            <div class="club-index">

                <p>
                    <?= Html::a(Yii::t('app', 'Create Club'), ['create'], ['class' => 'btn btn-success']) ?>
                </p>
                <?php $form = ActiveForm::begin(); ?>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    //'filterModel' => $searchModel,
                    'columns' => [
                        [
                            'class' => 'yii\grid\CheckBoxColumn',
                            'checkboxOptions' => function ($model) {
                                $id = (int)$_GET['id'];
                                $staffClub = Staffnclub::find()->where(['staff_id' => $id, 'club_id' => $model->id])->all();
                                if ($staffClub != null) {

                                    return ['checked' => ''];
                                }
                            }

                        ],

                        'id',
                        'club_name',
                        'club_description',
                        [
                            'attribute' => 'Trang thai',
                            'value' => function ($model) {
                                $id = (int)$_GET['id'];
                                $staffClub = Staffnclub::find()->where(['staff_id' => $id, 'club_id' => $model->id])->all();
                                if ($staffClub != null) {
                                    return 'Đã tham gia';
                                }
                                return '';
                            }
                        ],
                    ],
                    'rowOptions' => function ($model, $index, $widget, $grid) {
                        $id = (int)$_GET['id'];
                        $staffClub = Staffnclub::find()->where(['staff_id' => $id, 'club_id' => $model->id])->all();
                        if ($staffClub != null) {
                            return ['class' => ''];
                        } else {
                            return ['class' => 'table-success'];
                        }
                    },
                ]); ?>

                <div class="row">
                    <div class="col-sm-12">

                        <!--<h4><?php /*print_r($staff_id . '-' . $staff->staff_name) */ ?></h4>-->
                    </div>
                    <div class="col-sm-12">
                        <?= Html::submitButton(Yii::t('app', 'Tham gia'), ['class' => 'btn btn-success']) ?>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
</div>