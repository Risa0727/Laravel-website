@extends('layout')
@section('content')
<div class="header d-flex justify-content-between">
  <h1>Articles</h1>
  <div class="">
    <a href='./articles/create' class="btn btn-primary">Create New</a>
  </div>
</div>
  <hr/>


  @foreach($articles as $article)
    <article>
      <h2>
        <a href="{{ url('articles', $article->id) }}">
        {{ $article->title }}
        </a>
      </h2>
    </article>
  @endforeach

@endsection
