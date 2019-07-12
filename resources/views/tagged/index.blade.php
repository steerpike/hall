<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Machine Tags</title>
</head>
<body>
    <h1>Machine Tags</h1>
    <ul>
        @foreach ($machinetags as $mtag)
            <li><a href="{{route('tagged', ['machinetag'=>$mtag->namespace.':'.$mtag->predicate.'='.$mtag->value])}}">{{$mtag->namespace}}:{{$mtag->predicate}}={{$mtag->value}}</a></li>
        @endforeach
    </ul>
</body>
</html>