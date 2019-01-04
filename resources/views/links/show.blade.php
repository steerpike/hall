<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Link</title>
</head>
<body>
<h1><a href="{{ $link->url }}">{{ $link->title }}</a></h1>
<div>{{ $link->description }}</div>
<p><a href="/links/{{ $link->id }}/edit">Edit</a></p>
</body>
</html>