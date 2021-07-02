@extends('layout')
@section('content')

@include('/bbs/parts.bbs_entry_form')


<h2>News</h2>
@foreach ($items as $item)
  <div class="entry">
      <h5>{{ $item->title }}</h5>
      <div>
        {{-- {{ $item->body }} --}}
        {{-- エスケープ処理(e()) + 改行文字の変換(nl2br()) --}}
        {!! nl2br(e($item->body)) !!}
      </div>
  </div>
@endforeach

@if (count($items) < 1)
  <p>There is no article.</p>
@endif


@endsection
