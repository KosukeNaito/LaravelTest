<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActionController extends Controller
{
    //

    public function __invoke($id='noname', $pass='unknown') {
        return $id . " " . $pass;
    }
}
