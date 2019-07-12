<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Links</title>
</head>
<body>
    <h1>Links</h1>
    <ul>
        @foreach ($links as $link)
            <li>
            <a href="{{ $link->url }}">{{ $link->title }}</a> <a href="/links/{{ $link->id}}">Show</a>
                <ul>
                    @foreach ($link->machinetags as $machinetag)
                        <li><a href="{{route('tagged', ['machinetag'=>$machinetag->namespace.':'.$machinetag->predicate.'='.$machinetag->value])}}">{{$machinetag->namespace}}:{{$machinetag->predicate}}={{$machinetag->value}}</a></li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
</body>
</html>