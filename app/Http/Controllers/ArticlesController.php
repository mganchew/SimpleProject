<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticlesController extends Controller
{
    public function index(){

        $articles = Article::latest('published_at')->published()->get();

        return view('articles.index')->with('articles',$articles);

    }

    public function show($id){

        $article = Article::findOrFail($id);
        return view('articles.show')->with('article',$article);

    }

    public function create(){

        return view('articles.create');

    }

    public function store(Requests\ArticleRequest $request){

        $input = $request->all();

        Article::create($input);

        return redirect('articles');

    }

    public function edit($id){

        $article = Article::findOrFail($id);
        return view('articles.edit')->with('article',$article);

    }

    public function update($id,Requests\ArticleRequest $request){

        $input = $input = $request->all();

        $article = Article::findOrFail($id);
        $article->update($input);

        return redirect('articles');
    }
}
