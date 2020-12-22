@extends('layouts.helloapp')

<header>
<style>
    th {background-color:#999; color:fff; padding:5px 10px;}
    td {border: solid 1px #aaa; color:#999; padding:5px 10px;}
</style>
</header>

@section('content')

    <table>
    <tr><th>Name</th><th>Mail</th><th>Age</th></tr>
    @foreach ($items as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->mail}}</td>
            <td>{{$item->age}}</td>
        </tr>
    @endforeach
    </table>

@endsection
