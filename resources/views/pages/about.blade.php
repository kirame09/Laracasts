@extends('app')

@section('content')

    <p>About Me: {{ $first }} {{ $last }}</p>

    @if (count($people))
        @foreach($people as $person)
            <p>{{ $person }}</p>
        @endforeach
    @endif

@stop