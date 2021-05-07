<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

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

    public function store(Request $request) {
      // dd($inputs);
      $rules = [
        'title' => 'required|min:3',
        'body' => 'required',
        'published_at' => 'required|date',
      ];

      // コントローラの validate() メソッドを実行
      $validatedData = $this->validate($request, $rules);

      // save data to DB
      Article::create($validatedData);

      return redirect('articles');
    }


}
