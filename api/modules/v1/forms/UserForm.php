<?php


namespace api\forms;


use api\responses\Response;
use common\models\User;
use common\models\UserDevice;
use yii\base\Exception;
use yii\base\Model;
use yii\web\ForbiddenHttpException;

class UserForm extends Model
{
    public $phone;
    public $device_id;
    public $device_type;
    public $sdk_version;

    CONST TYPE_ANDROID = 'android';
    CONST TYPE_IOS = 'ios';

    public function rules()
    {
        return [
            [['phone', 'device_id', 'device_type', 'sdk_version'], 'required'],
            [['phone', 'device_id', 'device_id'], 'string'],
            ['sdk_version', 'integer'],
            ['phone', 'match', 'pattern' => '/^(998[0-9]{9})$/', 'message' => "{attribute}: Wrong format phone number"],
            ['device_type', 'in', 'range' => [self::TYPE_ANDROID, self::TYPE_IOS]],
        ];
    }

    public function user()
    {
        $user = User::find()->where(['username' => $this->phone, 'status' => User::STATUS_ACTIVE])->one();
        if(!$user) {
            $user = new User();
            $user->username = $this->phone;
            $user->role = User::ROLE_USER;
            $user->status = User::STATUS_ACTIVE;
            $user->generateAuthKey();
            $user->setPassword($this->shuffle());
            if ($user->validate()) {
                $user->save();
                $this->createUserDevice($user);
                return $user;
            }
        }
        $userDevice = UserDevice::findOne(['device_id' => $this->device_id, 'user_id' => $user->id]);
        if (!$userDevice) {
            $this->createUserDevice($user);
        }
        return $user;
//        throw new Exception(__getFirstArrayItem($user->firstErrors));
    }

    private function shuffle()
    {
        return str_shuffle('abcdPOIUY'.rand((int) time()/2, time()).'XyZ%$_');
    }

    /**
     * @param $user
     * @return UserDevice
     * @throws Exception
     */
    private function createUserDevice($user)
    {
        $userDevice = new UserDevice();
        $userDevice->user_id = $user->id;
        $userDevice->device_type = $this->getDeviceType()[$this->device_type];
        $userDevice->device_id = $this->device_id;
        $userDevice->sdk_version = (string) $this->sdk_version;
        if (!$userDevice->validate()) {
            throw new Exception(__getFirstArrayItem($userDevice->firstErrors), Response::CODE_REJECTED);
        }
        $userDevice->save();
        return $userDevice;
    }

    private function getDeviceType()
    {
        return [
            self::TYPE_ANDROID => UserDevice::DEVICE_TYPE_ANDROID,
            self::TYPE_IOS => UserDevice::DEVICE_TYPE_IOS,
        ];
    }

}