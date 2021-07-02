@extends('layout')
@section('content')

@include('/bbs/parts.bbs_entry_form')


<h2>News</h2>
<div class="pagination">
  {{ $items->links() }}
</div>
<style type="text/css">
.pagination {
 display: inline-block;
}
.pagination .page-item {
 color: black;
 float: left;
 padding: 8px 16px;
 text-decoration: none;
 list-style: none;
}
</style>
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
