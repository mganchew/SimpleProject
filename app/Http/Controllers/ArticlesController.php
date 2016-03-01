<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{

    public function __construct(){

        $this->middleware('auth',['only'=>'create']);

    }

    public function index(){

        $articles = Article::latest('published_at')->published()->get();

        return view('articles.index')->with('articles',$articles);

    }

    public function show(Article $article){

        return view('articles.show')->with('article',$article);

    }

    public function create(){

        return view('articles.create');

    }

    public function store(Requests\ArticleRequest $request){

        //Auto filling user_id
        $article = new Article($request->all());
        Auth::user()->articles()->save($article);

        return redirect('articles');

    }

    public function edit(Article $article){

        return view('articles.edit')->with('article',$article);

    }

    public function update(Article $article,Requests\ArticleRequest $request){

        $input = $input = $request->all();
        $article->update($input);

        return redirect('articles');
    }
}
