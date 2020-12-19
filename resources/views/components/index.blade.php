@extends('layouts.helloapp')

@section('content')
    <p>ここが本文のコンテンツです。</p>
    <p>必要なだけ記述できます。</p>

    @component('components.message')
        @slot('msg_title')
        CAUSION!
        @endslot

        @slot('msg_content')
        これはメッセージの表示です。
        @endslot
    @endcomponent

    @include('components.message', ['msg_title'=>'OK', 'msg_content'=>'サブビューです。'])

    @each('components.item', $data, 'item')
@endsection
