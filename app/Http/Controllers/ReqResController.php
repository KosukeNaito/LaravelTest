<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReqResController extends Controller
{
    // 
    public function __invoke(Request $request, Response $response) {
        return "<h3>Request</h3>{$request}<h3>Response</h3>{$response}";
    }
}
