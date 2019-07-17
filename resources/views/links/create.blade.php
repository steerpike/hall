@extends('layout')
@section('content')
    <h1>Create a Link</h1>
    <form action="/links" method="post">
        {{ csrf_field() }}
        <div>
            <input type="text" name="title" id="title" placeholder="title">
        </div>
        <div>
            <input type="text" name="url" id="url" placeholder="url">
        </div>
        <div>
            <textarea name="description" id="description" cols="30" rows="10"></textarea>
        </div>
        <div>
            <textarea name="notes" id="notes" cols="30" rows="10"></textarea>
        </div>
        @foreach ($machinetags as $machinetag)
        <div>
            <input type="checkbox" name="tags[]" value="{{$machinetag->label}}" />{{$machinetag->label}}
        </div>
        @endforeach
        <div>
            <input type="text" name="machinetag" id="machinetag" placeholder="namespace:predicate=value">
        </div>
        <div>
            <button type="submit">Create Link</button>
        </div>
    </form>
@endsection