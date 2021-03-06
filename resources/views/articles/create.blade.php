@extends('layouts.app')

@section('content')

    <h1>Write a new article</h1>
    <hr/>

    {!!Form::model($article,['method'=>'POST','url'=>"articles"])!!}

    @include('articles.form',['submitButtonText'=>'Add Article'])

    {!! Form::close() !!}

    @include('errors.list')

@stop