<?php
namespace api\modules\v1\transformers\Clinics;


/**
 * @property \common\models\Doctor $doctor
 */

class ClinicInfo
{
    public static function collection($clinics)
    {
        $data = [];
        $loop = 0;
        foreach ($clinics as $clinic) {
            $data[$loop] = self::clinic($clinic);

            foreach ($clinic->doctors as $doctor) {
                $data[$loop]['doctors'][] = self::doctor($doctor);
            }
            $loop++;
        }

        return $data;
    }

    public static function transform($clinic)
    {
        $data = [];
        $loop = 0;

        $data = self::clinic($clinic);

        foreach ($clinic->doctors as $doctor) {
            $data['doctors'][] = self::doctor($doctor);
            $loop++;
        }

        return $data;
    }

    private static function clinic($clinic)
    {
        $data = [
            'id' => $clinic->id,
            'name' => $clinic->name,
            'user_id' => $clinic->user_id,
            'username' => $clinic->user->username,
            'doctors' => []
        ];

        return $data;
    }

    private static function doctor($doctor)
    {
        $data =  [
            'user_id' => $doctor->user_id,
            'speciality_id' => $doctor->speciality_id,
            'first_name' => $doctor->first_name,
            'middle_name' => $doctor->middle_name,
            'last_name' => $doctor->last_name,
            'status' => $doctor->status,
        ];

        return $data;
    }
}