@extends('layout')
@section('content')
    <h1>Machine Tags</h1>
    <ul>
        @foreach ($machinetags as $mtag)
            <li><a href="{{route('tagged', ['machinetag'=>$mtag->namespace.':'.$mtag->predicate.'='.$mtag->value])}}">{{$mtag->namespace}}:{{$mtag->predicate}}={{$mtag->value}} ({{$mtag->links_count}})</a></li>
            
        @endforeach
    </ul>
@endsection