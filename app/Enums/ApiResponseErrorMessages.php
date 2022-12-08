<?php

namespace App\Enums;

use Illuminate\Http\Response;

class ApiResponseErrorMessages {

    const NOT_FOUND = [
        'error' => 'NOT_FOUND',
        'msg' => 'This route cannot be found!',
        'status' => Response::HTTP_NOT_FOUND,
    ];

    const UNEXPECTED_ERROR = [
        'error' => 'UNEXPECTED_ERROR',
        'msg' => 'Unexpected error occured!',
        'status' => Response::HTTP_INTERNAL_SERVER_ERROR,
    ];

    static function getErrorDetail($error){

        $self = self::class;

        if (defined("$self::$error")) {
            return constant("$self::$error");
        }

        return self::UNEXPECTED_ERROR;
    }
}
