@extends('app')

@section('content')

    <h1>{{$article->title}}</h1>

    <article>
        {{$article->body}}
    </article>
    <br>

    <p><b>Published:</b>{{$article->published_at->diffForHumans()}}</p>

@stop