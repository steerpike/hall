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
        @include('links.item')
        </li>
    @endforeach
</ul>
@endsection