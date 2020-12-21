<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HelloRequest;
use Validator;

class ValidateController extends Controller
{
    //
    public function index(Request $request) {
        return view('validate.index', ['msg'=>'フォームを入力：']);
    }

    public function post(Request $request) {
        $validate_rule = [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric|between:0,150',
        ];
        $this->validate($request, $validate_rule);
        return view('validate.index', ['msg'=>'正しく入力されました！']);
    }

    public function customPost(HelloRequest $request) {
        return view('validate.index', ['msg'=>'正しく入力されました！']);
    }

    public function valiPost(HelloRequest $request) 
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'mail' => 'email',
            'age'  => 'numeric|between:0,150',
        ]);
        if ($validator->fails()) {
            return redirect('/validate/index')
                    ->withErrors($validator)
                    ->withInput();
        }

        return view('validate.index', ['msg'=>'正しく入力されました！']);
    }

}
