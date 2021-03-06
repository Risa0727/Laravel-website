<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Requests\ArticleRequest;
// use Carbon\Carbon;

class ArticlesController extends Controller
{
    //
    public function index() {
      // $articles = Article::all();
      $articles = Article::latest('published_at')
                    ->latest('created_at')
                    ->published()
                    // ->take(10)
                    ->get();

      return view('articles.index', compact('articles'));
    }

    public function show($id) {
      $article = Article::findOrFail($id);

      return view('articles.show', compact('article'));
    }
    public function create() {
      $article = '';
      return view('articles.create', compact('article'));
    }

    public function store(ArticleRequest $request) {
      // save data to DB
      $validated = $request->validated();
      Article::create($validated);
      \Flash::success('The article has been created.');

      // return redirect('articles');
      return redirect()->route('articles.index');
    }

    public function edit($id) {
      $article = Article::findOrFail($id);

      return view('articles.edit', compact('article'));
    }

    public function update(ArticleRequest $request, $id) {
      $article = Article::findOrFail($id);

      $article->update($request->validated());
      \Flash::success('The article has been updated.');

      // return redirect(url('articles', [$article->id]));
      return redirect()->route('articles.index', [$article->id]);
    }

    public function destroy($id) {
      $article = Article::findOrFail($id);
      $article->delete();
      \Flash::success('The article has been deleted');

      // return redirect('articles');
      return redirect()->route('articles.index');
    }

}
