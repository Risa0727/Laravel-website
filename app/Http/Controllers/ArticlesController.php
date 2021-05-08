<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Requests\ArticleRequest;
use Carbon\Carbon;

class ArticlesController extends Controller
{
    //
    public function index() {
      // $articles = Article::all();
      $articles = Article::orderBy('published_at')
                    ->latest('created_at')
                    ->where('published_at', "<=", Carbon::now())
                    // ->take(10)
                    ->get();

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
