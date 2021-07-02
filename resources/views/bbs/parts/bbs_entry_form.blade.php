<form method="post" action="{{ url('/bbs/create')}}">
  @csrf

  <div>
    <label for='author'>Name</label><br />
    <input type="text" name="author" id="author" value="" placeholder="Taro Yamada" />
  </div>
  <div>
    <label for="title"></label><br />
    <input type="text" name="title" id="title" value="" placeholder="Sample Title" />
  </div>
  <div>
    <label for="body">Body</label><br />
    <textarea name="body" id="body"></textarea>
  </div>
  <input type='submit' value="Submit" />

</form>
