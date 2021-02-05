<?php


namespace api\modules\v1\controllers;


use api\modules\v1\transformers\Clinics\ClinicInfo;
use common\models\Clinic;
use yii\web\NotFoundHttpException;

class ClinicsController extends ParamsController
{
    public function actionIndex()
    {
        $clinics = Clinic::find()->all();

        $this->__response = [
            'error' => null,
            'data' => ClinicInfo::collection($clinics),
        ];
        return $this->__response;
    }

    public function actionView($id)
    {
        $clinic = $this->findModel($id);

        $this->__response = [
            'error' => null,
            'data' => ClinicInfo::transform($clinic),
        ];

        return $this->__response;
    }

    /**
     * @param $id
     * @return Clinic|null
     * @throws NotFoundHttpException
     */
    protected function findModel($id)
    {
        if (($model = Clinic::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}