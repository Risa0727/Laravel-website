<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Requests\ArticleRequest;

class ArticlesController extends Controller
{
    //
    public function index() {
      $articles = Article::all();

      return view('articles.index', compact('articles'));
    }

    public function show($id) {
      $article = Article::findOrFail($id);

      return view('articles.show', compact('article'));
    }
    public function create() {
      return view('articles.create');
    }

    public function store(ArticleRequest $request) {
      // dd($inputs);

      // save data to DB
       $validated = $request->validated();
      Article::create($validated);

      return redirect('articles');
    }


}
