<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homepage</title>
</head>
<body>
    <div style="display:flex;">
        <div style="flex:70%;">
            <h1>Latest Links</h1>
            <ul>
                @foreach ($links as $link)
                    <li>
                    <a href="{{ $link->url }}">{{ $link->title }} ({{ $link->created_at->format('Y-m-d') }})</a> <a href="/links/{{ $link->id}}">Show</a>
                    <p>{{ $link->description }}</p>
                    <p>{{ $link->notes }}</p>
                        <ul>
                            @foreach ($link->machinetags as $machinetag)
                                <li><a href="{{route('tagged', ['machinetag'=>$machinetag->namespace.':'.$machinetag->predicate.'='.$machinetag->value])}}">{{$machinetag->namespace}}:{{$machinetag->predicate}}={{$machinetag->value}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>
        <div style="flex:50%;">
            <h1>Machine Tags</h1>
            <ul>
                @foreach ($machinetags as $mtag)
                    <li><a href="{{route('tagged', ['machinetag'=>$mtag->namespace.':'.$mtag->predicate.'='.$mtag->value])}}">{{$mtag->namespace}}:{{$mtag->predicate}}={{$mtag->value}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</body>
</html>