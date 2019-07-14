<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/main.css" media="screen" />

    <title>Homepage</title>
</head>
<body>
    <header>
        <h1 class="bg-red-100">Hall of Bright Carvings</h1>
    </header>
    <div class="flex">
        <div class="flex-auto">
            <h2>Latest Links</h2>
            <ul>
                @foreach ($links as $link)
                    <li>
                    <a href="{{ $link->url }}">{{ $link->title }} ({{ $link->created_at->format('Y-m-d') }})</a> <a href="/links/{{ $link->id}}">Show</a>
                    <div class="flex">
                        <div class="bg-blue-100">
                            <h3>Description</h3>
                            <p>{{ $link->description }}</p>
                        </div>
                        <div class="bg-green-100">
                            <h3>Notes</h3>
                            <p>{{ $link->notes }}</p>
                        </div>
                    </div>
                        <ul>
                            @foreach ($link->machinetags as $machinetag)
                                <li><a href="{{route('tagged', ['machinetag'=>$machinetag->namespace.':'.$machinetag->predicate.'='.$machinetag->value])}}">{{$machinetag->namespace}}:{{$machinetag->predicate}}={{$machinetag->value}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="flex-auto bg-yellow-100">
            <h2>Machine Tags</h2>
            <ul>
                @foreach ($machinetags as $mtag)
                    <li><a href="{{route('tagged', ['machinetag'=>$mtag->namespace.':'.$mtag->predicate.'='.$mtag->value])}}">{{$mtag->namespace}}:{{$mtag->predicate}}={{$mtag->value}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</body>
</html>