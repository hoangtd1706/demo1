<?php

namespace backend\controllers;

use backend\models\Staff;
use backend\models\StaffSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

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

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
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

    /**
     * Creates a new Staff model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $time = time();
        $model = new Staff();
        $model->created_at = $time;
        $model->updated_at = $time;
        if ($model->load(Yii::$app->request->post())) {
            $this->setSession($model, 'create');
            return $this->redirect(['confirm']);
        }

        return $this->render('create', [
            'model' => $model,
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
        $time = time();
        $model = $this->findModel($id);
        $model->updated_at = $time;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->setSession($model, 'update');
            return $this->redirect(['confirm']);
        }

        return $this->render('update', [
            'model' => $model,
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
        if ($model->id != null) {
            $this->setSession($model, 'delete');
            return $this->redirect(['confirm']);
        }

        return $this->redirect(['index']);
    }

    public function actionConfirm()
    {
        $session = Yii::$app->session;
        $act = $session->get('action');
        $model = new Staff();
        $model->id = $session->get('staff_id');
        $model->staff_name = $session->get('staff_name');
        $model->staff_email = $session->get('staff_email');
        $model->staff_tel = $session->get('staff_tel');
        $model->status = $session->get('staff_status');
        $model->dep_id = $session->get('dep_id');
        $model->created_at = $session->get('created_at');
        $model->updated_at = $session->get('updated_at');
        $modelCheck = Staff::findOne($model->id);
        switch ($act) {
            case "create":
                if ($model->load(Yii::$app->request->post())&& $model->validate()) {
                    if ($model->save()) {
                        return $this->render('success', ['model' => $model, 'message' => 'Thêm mới thành công!']);
                    } else {
                        print_r($model->errors);
                        die();
                    }
                }
                break;
            case "update":
                $modelCheck->staff_name = $model->staff_name;
                $modelCheck->staff_email = $model->staff_email;
                $modelCheck->staff_tel = $model->staff_tel;
                $modelCheck->dep_id = $model->dep_id;
                $modelCheck->status = $model->status;
                $modelCheck->updated_at = $model->updated_at;

                if ($model->load(Yii::$app->request->post())) {
                    if ($modelCheck->save()) {
                        return $this->render('success', [
                            'model' => $model,
                            'message' => 'Cập nhật thành công!',
                        ]);
                    }
                    else{
                        print_r($model->errors);
                        die();
                    }
                }
                break;
            case "delete":
                if ($model->load(Yii::$app->request->post())) {
                    if ($this->findModel($model->id)->delete()) {
                        return $this->render('success', [
                            'model' => $model,
                            'message' => 'Xóa thành công!',
                        ]);
                    } else {
                        print_r($model->errors);
                        die();
                    }
                }
                break;
            default:
                $this->render('confirm', [
                    'model' => $model,
                    'act' => $act
                ]);
        }
        return $this->render('confirm', [
            'model' => $model,
            'act' => $act
        ]);
    }

    public function setSession($model, $action)
    {
        if ($model != null) {
            $session = Yii::$app->session;
            $session->set('action', $action);
            $session->set('staff_id', $model->id);
            $session->set('staff_name', $model->staff_name);
            $session->set('staff_email', $model->staff_email);
            $session->set('staff_tel', $model->staff_tel);
            $session->set('dep_id', $model->dep_id);
            $session->set('staff_status', $model->status);
            $session->set('created_at', $model->created_at);
            $session->set('updated_at', $model->updated_at);
        } else {
            print_r("nodata");
        }
    }

    public function getSession()
    {
        $model = new Staff();
        $session = Yii::$app->session;
        $act = $session->get('action');
        $model->id = $session->get('staff_id');
        $model->staff_name = $session->get('staff_name');
        $model->staff_email = $session->get('staff_email');
        $model->staff_tel = $session->get('staff_tel');
        $model->dep_id = $session->get('dep_id');
        $model->status = $session->get('staff_status');
        $model->created_at = $session->get('created_at');
        $model->updated_at = $session->get('updated_at');

        return $model;
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
