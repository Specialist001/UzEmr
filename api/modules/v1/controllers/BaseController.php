<?php


namespace api\modules\v1\controllers;


use common\models\ApiUser;
use Yii;
use yii\filters\VerbFilter;

abstract class BaseController extends \yii\rest\Controller
{
    protected $__request;
    public $__response;

    public function __construct($id, $module, array $config = [])
    {
        $this->__request = Yii::$app->getRequest();
        parent::__construct($id, $module, $config);
    }

    public function behaviors()
    {
        return [
            'verbs' => [
                'class'   => VerbFilter::class,
                'actions' => ['*' => ['POST']],
            ],
        ];
    }

    public function beforeAction($action)
    {
        $parent = parent::beforeAction($action);
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $this->__response = [
            'error' => null,
            'data' => null,
            'commandName' => $action->id,
        ];
        return $parent;
    }

    public function getRequestBodyParams()
    {
        return $this->__request->getBodyParams();
    }
}