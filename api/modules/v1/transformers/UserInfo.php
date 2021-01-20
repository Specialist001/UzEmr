<?php


namespace api\transformers;


use common\models\User;

class UserInfo
{
    public static function transform(User $user)
    {
        $data = [];
        $loop = 0;
        $data = $user->toArray();
        unset($data['auth_key']);
        unset($data['password_hash']);
        unset($data['password_reset_token']);
        unset($data['email']);
        unset($data['verification_token']);
        unset($data['created_at']);
        unset($data['updated_at']);
        if ($user->userDevices) {
            foreach ($user->userDevices as $device) {
                $data['devices'][$loop] = [
                    'id' => $device->id,
                    'user_id' => $device->user_id,
                    'device_id' => $device->device_id,
                    'device_type' => $device->deviceTypeName,
                    'sdk_version' => (int) $device->sdk_version,
                ];

                $loop++;
            }
        } else {
            $data['devices'] = [];
        }
        $loop = 0;
        if ($user->userCards) {
            foreach ($user->userCards as $card) {
                $data['cards'][$loop] = [
                    'id' => $card->id,
                    'user_id' => $card->user_id,
                    'card_id' => $card->card_id,
                ];
                $loop++;
            }
        } else {
            $data['cards'] = [];
        }
        return $data;
    }
}