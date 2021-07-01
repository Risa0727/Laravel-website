@extends('layout')
@section('content')
  <h1>This is for practice of DB</h1>

  <ul>
    <li>ID: {{ $item->id }}</li>
    <li>Title: {{ $item->title }}</li>
    <li>Body: {{ $item->body }}</li>
  </ul>

@endsection
