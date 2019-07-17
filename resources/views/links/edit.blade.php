@extends('layout')
@section('content')
    <h1>Edit a Link</h1>
    <form action="{{ route('links.update', $link->id) }}" method="post">
        @method('PATCH') 
        {{ csrf_field() }}
        <div>
            <input type="text" name="title" id="title" value="{{$link->title}}">
        </div>
        <div>
            <input type="text" name="url" id="url" value="{{$link->url}}">
        </div>
        <div>
            <textarea name="description" id="description" cols="30" rows="10">{{$link->description}}</textarea>
        </div>
        <div>
            <textarea name="notes" id="notes" cols="30" rows="10">{{$link->notes}}</textarea>
        </div>
        <div>
            @foreach ($machinetags as $machinetag)
                <div>
                @if(in_array($machinetag->id, $checkeds))
                    <input type="checkbox" name="machinetags[]" id="machinetags[]" 
                    value="{{$machinetag->label}}" checked /> 
                    true           
                    {{$machinetag->label}}
                </div>
                @else
                    <input type="checkbox" name="machinetags[]" id="machinetags[]" 
                    value="{{$machinetag->label}}" />      
                    false      
                    {{$machinetag->label}}
                @endif
            @endforeach
        </div>
        <div>
            <input type="text" name="machinetag" id="machinetag" placeholder="namespace:predicate=value">
        </div>
        <div>
            <button type="submit">Edit Link</button>
        </div>
    </form>
@endsection