<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function jsonResponse($success = false, $text = '', $responseBody = [])
    {
        return response()->json((object)[
            'success'   => $success,
            'text'      => $text,
            'data'      => $responseBody
        ]);
    }
}
