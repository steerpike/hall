@extends('layout')
@section('content')
    <h1>Edit a Link</h1>
    <form action="{{ route('links.update', $link->id) }}" method="post">
        @method('PATCH') 
        {{ csrf_field() }}
        <div>
            <input type="text" name="title" id="title" placeholder="{{$link->title}}">
        </div>
        <div>
            <input type="text" name="url" id="url" placeholder="{{$link->url}}">
        </div>
        <div>
            <textarea name="description" id="description" cols="30" rows="10">{{$link->description}}</textarea>
        </div>
        <div>
            <textarea name="notes" id="notes" cols="30" rows="10">{{$link->notes}}</textarea>
        </div>
        <div>
            @foreach ($link->machinetags as $machinetag)
            <input type="text" name="machinetag" id="machinetag" placeholder="{{$machinetag->namespace}}">            
            @endforeach
        </div>
        <div>
            <button type="submit">Edit Link</button>
        </div>
    </form>
@endsection