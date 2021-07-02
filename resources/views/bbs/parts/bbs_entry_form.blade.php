@if ($errors->any())
  <div class="errors">
    <ul>
      @foreach ($errors->all() as $error)
        <li>
          {{ $error }}
        </li>
      @endforeach
    </ul>
  </div>
@endif


<form method="post" action="{{ url('/bbs/create')}}" class="m-4">
  @csrf

  <div class="form-group">
    <label for='author'>Name</label><br />
    <input class="form-control" type="text" name="author" id="author" value="" placeholder="Taro Yamada" />
  </div>
  <div class="form-group">
    <label for="title"></label><br />
    <input class="form-control" type="text" name="title" id="title" value="" placeholder="Sample Title" />
  </div>
  <div class="form-group">
    <label for="body">Body</label><br />
    <textarea class="form-control" name="body" id="body"></textarea>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>

</form>
