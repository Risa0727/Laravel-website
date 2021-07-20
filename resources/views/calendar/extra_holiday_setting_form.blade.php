@extends('layout')
@section('content')

{{-- <div class="container"> --}}
<div class="row justify-content-center">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header text-center">
        <a class="btn btn-outline-secondary float-left"
          href="{{ url('/extra-holiday-setting?date=' . $calendar->getPreviousMonth()) }}">
          Prev Month
        </a>
        <span>Temporary Business Day: {{ $calendar->getTitle() }}</span>
        <a class="btn btn-outline-secondary float-right"
          href="{{ url('/extra-holiday-setting?date=' . $calendar->getNextMonth()) }}">
          Next Month
        </a>
      </div>
      {{-- <div class="card-body"> --}}
        @if(session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
        @endif
        <form method="post" action="{{ route('update-extra-holiday-setting')}}">
          @csrf
          <div class="card-body">
            {!! $calendar->render() !!}
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </div>
        </form>
      {{-- </div> --}}
    </div>
  </div>
</div>


{{-- </div> --}}


@endsection
