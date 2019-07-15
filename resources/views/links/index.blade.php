@extends('layout')
@section('content')
<h1>Links</h1>
@if(session()->get('success'))
<div>
    {{ session()->get('success') }}  
</div>
@endif
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
@endsection