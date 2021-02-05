<?php
namespace api\modules\v1\transformers\Laboratory;


class LaboratoryInfo
{
    public static function collection($laboratories)
    {
        $data = [];
        $loop = 0;
        foreach ($laboratories as $laboratory) {
            $data[$loop] = self::laboratory($laboratory);

//            foreach ($laboratory->doctors as $doctor) {
//                $data[$loop]['doctors'][] = self::doctor($doctor);
//            }
            $loop++;
        }

        return $data;
    }

    public static function transform($laboratory)
    {
        $data = [];
        $loop = 0;

        $data = self::laboratory($laboratory);

//        foreach ($laboratory->doctors as $doctor) {
//            $data['doctors'][] = self::doctor($doctor);
//            $loop++;
//        }

        return $data;
    }

    private static function laboratory($laboratory)
    {
        $data = [
            'id' => $laboratory->id,
            'name' => $laboratory->name,
            'user_id' => $laboratory->user_id,
            'username' => $laboratory->user->username,
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