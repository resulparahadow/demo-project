<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class ApiController extends Controller
{

    public function success(array $data = [])
    {
        return response ()->json([
            'success' => true,
            'data'=> $data,
        ]);
    }

    public function error($error, array $additional = [])
    {

        error($error, $additional);

    }

}
