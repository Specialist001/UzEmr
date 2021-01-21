<?php


namespace api\modules\v1\transformers;


use common\models\User;

class UserInfo
{
    public static function transform(User $user)
    {
        $data = [];
        $loop = 0;
        $data = $user->toArray();
//        unset($data['auth_key']);
        unset($data['password_hash']);
        unset($data['password_reset_token']);
        unset($data['email']);
        unset($data['verification_token']);
        unset($data['created_at']);
        unset($data['updated_at']);
        if ($user->patient) {
            $data['patient'] = [
                'id' => $user->patient->id,
                'user_id' => $user->patient->user_id,
                'first_name' => $user->patient->first_name,
                'middle_name' => $user->patient->middle_name,
                'last_name' => $user->patient->last_name,
                'status' => (bool) $user->patient->status,
            ];
        } else {
            $data['patient'] = [];
        }
        if ($user->doctor) {
            $data['doctor'] = [
                'id' => $user->doctor->id,
                'user_id' => $user->doctor->user_id,
                'speciality_id' => $user->doctor->speciality_id,
                'speciality_name' => $user->doctor->speciality->name,
                'first_name' => $user->doctor->first_name,
                'middle_name' => $user->doctor->middle_name,
                'last_name' => $user->doctor->last_name,
                'status' => (bool) $user->doctor->status,
            ];
        } else {
            $data['doctor'] = [];
        }
        if ($user->employee) {
            $data['employee'] = [
                'id' => $user->employee->id,
                'user_id' => $user->employee->user_id,
                'first_name' => $user->employee->first_name,
                'middle_name' => $user->employee->middle_name,
                'last_name' => $user->employee->last_name,
                'status' => (bool) $user->employee->status,
            ];
        } else {
            $data['employee'] = [];
        }

        $loop = 0;
        if ($user->userTokens) {
            foreach ($user->userTokens as $userToken) {
                $data['userTokens'][$loop] = [
                    'id' => $userToken->id,
                ];
                $loop++;
            }
        } else {
            $data['userTokens'] = [];
        }
        return $data;
    }
}