@extends('layout')
@section('content')

@include('/bbs/parts.bbs_entry_form')

<div class="header d-flex justify-content-center">
  <h2>News</h2>
</div>
<style type="text/css">
  .pagination .flex.justify-between.flex-1,
  .pagination p {
   display: none;
  }
  table.result-table th:first-child,
  table.result-table td:first-child {
    width: 30%;
  }
</style>

<table class="result-table entry table table-bordered">
 <thead class="thead-dark">
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Contents</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($items as $item)
    <tr>
      <td>Title: {{ $item->title }}</td>
      <td>
        {{-- {{ $item->body }} --}}
        {{-- エスケープ処理(e()) + 改行文字の変換(nl2br()) --}}
        {!! nl2br(e($item->body)) !!}
      </td>
    </tr>
  @endforeach
</tbody>
</table>
<div class="pagination d-flex justify-content-center">
  {{ $items->links() }}
</div>
@if (count($items) < 1)
  <p>There is no article.</p>
@endif


@endsection
