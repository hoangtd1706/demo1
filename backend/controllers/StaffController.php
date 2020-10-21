<?php

namespace backend\controllers;

use backend\models\Admin;
use backend\models\Club;
use backend\models\Department;
use backend\models\Staff;
use backend\models\Staffnclub;
use backend\models\StaffSearch;
use Yii;
use yii\base\Model;
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
        if ($dataProvider->models == null) {
            Yii::$app->session->setFlash('nodata', "Không tìm thấy user thích hợp");
        }
        $ckStaff = Yii::$app->request->post('selection');
        $dep = Yii::$app->request->post('StaffSearch');
        if (Yii::$app->request->post('selection')) {
            if ($ckStaff != null && $dep != null) {
                foreach ($ckStaff as $staff) {
                    $this->updateDepToStaff((int)$staff, ((int)$dep['dep_id']));
                }
            }
        }
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $searchModel,
        ]);
    }

    public function updateDepToStaff($staff, $dep)
    {
        $model = Staff::findOne($staff);
        $check = Admin::find()->where(['admin_id' => $model->id])->one();
        $time = time();
        $model->updated_at = $time;
        $model->dep_id = $dep;
        if ($check['dep_id'] != null) {
            Yii::$app->session->setFlash('error', $model->staff_name . " đang là trưởng phòng. Không thể chuyển!");
        } else if ($model->save()) {
            Yii::$app->session->setFlash('success', "Chuyển thành công!");
        } else {
            print_r("error");
            print_r($model->errors);
            die();
        }
    }

    /**
     * Displays a single Staff model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $dataProvider = Club::find()->where(['status' => 1])->all();
        return $this->render('view', [
            'model' => $this->findModel($id),
            'dataProvider' => $dataProvider,
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
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
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
        $clubs = Club::find()->all();
        $checkAdmin = Admin::find()->where(['admin_id' => $model->id])->one();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($checkAdmin != null) {
                if ($checkAdmin['dep_id'] == $model->dep_id && $model->status == 1){
                $this->setSession($model, 'update');
                return $this->redirect(['confirm']);
                }else{
                    $model->addError('error',$model->staff_name . " đang là trưởng phòng. Không thể thay đổi phòng ban và trạng thái!");
                    //Yii::$app->session->setFlash('error', $model->staff_name . " đang là trưởng phòng. Không thể thay đổi phòng ban và trạng thái!");
                }
            } else {
                $this->setSession($model, 'update');
                return $this->redirect(['confirm']);
            }
        }

        return $this->render('update', [
            'model' => $model,
            'clubs' => $clubs,
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
        $checkAdmin = Admin::find()->where(['admin_id' => $model->id])->all();
        $checkClub = Staffnclub::find()->where(['staff_id' => $model->id])->all();
        if ($model->id != null) {
            if ($checkAdmin == null) {
                if ($checkClub == null) {
                    $this->setSession($model, 'delete');
                    return $this->redirect(['confirm']);
                }else {
                    return $this->render('error',['message'=>'Đang tham câu lạc bộ không xóa được nhé']);;
                }
            } else {
                return $this->render('error',['message'=>'Đang là trưởng phòng không xóa được nhé']);
            }
        }

        return $this->redirect(['index']);
    }

    public function actionConfirm()
    {
        $session = Yii::$app->session;
        $act = $session->get('action');
        $time = time();
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
                if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                    if ($model->save()) {
                        $this->unsetSession();
                        return $this->render('success', ['model' => $model, 'message' => 'Đăng ký thông tin thành công']);
                    } else {
                        return $this->render('error',['message'=>$model->errors]);
                    }
                }
                break;
            case "update":
                $modelCheck->staff_name = $model->staff_name;
                $modelCheck->staff_email = $model->staff_email;
                $modelCheck->staff_tel = $model->staff_tel;
                $modelCheck->status = $model->status;
                $modelCheck->updated_at = $model->updated_at;
                $modelCheck->dep_id = $model->dep_id;
                $checkAdmin = Admin::find()->where(['admin_id'=>$modelCheck->id])->one();
                if ($model->load(Yii::$app->request->post())) {
                    if ($modelCheck->save()) {
                        if ($checkAdmin != null){
                            $checkAdmin['admin_name'] = $modelCheck->staff_name;
                            $checkAdmin['admin_phone'] = $modelCheck->staff_tel;
                            $checkAdmin['admin_email'] = $modelCheck->staff_email;
                            $checkAdmin['updated_at'] = $time;
                            $checkAdmin->save();
                        }
                        $this->unsetSession();
                        return $this->render('success', [
                            'model' => $model,
                            'message' => 'Update thông tin thành công',
                        ]);
                    } else {
                        print_r($model->errors);
                        die();
                    }
                }
                break;
            case "delete":
                if ($model->load(Yii::$app->request->post())) {
                    if ($this->findModel($model->id)->delete()) {
                        $this->unsetSession();
                        return $this->render('success', [
                            'model' => $model,
                            'message' => 'Delete thông tin thành công',
                        ]);
                    } else {
                        return $this->render('error',['message'=>$model->errors]);
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

    public function unsetSession(){
        unset($_SESSION['action']);
        unset($_SESSION['staff_id']);
        unset($_SESSION['staff_name']);
        unset($_SESSION['staff_email']);
        unset($_SESSION['staff_tel']);
        unset($_SESSION['dep_id']);
        unset($_SESSION['staff_status']);
        unset($_SESSION['created_at']);
        unset($_SESSION['updated_at']);
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

    public function actionStafflists($id)
    {
        $rows = Staff::find()->where(['dep_id' => $id, 'status' => 1])->all();

        echo "<option>-- Chọn nhân viên --</option>";

        if (count($rows) > 0) {
            foreach ($rows as $row) {
                echo "<option value='$row->id'>$row->id - $row->staff_name - $row->staff_email</option>";
            }
        } else {
            echo "<option>Không có nhân viên nào</option>";
        }

    }

    public function actionStaffname($id)
    {
        $rows = Staff::find()->where(['id' => $id])->one();
        return $rows->staff_name;

    }

}
