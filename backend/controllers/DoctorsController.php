<?php

namespace backend\controllers;

use common\models\Clinic;
use Yii;
use common\models\Doctor;
use backend\models\DoctorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DoctorsController implements the CRUD actions for Doctor model.
 */
class DoctorsController extends Controller
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
     * Lists all Doctor models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DoctorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Doctor model.
     * @param string $id
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
     * Creates a new Doctor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Doctor();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Doctor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
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
     * Deletes an existing Doctor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Doctor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Doctor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Doctor::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionSetClinics()
    {
        $post = Yii::$app->request->post();
        $clinics = $post['clinics'];

        $doctor = $this->findModel($post['doctor_id']);
        $clinicArray = [];

        $db = Yii::$app->db;
        $transaction = $db->beginTransaction();

        $db->createCommand()->delete('clinic_doctor', ['doctor_id' => $doctor->id])->execute();
        $transaction->commit();

        if (isset($clinics) && is_array($clinics)) {
            $newClinics = Clinic::find()->where(['in', 'id', $clinics])->count();
            if ($newClinics > 0) {
                foreach ($clinics as $key => $clinic) {
                    $clinicArray[$key] = [$clinic, $doctor->id];
                }
                $transaction = $db->beginTransaction();
                try {
                    $db->createCommand()->batchInsert('clinic_doctor', ['clinic_id','doctor_id'], $clinicArray)->execute();
                    $transaction->commit();
                    return $this->asJson(['error' => false, 'message' => 'Added']);
                } catch(\Exception $e) {
                    $transaction->rollBack();
                    return $this->asJson(['error' => true, 'message' => $e->getMessage()]);
                }
            }
        }
        return $this->asJson(['error' => false, 'message' => 'Clinic Doctors only delete']);
    }
}
