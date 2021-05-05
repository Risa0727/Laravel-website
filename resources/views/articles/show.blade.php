@extends('layout')
@section('content')

  <h1>{{ $article->title }}</h1>

  <hr/>

  <article>
    <dic class='body'> {{ $article->body }} </dic>
  </article>

@endsection
