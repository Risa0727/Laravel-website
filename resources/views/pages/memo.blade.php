@extends('layout')
@section('content')
  <h1>Memo</h1>
  <hr>
  <h2>Laravevl8でBootstrapを使うためにやったこと</h2>
  <ul class="list-group">
    <li class="list-group-item">Node.js/NMPインストール</li>
    <li class="list-group-item">Laravel Mixのインストール</li>
    <li class="list-group-item">Laravel uiインストール(<a target="_blank" href="https://uedive.net/2019/195/la6fa/">Ref</a>)</li>
  </ul>
<br>
  <h2>Laravevl8でFormを使うためにやったこと</h2>
  <ul class="list-group">
    <li class="list-group-item">laravelcollective/htmlのインストール(<a href="https://ekimunyime.medium.com/working-with-forms-in-laravel-8-a28283301622">Ref</a>)</li>
  </ul>

  <hr>
  <h2>標準的な CRUDパターンでの実装</h2>
  <table class="table table-hover">
    <thead class="thead-dark">
      <tr>
        <th scope="col">METHOD</th>
        <th scope="col">URI</th>
        <th scope="col">ACTION</th>
        <th scope="col">操作内容</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td scope="row">GET</td>
        <td>/articles</td>
        <td>ArticlesController@index</td>
        <td>一覧表示</td>
      </tr>
      <tr>
        <td scope="row">GET</td>
        <td>/articles/create</td>
        <td>ArticlesController@create</td>
        <td>新規作成</td>
      </tr>
      <tr>
        <td scope="row">POST</td>
        <td>/articles</td>
        <td>ArticlesController@store</td>
        <td>新規保存</td>
      </tr>
      <tr>
        <td scope="row">GET</td>
        <td>/articles/{article}</td>
        <td>ArticlesController@show</td>
        <td>表示</td>
      </tr>
      <tr>
        <td scope="row">GET</td>
        <td>/articles{article}/edit</td>
        <td>ArticlesController@edit</td>
        <td>編集</td>
      </tr>
      <tr>
        <td scope="row">PUT/PATCH</td>
        <td>/articles/{article}</td>
        <td>ArticlesController@update</td>
        <td>更新</td>
      </tr>
      <tr>
        <td scope="row">DELETE</td>
        <td>/articles/{article}</td>
        <td>ArticlesController@destroy</td>
        <td>削除</td>
      </tr>
    </tbody>
  </table>

@endsection
