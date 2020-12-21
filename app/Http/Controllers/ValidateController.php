<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HelloRequest;
use App\Http\Requests\ValidateRequest;
use Validator;

class ValidateController extends Controller
{
    //
    public function index(Request $request) {
        return view('validate.index', ['msg'=>'フォームを入力：']);
    }

    public function post(Request $request)
    {
        $validate_rule = [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric|between:0,150',
        ];
        $this->validate($request, $validate_rule);
        return view('validate.index', ['msg'=>'正しく入力されました！']);
    }

    public function customPost(HelloRequest $request) 
    {
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

    public function queryValiPost(Request $request) 
    {
        $validator = Validator::make($request->query(), [
            'id' => 'required',
            'pass' => 'required',
        ]);
        if ($validator->fails()) {
            $msg = 'クエリーに問題があります。';
        } else {
            $msg = 'ID/PASSを受け付けました。フォームを入力ください。';
        }

        return view('validate.index', ['msg'=>$msg, ]);
    }

    public function valiPostWithMsg(Request $request) 
    {
        $rules = [
            'name' => 'required',
            'mail' => 'email',
            'age'  => 'numeric|between:0,150',
        ];
        $messages = [
            'name.required' => '名前は必ず入力してください',
            'mail.email'    => 'メールアドレスが必要です',
            'age.numeric'   => '年齢を整数で記入ください',
            'age.between'   => '年齢は0~150の間で入力ください',
        ];

        $validator = Varidator::make($request->all(), $rules, $message);
        if ($validator->fail()) {
            return redirect('/validate/index')
                        ->withErrors($validator)
                        ->withInput();
        }
        return view('validate.index', ['msg'=>'正しく入力されました！']);
    }

    public function someValiPost(Request $request)
    {
        $rules = [
            'name' => 'required',
            'mail' => 'email',
            'age'  => 'numeric',
        ];
        $messages = [
            'name.required' => '名前は必ず入力してください',
            'mail.email'    => 'メールアドレスが必要です',
            'age.numeric'   => '年齢を整数で記入ください',
            'age.min'       => '年齢は0歳以上で入力ください',
            'age.max'       => '年齢は200歳以下で入力ください',
        ];

        $validator = Validator::make($request->all(), $rule, $messages);
        
        //第三引数がfalseを返すときに項目を追加
        $validator->sometimes('age', 'min:0', function($input) {
            return !is_int($input->age);
        });

        $validator->sometimes('age', 'max:200', function($input) {
            return !is_int($input->age);
        });

        if ($validator->fails()) {
            return redirect('/validate/index')
                    ->withErrors($validator)
                    ->withInput();
        }

        return view('validate.index', ['msg'=>'正しく入力されました！']);

    }


    public function index2(Request $request)
    {
        return view('validate.index', ['msg'=>'フォームを入力ください']);
    }

    public function post2(ValidateRequest $request)
    {
        return view('validate.index', ['msg'=>'正しく入力されました']);
    }

}
