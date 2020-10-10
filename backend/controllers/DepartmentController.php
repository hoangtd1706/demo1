<?php

namespace backend\controllers;

use Yii;
use backend\models\Department;
use backend\models\Staff;
use backend\models\DepartmentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * DepartmentController implements the CRUD actions for Department model.
 */
class DepartmentController extends Controller
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
     * Lists all Department models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DepartmentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if ($dataProvider->models == null) {
            Yii::$app->session->setFlash('nodata', "Khong co phong ban nay");
        }
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Department model.
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
     * Creates a new Department model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $session = Yii::$app->session;
        $time = time();
        $model = new Department();
        $model->created_at = $time;
        $model->updated_at = $time;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            /*$session->set('dep_name', $model->dep_name);
            $session->set('dep_desciption', $model->dep_desciption);
            $session->set('dep_status', $model->status);
            $session->set('created_at', $model->created_at);
            $session->set('updated_at', $model->updated_at);*/
            $this->actionSetSession($model);
            return $this->redirect('confirm');
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }



    public function actionConfirm()
    {

        $model = $this->actionGetSession();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->render('success',
                [
                    'model' => $model,
                    'message' => 'Thêm mới thành công!',
                ]);
        }
        return $this->render('confirm', [
            'model' => $model,
        ]);

    }


    /**
     * Updates an existing Department model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $time = time();

        $model = $this->findModel($id);
        $model->updated_at = $time;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //$this->actionSetSession($model);
            //return $this->redirect('confirm');
            return $this->render('success',
                [
                    'model' => $model,
                    'message' => 'Cập nhật thành công!',
                ]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Department model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $dep_name = Department::getOne($id);
        $model = Staff::find()->where(['dep_name' => $dep_name->dep_name, 'status' => 1])->asArray()->all();
        if ($model != null) {
            throw new \yii\web\HttpException(403, "Phòng đang có người không xóa được nhé!");
        } else {
            $mo = Department::findOne($id);
            $this->findModel($id)->delete();
            return $this->render('success',
                [
                    'model' => $mo,
                    'message' => 'Xóa thành công!',
                ]);
        }
    }

    public function actionError()
    {
        $this->render('error');
    }

    public function actionSetSession($model)
    {
        if ($model != null) {
            $session = Yii::$app->session;
            $session->set('dep_id', $model->id);
            $session->set('dep_name', $model->dep_name);
            $session->set('dep_desciption', $model->dep_desciption);
            $session->set('dep_status', $model->status);
            $session->set('created_at', $model->created_at);
            $session->set('updated_at', $model->updated_at);
        } else {
            throw new \yii\web\HttpException(403, "Phòng đang có người không xóa được nhé!");
        }
    }

    public function actionGetSession()
    {
        $model = new Department();
        $session = Yii::$app->session;
        $model->id = $session->get('dep_id');
        $model->dep_name = $session->get('dep_name');
        $model->dep_desciption = $session->get('dep_desciption');
        $model->status = $session->get('dep_status');
        $model->created_at = $session->get('created_at');
        $model->updated_at = $session->get('updated_at');
        return $model;
    }

    /**
     * Finds the Department model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Department the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Department::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
