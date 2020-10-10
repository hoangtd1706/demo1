<?php

namespace backend\controllers;

use backend\models\Department;
use Yii;
use backend\models\Staff;
use backend\models\StaffSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * StaffController implements the CRUD actions for Staff model.
 */
class StaffController extends Controller
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
     * Lists all Staff models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StaffSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if ($dataProvider->models == null) {
            Yii::$app->session->setFlash('nodata', "Không có nhân viên này!");
        }
        $Dep = new Department();
        $depName = ArrayHelper::map($Dep->getAllActive(), 'dep_name', 'dep_name');
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'dep_name' => $depName,
        ]);
    }

    /**
     * Displays a single Staff model.
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

    public function actionConfirm()
    {
        $model = new Staff();
        $session = Yii::$app->session;
        $model->staff_name = $session->get('staff_name');
        $model->staff_email = $session->get('staff_email');
        $model->staff_tel = $session->get('staff_tel');
        $model->dep_name = $session->get('dep_name');
        $model->status = $session->get('staff_status');
        $model->created_at = $session->get('created_at');
        $model->updated_at = $session->get('updated_at');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->render('success',
                [
                    'model' => $model,
                    'message' => 'Thêm mới thành công!',
                ]);
        }
        return $this->render('confirm',[
            'model' => $model,
        ]);
    }


    /**
     * Creates a new Staff model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $time = time();
        $model = new Staff();
        $Dep = new Department();
        $model->created_at = $time;
        $model->updated_at = $time;

        $session = Yii::$app->session;
        $depName = ArrayHelper::map($Dep->getAllActive(), 'dep_name', 'dep_name');


        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $session->set('staff_name', $model->staff_name);
            $session->set('staff_email', $model->staff_email);
            $session->set('dep_name', $model->dep_name);
            $session->set('staff_tel', $model->staff_tel);
            $session->set('staff_status', $model->status);
            $session->set('created_at', $model->created_at);
            $session->set('updated_at', $model->updated_at);

            return $this->redirect('confirm');
        }

        return $this->render('create', [
            'model' => $model,
            'dep_name' => $depName,

        ]);
    }

    /**
     * Updates an existing Staff model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $time = time();
        $Dep = new Department();
        $model->updated_at = $time;
        $depName = ArrayHelper::map($Dep->getAllActive(), 'dep_name', 'dep_name');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->render('success',
                [
                    'model' => $model,
                    'message' => 'Cập nhật thành công!',
                ]);
        }

        return $this->render('update', [
            'model' => $model,
            'dep_name' => $depName,
        ]);
    }

    /**
     * Deletes an existing Staff model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $stt = $this->findModel($id)->delete();
        if ($stt == true) {
            return $this->render('success',
                [
                    'model' => $model,
                    'message' => 'Xoa thanh cong',
                ]);
        } else {
            return $this->render('error');
        }

    }

    public function actionSuccess()
    {
        return $this->render('success');
    }

    /**
     * Finds the Staff model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Staff the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Staff::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
