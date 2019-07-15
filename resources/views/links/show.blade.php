@extends('layout')
@section('content')
<h1><a href="{{ $link->url }}">{{ $link->title }}</a></h1>
<div>{{ $link->description }}</div>
<p><a href="/links/{{ $link->id }}/edit">Edit</a></p>
@endsection