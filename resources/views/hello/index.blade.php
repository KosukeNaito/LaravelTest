<html>
<head>
<title>Hello/index</title>
</head>
<body>
<h1>Index</h1>
<p>This is a sample page with php-template.</p>
@isset ($msg)
<p>こんにちは{{$msg}}さん</p>
@else
<p>なにかかいてください</p>
@endisset
<form method='POST' action='/hello/post'>
    {{csrf_field()}}
    <input type="text" name="msg">
    <input type="submit">
</form>
</body>
</html>