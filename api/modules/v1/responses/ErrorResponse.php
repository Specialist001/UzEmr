<?php

namespace api\modules\v1\responses;


class ErrorResponse
{
    public $code;
    public $description;

    public function __construct($code, $description)
    {
        $this->code         = $code;
        $this->description  = $description;
    }
}