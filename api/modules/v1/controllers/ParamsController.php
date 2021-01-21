<?php
namespace api\modules\v1\controllers;


use api\actions\status\CheckVersionAction;
use api\models\PasswordResetRequestForm;
use api\models\SignupForm;
use api\modules\v1\services\AuthService;
use api\responses\ErrorResponse;
use api\responses\Response;
use api\forms\AuthForm;

use common\models\ApiUser;
use common\models\Company;
use common\models\User;
use Yii;
use yii\base\Exception;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\BadRequestHttpException;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;

abstract class ParamsController extends BaseController
{
    public $_user = null;
    public $_company = null;
    public $device = null;

    private $authService;

    public $enableCsrfValidation = false;

    public function __construct($id, $module, array $config = [])
    {
        $this->authService = new AuthService();
        $this->_user = Yii::$app->user;
        parent::__construct($id, $module, $config);
    }

    public function beforeAction($action)
    {
        if (parent::beforeAction($action))
        {
//            $this->auth();
            return true;
        }
        return false;
    }

    protected function auth()
    {
        $form = new AuthForm();
        $form->load($this->getRequestBodyParams(),'auth');

        if ($form->validate()) {
            try {
                $this->authService->login($form);
            } catch (\Exception $e) {
                throw new ForbiddenHttpException($e->getMessage(), $e->getCode());
            }
            $this->_company = Company::findIdentityByCompanyId($form->company_id);
            if (!$this->_company) {
                throw new NotFoundHttpException('Company not found');
            }
        }
        if ($form->getFirstErrors()) {
            throw new ForbiddenHttpException(__getFirstArrayItem($form->firstErrors), Response::CODE_REJECTED);
        }
    }
}