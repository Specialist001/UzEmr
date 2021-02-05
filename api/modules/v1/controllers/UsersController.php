<?php


namespace api\modules\v1\controllers;


use api\forms\UserCardsForm;
use api\modules\v1\forms\UserForm;
use api\modules\v1\responses\ErrorResponse;
use api\modules\v1\responses\Response;
use api\modules\v1\transformers\UserInfo;
use api\transformers\UserCardInfo;
use common\models\User;

class UsersController extends ParamsController
{
    public function actionIndex()
    {
        $user = $this->_user->identity;

        $this->__response = [
            'error' => null,
            'data' => UserInfo::transform($user),
        ];
        return $this->__response;
    }

    public function actionCreate()
    {
        $form = new \api\modules\v1\forms\UserForm();
        $form->load($this->getRequestBodyParams(),'');

        if(!$form->validate()) {
            if ($form->getFirstErrors()) {
                $this->__response = [
                    'error' => new ErrorResponse(Response::CODE_REJECTED, __getFirstArrayItem($form->firstErrors)),
                    'data' => null,
                ];
                return $this->__response;
            }
        }
        $user = $form->user();

        if (!empty($user['error'])) {
            return $user;
        }

        $this->__response = [
            'error' => null,
            'data' => UserInfo::transform($user),
        ];
        return $this->__response;
    }

    public function actionGetCards()
    {
        $form = new UserCardsForm();
        $form->load($this->getRequestBodyParams(),'user');

        if(!$form->validate()) {
            if ($form->getFirstErrors()) {
                $this->__response = [
                    'error' => new ErrorResponse(Response::CODE_REJECTED, __getFirstArrayItem($form->firstErrors)),
                    'data' => null,
                ];
                return $this->__response;
            }
        }

        $user = $form->cards();
        if (!$user) {
            $this->__response = [
                'error' => new ErrorResponse(Response::CODE_REJECTED, 'User not found'),
                'data' => null,
            ];
            return $this->__response;
        }
        $this->__response = [
            'error' => [],
            'data' => UserCardInfo::transform($user),
        ];
        return $this->__response;
    }

    public function actionAddCard()
    {
        $form = new UserCardsForm();
        $form->scenario = UserCardsForm::SCENARIO_NEW;
        $form->load($this->getRequestBodyParams(),'user');

        if(!$form->validate()) {
            if ($form->getFirstErrors()) {
                $this->__response = [
                    'error' => new ErrorResponse(Response::CODE_REJECTED, __getFirstArrayItem($form->firstErrors)),
                    'data' => null,
                ];
                return $this->__response;
            }
        }
        $user = $form->setCard();
        if(isset($user['error']) && $user['error'] == true) {
            $this->__response = [
                'error' => new ErrorResponse(Response::CODE_REJECTED, $user['description']),
                'data' => null,
            ];
            return $this->__response;
        }
        $this->__response = [
            'error' => null,
            'data' => UserCardInfo::transform($user),
        ];
        return $this->__response;
    }

    public function actionDeleteCard()
    {
        $form = new UserCardsForm();
        $form->scenario = UserCardsForm::SCENARIO_DELETE;
        $form->load($this->getRequestBodyParams(),'user');

        if(!$form->validate()) {
            if ($form->getFirstErrors()) {
                $this->__response = [
                    'error' => new ErrorResponse(Response::CODE_REJECTED, __getFirstArrayItem($form->firstErrors)),
                    'data' => null,
                ];
                return $this->__response;
            }
        }
        $user = $form->deleteCard();
        if(isset($user['error']) && $user['error'] == true) {
            $this->__response = [
                'error' => new ErrorResponse(Response::CODE_REJECTED, $user['description']),
                'data' => null,
            ];
            return $this->__response;
        }
        $this->__response = [
            'error' => null,
            'data' => UserCardInfo::transform($user),
        ];
        return $this->__response;
    }

}