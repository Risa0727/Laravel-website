@extends('layout')
@section('content')
<div class="header d-flex justify-content-between">
  <h1>Bulletin board</h1>
  @if (Route::has('login'))
    <div class="">
      @auth
        <a href='./articles/create' class="btn btn-primary">Create New</a>
      @else
        <a class="btn btn-primary disabled" aria-disabled="true">Create New</a>
      @endauth
    </div>
  @endif
</div>
  <hr/>


  @foreach($articles as $article)
    <article class="list-group">
      <h2 class="list-group-item">
        <a class="btn btn-link" href="{{ url('articles', $article->id) }}">
        {{ $article->title }}
        </a>
      </h2>
    </article>
  @endforeach

@endsection
