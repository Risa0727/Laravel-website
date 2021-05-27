@extends('layout')
@section('content')
  <h1>About</h1>
  <p>Hi, my name is {{ $first_name }}. I made this website for practice.</p>
  <p>This was my first time using Laravel and created a website.</p>

  <h2>How to use</h2>
  <p>This is a smple Bulletin board.</p>
  <p>You can go and see all articles from the top page.</p>
  <p>Only login users can create, edit and delete articles.</p>
  <p>If you haven't registered yet, please get it done!</p>
  {{-- <p>Today is {{ date('d, F, Y') }}.</p> --}}
@endsection
