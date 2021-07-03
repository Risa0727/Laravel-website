<div class="p-6">
  <h2><img src="{{ Auth::user()->profile_photo_url }}">My details</h2>
  {{-- <p>
    {{ Auth::user() }}
  </p> --}}
  <div class="card">
    <div class="card-header">

    </div>
    <div class="card-body">
      <ul class="list-group">
        <li class="list-group-item"> ID: {{ Auth::user()->id }} </li>
        <li class="list-group-item"> Name: {{ Auth::user()->name }} </li>
        <li class="list-group-item"> Email: {{ Auth::user()->email }} </li>
        <li class="list-group-item"> Created Date: {{ Auth::user()->created_at }} </li>
        {{-- <li class="list-group-item"> <a href="{{ Auth::user()->profile_photo_url }}">Portfolio</a> </li> --}}
     </ul>
   </div>
 </div>
</div>
