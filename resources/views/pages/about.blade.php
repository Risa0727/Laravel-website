@extends('layout')
@section('content')
  <h1>About</h1>
  <p>Hi, my name is {{ $first_name }} {{ $last_name }}.</p>
  <p>Today is {{ date('d, F, Y') }}.</p>
@endsection
