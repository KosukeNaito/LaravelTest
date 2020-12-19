@extends('layouts.helloapp')

@section('content')
<p>ここが本文のコンテンツです。</p>
<p>Cotroller value <br> 'message' = {{$message}}</p>
<p>ViewComposer value<br> 'view_message' = {{$view_message}}</p>
@endsection