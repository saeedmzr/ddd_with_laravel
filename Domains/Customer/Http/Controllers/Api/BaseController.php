<?php

namespace Domains\Customer\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class BaseController extends Controller
{

    protected static function errorResponse($data = [], $message = 'server error', $status_code = 400)
    {
        return response()->json([
            'data' => $data,
            'result' => 'error',
            'message' => $message,
        ], $status_code);
    }

    protected static function successResponse($data = [], $message = 'success', $status_code = 200)
    {
        return response()->json([
            'data' => $data,
            'result' => 'success',
            'message' => $message,
        ], $status_code);
    }

}
