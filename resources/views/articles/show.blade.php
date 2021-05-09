@extends('layout')
@section('content')

  <h1>{{ $article->title }}</h1>

  <hr/>

  <article>
    <dic class='body'> {{ $article->body }} </dic>
  </article>

  <hr/>
  
  <div>
    <a href="{{ action('App\Http\Controllers\ArticlesController@edit', [$article->id]) }}"
      class="btn btn-primary">
      Edit
    </a>
    <a href="{{ action('App\Http\Controllers\ArticlesController@index') }}"
      class="btn btn-secondary float-right">
      Back to a list
    </a>
  </div>
@endsection
