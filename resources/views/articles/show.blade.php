@extends('layout')
@section('content')

  <h1>{{ $article->title }}</h1>

  <hr/>

  <article>
    <dic class='body'> {{ $article->body }} </dic>
  </article>

  <hr/>

  <div>
    <a href="{{ route('articles.edit', [$article->id]) }}"
      class="btn btn-primary">
      Edit
    </a>
    {{-- {!! delete_form(['articles', $article->id]) !!} --}}
    {!! delete_form(route('articles.destroy', [$article->id])) !!}

    <a href="{{ route('articles.index') }}"
      class="btn btn-secondary float-right">
      Back to a list
    </a>
  </div>
@endsection
