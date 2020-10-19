<?php

namespace backend\controllers;

use backend\models\Staff;
use Yii;
use backend\models\Club;
use backend\models\ClubSearch;
use backend\models\Staffnclub;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ClubController implements the CRUD actions for Club model.
 */
class ClubController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Club models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ClubSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single Club model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Club model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Club();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Club model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Club model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Club model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Club the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Club::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    public function actionListsclub($id)
    {
        $time = time();
        $searchModel = new ClubSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $staff = Staff::findOne($id);
        $staffs = Staff::find()->where(['id'=>$id])->all();


        $chk = Yii::$app->request->post('selection');
        if (Yii::$app->request->post('selection') && $chk != null) {
            foreach ($chk as $check) {
                if (Staffnclub::find()->where(['club_id' => $check, 'staff_id' => $id])->one()) {
                    print_r(Staffnclub::find()->where(['club_id' => $check, 'staff_id' => $id])->one());
                } else {
                    $model = new Staffnclub();
                    $model->created_at = $time;
                    $model->updated_at = $time;
                    $model->staff_id = $staff->id;
                    var_dump((int)$check);
                    $model->club_id = (int)$check;
                    $model->created_at = $time;
                    $model->updated_at = $time;
                    $model->staff_id = $staff->id;
                    print_r($model);
                    $model->save();
                }
            }
            return $this->redirect('/demo1/backend/web/staff/update?id=' . $id);
        }

        return $this->renderAjax('listsclub', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'staff_id' => $id,
        ]);
    }
}
