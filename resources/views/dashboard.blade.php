@extends('layout')
@section('content')
    <header class="bg-red-100">

        <h1 class="py-4">Hall of Bright Carvings</h1>
    </header>
    <div class="container mx-auto">
        <div class="flex">
            <div class="flex-auto">
                <h2>Latest Links</h2>
                <ul>
                    @foreach ($links as $link)
                        <li>
                        @include('links.item')
                        
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="flex-auto">
                <h2>Machine Tags</h2>
                <ul>
                    @foreach ($machinetags as $mtag)
                        <li><a href="{{route('tagged', ['machinetag'=>$mtag->namespace.':'.$mtag->predicate.'='.$mtag->value])}}">{{$mtag->label}} ({{$mtag->links_count}})</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection