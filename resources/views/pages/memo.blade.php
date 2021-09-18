@extends('layout')
@section('content')
  <h1>Memo</h1>
  <hr>
  <h2>[Laravevl8]Bootstrapを使うためにやったこと</h2>
  <ul class="list-group">
    <li class="list-group-item">Node.js/NMPインストール</li>
    <li class="list-group-item">Laravel Mixのインストール</li>
    <li class="list-group-item">Laravel uiインストール(<a target="_blank" href="https://uedive.net/2019/195/la6fa/">Ref</a>)</li>
  </ul>
<br>
  <h2>[Laravevl8]Formを使うためにやったこと</h2>
  <ul class="list-group">
    <li class="list-group-item">laravelcollective/htmlのインストール(<a target="_blank" href="https://ekimunyime.medium.com/working-with-forms-in-laravel-8-a28283301622">Ref</a>)</li>
  </ul>
  <hr>
  <h2>
    [Laravevl]ログの出力先
  </h2>
  <ul class="list-group">
    <li class="list-group-item">
      アプリケーションログの出力先は,<span style='font-weight:bold;'>storage/logs/laravel.log</span>
    </li>
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

  <hr>
  <h2>[Laravevl8]ユーザ認証機能の追加</h2>
  <ul class="list-group">
    <li class="list-group-item">Laravel Jetsreamのインストール(<a target="_blank" href="https://note.com/laravelstudy/n/nf2179cc45a29">Ref</a>)</li>
  </ul>
  <h2>［Laravel8］Factoryの使い方</h2>
  <ul class="list-group">
    <li class="list-group-item">Laravel Jetsreamのインストール(<a target="_blank" href="https://qiita.com/Tomochan_taco/items/3d6574438eeb79bf7f29">Ref</a>)</li>
  </ul>
  <img src="{{  asset('images/How-to-use-Factory.jpg') }}" class="factory" alt="factory" width="500" height="250">
  <hr>
  <h2>［Laravel8］[練習]　簡単な掲示板</h2>
  <ul class="list-group">
    <li class="list-group-item">#Laravel基礎 Webアプリケーションの開発(<a target="_blank" href="https://note.com/laravelstudy/n/n731ccef3756c">Ref</a>)</li>
    <li class="list-group-item">
      <a href="{{ route('bbs') }}">作成物</a>
    </li>
  </ul>
  <hr>
  <h2>
    [Laravevl8]Livewireの基本的な使い方
    <a href="https://laravel-livewire.com/" target="_blank"><img src="{{asset('images/livewire_logo.png')}}" width="100" height="40"></a>
  </h2>
  <ul class="list-group">
    <li class="list-group-item">
      LivewireとはPHPのみでVueやReactのようなリアクティブな動的コンポーネントを作成できるライブラリです。
    </li>
    <li class="list-group-item">
      Livewireのコンポーネント内ではBladeの構文を使用することができるので、VueやReactよりもLaravelとの相性が良くなっています。
    </li>
    <li class="list-group-item">[練習]LivewireでCRUDを実装してみる(<a target="_blank" href="https://kobatech-blog.com/livewire/">Ref</a>)</li>
    <li class="list-group-item">
      <a href="{{ route('birthday') }}">作成物</a>
    </li>
  </ul>
@endsection
