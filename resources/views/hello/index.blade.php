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
<table>
@foreach($data as $item)
<tr><th>{{$item['name']}}</th><td>{{$item['mail']}}</td></tr>
@endforeach
</table>
<p>これは<middleware>google.com</middelware>へのリンクです。</p>
<p>これは<middleware>yahoo.co.jp</middleware>へのりんくです。</p>

<form method='POST' action='/hello/post'>
    {{csrf_field()}}
    <input type="text" name="msg">
    <input type="submit">
</form>
</body>
</html>