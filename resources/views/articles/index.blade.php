@extends('layouts.app')

@section('content')
    <h1>Articles</h1>
    <hr>
    @foreach($articles as $article)

        <article>
            <h2>
                <a href="{{url('/articles',$article->id)}}">{{$article->title}}</a>
            </h2>
            <div class="body">
                {{$article->body}}
            </div>
            <br><p><b>Published:</b>{{$article->published_at->diffForHumans()}}</p>
           <p><b>Created By:</b>{{$article->user->name}}</p>
        </article>

    @endforeach

@stop