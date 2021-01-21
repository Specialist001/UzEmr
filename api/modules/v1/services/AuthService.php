<?php

namespace api\modules\v1\services;

use api\forms\AuthForm;
use common\models\ApiUser;
use Exception;

class AuthService
{
    const ERROR_CODE    = 1;
    const ERROR_MESSAGE = "Authorization error";

    private $_user;

    public function login(AuthForm $form)
    {
        if ($this->checkAuth($form->access_token)) {
            $tokenArr = $this->tokenExplode($form->access_token);
            $this->_user = $this->checkUser($tokenArr[0]);
        }
        if(empty($this->_user)) {
            throw new Exception(static::ERROR_MESSAGE, static::ERROR_CODE);
        }
    }

    public function checkAuth($access_token)
    {
        $tokenArr = $this->tokenExplode($access_token);
        if($tokenArr) {
            $user = $this->checkUser($tokenArr[0]);
            $salt = $tokenArr[1];
            $hash = $tokenArr[2];
            if ($user) {
                $checkHash = $this->checkHash($user, $salt, $hash);
                return $checkHash;
            }
        }
        return false;
    }

    private function tokenExplode($token)
    {
        $pieces = explode("-", $token);
        if (count($pieces) === 3) {
            return $pieces;
        }
        return false;
    }

    public static function getUserByAccessToken($token)
    {
        $username = self::tokenExplode($token);
        if ($username) {
            return ApiUser::findByUsername($username);
        }
        return false;
    }

    private function checkUser($username)
    {
        $user = ApiUser::findByUsername($username);
        return $user;
    }

    private function checkHash(ApiUser $user, $salt, $hash)
    {
        $authKey = $user->auth_key;
        $checkHash = md5($salt.'-'.ApiUser::mbStringReverse($authKey));
        return $hash === $checkHash;
    }
}