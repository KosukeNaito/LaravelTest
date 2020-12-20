<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    //
/*
    public function index() {
        return view("child");
    }
*/
    public function other() {
        return view("app");
    }

    public function template(Request $request) {
        $data = ['msg'=>'これはコントローラから渡されたメッセージです。',
                 'id'=>$request->id,
                 'data'=>$request->data
                ];
        return view('hello.index', $data);
    }

    public function blade() {
        $data = ['msg'=>'これはBladeです'];
        return view('hello.index', $data);
    }

    public function index() {
        return view('hello.index');
    }

    public function post(Request $request) {

        $data = ['msg'=> $request->msg];
        return view('hello.index', $data);
    }

}
