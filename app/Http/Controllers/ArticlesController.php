<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Controllers\Auth\AuthController;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth', ['only' => 'create']);

    }

    public function index()
    {

        $articles = Article::latest('published_at')->published()->get();

        return view('articles.index')->with('articles', $articles);

    }

    public function show(Article $article)
    {

        if ($article->published_at > Carbon::now()) {
            return abort(404);
        }
        return view('articles.show')->with('article', $article);

    }

    public function create()
    {

        $tags = Tag::lists('name', 'id');
        return view('articles.create')->with('tags', $tags);

    }

    public function store(Requests\ArticleRequest $request)
    {

        //Auto filling user_id
        $article = new Article($request->all());
        Auth::user()->articles()->save($article);

        $tagIds = $request->input('tag_list');
        $article->tags()->sync($tagIds);

        //laravel 5.2 way to flash message
        $request->session()->flash('flash_message', 'Your article has been created!');

        return redirect('articles');

    }

    public function edit(Article $article)
    {

        $tags = Tag::lists('name', 'id');
        return view('articles.edit')->with([
            'article' => $article,
            'tags' => $tags
        ]);

    }

    public function update(Article $article, Requests\ArticleRequest $request)
    {

        $input = $input = $request->all();
        $article->update($input);

        $tagIds = $request->input('tag_list');
        $article->tags()->sync($tagIds);

        return redirect('articles');
    }
}
