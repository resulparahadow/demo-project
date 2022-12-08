<?php

use \App\Enums\ApiResponseErrorMessages;

function error(string $error, array $additional = [])
{
    $class = get_class(new ApiResponseErrorMessages());
    $errorDetail = constant("$class::$error");

    $data = ['success' => false] + ['error' => $errorDetail['error'], 'msg' => $errorDetail['msg']] + $additional;

    return abort(
        response($data, $errorDetail['status']),
    );
}
