<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    //

    public function index() {
        return view("child");
    }

    public function other() {
        return view("app");
    }
}
