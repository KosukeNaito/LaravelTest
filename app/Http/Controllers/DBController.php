<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DBController extends Controller
{
    //
    //普通の
    public function index(Request $request)
    {
        $items = DB::select('select * from people');
        return view('db', ['items'=>$items]);
    }

    //プレースホルダー使うやつ URLに?id=xってやる
    public function index2(Request $request)
    {
        if (isset($request->id))
        {
            $param = ['id' => $request->id];
            $items = DB::select('select * from people where id = :id', $param);
        } else {
            $items = DB::select('select * from people');
        }

        return view('db.index', ['items' => $items]);
    }

    public function post(Request $request)
    {
        $items = DB::select('select * from people');
        return view('db.index', ['items' => $items]);
    }

    public function add(Request $request)
    {
        return view('db.add');
    }

    public function create(Request $request)
    {
        $param = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age'  => $request->age,
        ];

        DB::insert('insert into people (name, mail, age) values (:name, :mail, :age)', $param);
        return redirect('/db/index');
    }

    public function edit(Request $request)
    {
        $param = ['id' => $request->id];
        $item = DB::select('select * from people where id = :id', $param);
        return view('db.edit', ['form' => $item[0]]);
    }

    public function update(Request $request)
    {
        $param = [
            'id' => $request->id,
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];

        DB::update('update people set name = :name, mail = :mail, age = :age where id = :id', $param);
        return redirect('/db/index');
    }

    public function del(Request $request)
    {
        $param = ['id' => $request->id];
        $item = DB::select('select * from people where id = :id', $param);
        return view('db.del', ['form' => $item[0]]);
    }

    public function remove(Request $request)
    {
        $param = ['id' => $request->id];
        DB::delete('delete from people where id = :id', $param);
        return redirect('/db/index');
    }

    public function qbIndex(Request $request)
    {
        $items = DB::table('people')->get();
        return view('db.index', ['items' => $items]);
    }

    public function show(Request $request)
    {
        $name = $request->name;
        $items = DB::table('people')
            ->where('name', 'like', '%'.$name.'%')
            ->orWhere('mail', 'like', '%'.$name.'%')
            ->get();
        return view('db.show', ['items' => $items]);
    }

    public function showParam(Request $request)
    {
        $min = $request->min;
        $max = $request->max;
        $items = DB::table('people')
                    ->whereRaw('age >= ? and age <= ?', [$min, $max])->get();
        return view('db.show', ['items' => $items]);
    }

}
