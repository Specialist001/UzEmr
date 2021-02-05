<?php


namespace api\modules\v1\controllers;


use api\modules\v1\transformers\Clinics\ClinicInfo;
use api\modules\v1\transformers\Laboratory\LaboratoryInfo;
use api\modules\v1\transformers\MetaData;
use common\models\Clinic;
use common\models\Laboratory;
use Yii;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;

class LaboratoriesController extends ParamsController
{
    public function actionIndex()
    {
        $laboratories = Laboratory::find();
        $count = $laboratories->count();

        $pagination = $this->getPagination($count);
        $pagination->validatePage = false;
        $queries = $laboratories->offset($pagination->offset)->limit($pagination->limit)->all();

        $this->__response = [
            'error' => null,
            'data' => LaboratoryInfo::collection($queries),
            'meta' => MetaData::transform($pagination)
        ];
        return $this->__response;
    }

    public function actionView($id)
    {
        $clinic = $this->findModel($id);

        $this->__response = [
            'error' => null,
            'data' => LaboratoryInfo::transform($clinic),
        ];

        return $this->__response;
    }

    /**
     * @param $id
     * @return Laboratory|null
     * @throws NotFoundHttpException
     */
    protected function findModel($id)
    {
        if (($model = Laboratory::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}