<?php

namespace api\modules\v1\transformers;

use Yii;

class MetaData
{
    public static function transform($pagination){

        $data = [
            'totalCount' => $pagination->totalCount,
            'perPage' => (int) Yii::$app->params['pageSize'],
            'pageCount' => ceil($pagination->totalCount / Yii::$app->params['pageSize']),
        ];

        return $data;
    }
}