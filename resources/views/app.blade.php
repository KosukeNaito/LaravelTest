<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<title>アプリ名 @yield('title')</title>
</head>
<body>
    @section('template')
        <input type='button' value='うんこ'>
    @show

    <div class='container'>
        @yield('content')
    </div>
</body>
</html>