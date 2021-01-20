<?php


namespace api\forms;


use common\models\ApiUser;
use yii\base\Model;

class AuthForm extends Model
{
    public  $access_token;
    public  $company_id;

    public function rules()
    {
        return [
            [['access_token', 'company_id'], 'required'],
            [['access_token', 'company_id'], 'string'],
        ];
    }


}