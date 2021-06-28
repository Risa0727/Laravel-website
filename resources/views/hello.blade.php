@extends('layout')
@section('content')
  {{-- {{$message}} --}}

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Content</th>
    </tr>
  </thead>
  <tbody>
    @foreach($tests as $test)
      <tr>
        <th scope="row">{{ $test->id }}</th>
        <td>{{ $test->name }}</td>
        <td>{{ $test->content }}</td>
      </tr>
    @endforeach
  </tbody>
<table>
@endsection
