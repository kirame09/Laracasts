@extends('app')

@section('content')

    <h1>Create New Article</h1>

    {!! Form::model($article = new \App\Article, ['url' => 'articles']) !!}

        @include('articles.form', ['btn' => 'Add Article'])

    {!! Form::close() !!}

    @include('errors.list')

@stop