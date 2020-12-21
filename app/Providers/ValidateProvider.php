<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Validator;
use App\Http\Validators\HelloValidator;

class ValidateProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //バリデータはapp['validator']に保管されている
        $validator = $this->app['validator'];

        //バリデータのリゾルブの処理を設定
        $validator->resolver(function($translator, $data, $rules, $messages) {
            return new HelloValidator($translator, $data, $rules, $messages);
        });
    }

/*
    一つのコントローラでしか使わないときはこっちのほうがいい
    public function boot()
    {
        Validator::extend('hello', function($attribute, $value, $parameters, $validator) {
            return $value %2 == 0;
        });
    }
*/

}
