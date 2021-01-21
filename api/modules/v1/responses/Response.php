<?php


namespace api\modules\v1\responses;


class Response
{
    const CODE_SUCCESS  = 0;
    const CODE_REJECTED = 1;
    const CODE_SYSTEM   = 2;
    const CODE_REFUND   = 3;
    const CODE_TYPE     = 4;

    public $error;
    public $response;

    public function __construct(ErrorResponse $error)
    {
        $this->error = $error;
    }

    public static function error($code, $description)
    {
        return static::excerpt(new ErrorResponse($code, $description));
    }

    public static function rejected($description)
    {
        return static::excerpt(new ErrorResponse(static::CODE_REJECTED, $description));
    }

    private static function excerpt(ErrorResponse $errorResponse)
    {
        $response = new static($errorResponse);
        unset($response->response);
        return $response;
    }

    public static function success($res, $message = null)
    {
        $response = new static(new ErrorResponse(static::CODE_SUCCESS, $message));
        $response->response = $res;
        if(empty($response->response)) {
            unset($response->response);
        }
        return $response;
    }
}