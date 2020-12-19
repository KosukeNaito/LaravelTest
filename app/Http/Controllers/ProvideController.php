<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProvideController extends Controller
{
    //
    public function index() {
        return view('provider.index', ['message'=>'Hello!']);
    }
}
