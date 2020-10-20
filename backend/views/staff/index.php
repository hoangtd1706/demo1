<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap4\ActiveForm;
use backend\models\Department;
use backend\models\Club;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\StaffSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model backend\models\Staff */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $message string */

$this->title = Yii::t('app', 'Nhân viên');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staff-index">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h5 class="m-0 font-weight-bold text-primary"><?= Html::encode($this->title) ?></h5>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                    <span class="dropdown-item bg-success" href="#">Hoạt động</span>
                    <span class="dropdown-item" href="#">Không hoạt động</span>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive p-1">
                <p>
                    <?= Html::a(Yii::t('app', 'Thêm nhân viên'), ['create'], ['class' => 'btn btn-success']) ?>
                </p>

                <?php echo $this->render('_search', ['model' => $searchModel]); ?>
                <?php if (Yii::$app->session->hasFlash('nodata')): ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <h6><?= Yii::$app->session->getFlash('nodata') ?></h6>
                    </div>
                <?php endif; ?>
                <?php $form = ActiveForm::begin(); ?>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    //'filterModel' => $searchModel,
                    'rowOptions'=>function($model){
                        if ($model->status == 1){
                            return ['class'=>'table-success'];
                        }
                    },
                    'columns' => [
                        ['class' => 'yii\grid\CheckBoxColumn'],
                        'id',
                        'staff_name',
                        'staff_email:email',
                        'staff_tel',
                        [
                            'attribute' => 'dep_id',
                            'value' => function ($model) {
                                if ($model->dep_id == 0) {
                                    return 'Không thuộc phòng ban nào!';
                                } else {
                                    $dep = Department::findOne($model->dep_id);
                                    return $dep->dep_name;
                                }
                            }
                        ],
                        [
                            'attribute' => 'Câu lạc bộ tham gia',
                            'value' => function ($model) {

                                $query = new \yii\db\Query();

                                $query->select('staff_id, club_id')->from('staffnclub')->where(['staff_id' => $model->id])->groupBy('club_id');
                                $row = $query->all();
                                $club = '';
                                foreach ($row as $clubs) {
                                    $clName = \backend\models\Club::findOne($clubs['club_id']);
                                    $club .= $clName->club_name . '; ';
                                }
                                return $club;
                            }
                        ],
                        //'status',
                        //'created_at',
                        //'updated_at',

                        ['class' => 'yii\grid\ActionColumn',
                            'buttons' => [
                                'update' => function ($url) {
                                    return Html::a('<i class="fas fa-edit"></i>', $url, [
                                        'title' => Yii::t('app', 'update'),
                                        'class' => 'btn btn-sm ml-2 btn-primary',
                                    ]);
                                },
                                'view' => function ($url) {
                                    return Html::a('<i class="fas fa-eye"></i>', $url, [
                                        'title' => Yii::t('app', 'view'),
                                        'class' => 'btn btn-sm ml-2 btn-success',
                                    ]);
                                },
                                'delete' => function ($url) {
                                    return Html::a('<i class="fas fa-trash"></i>', $url, [
                                        'title' => Yii::t('app', 'delete'),
                                        'class' => 'btn btn-sm ml-2 btn-danger',
                                        'data' => [
                                            'method' => 'post',
                                        ],
                                    ]);
                                }
                            ]
                        ],
                    ],
                ]); ?>


                <div class="row">
                    <div class="col-sm-12 col-md-4">
                        <?= $form->field($model, 'dep_id')->dropDownList(ArrayHelper::map(Department::find()->where(['status' => 1])->all(), 'id', 'dep_name'))->label(false) ?>
                    </div>
                    <div class="col-sm-12 col-md-2">
                        <?= Html::submitButton(Yii::t('app', 'update'), ['class' => 'btn btn-success']) ?>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
</div>