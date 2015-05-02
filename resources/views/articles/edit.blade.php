@extends('app')

@section('content')

    <h1>Edit Article: {{ $article->title }}</h1>

    {!! Form::model($article, ['method' => 'PATCH', 'action' => ['ArticlesController@update', $article->id]]) !!}

        @include('articles.form', ['btn' => 'Edit Article'])

    {!! Form::close() !!}

    @include('errors.list')

@stop