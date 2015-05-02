@extends('app')

@section('content')

    <h1>Articles - <a href="articles/create">Create New</a></h1>
    <hr />

    @if (count($articles))
        @foreach($articles as $article)
            <articl>
                <h2>
                    <?php
                        // url('/articles', $article->id)
                    ?>
                    <a href="{{ action('ArticlesController@show', [$article->id]) }}">{{ $article->title }}</a>
                </h2>
                <div class="body">
                    {{ $article->body }}
                </div>
            </articl>
        @endforeach
    @endif

@stop