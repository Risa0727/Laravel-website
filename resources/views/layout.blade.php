<!DOCTYPE html>
<html lang='en'>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>

  <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
  <script src="{{ asset('/js/app.js') }}"></script>
</head>
<body>
  @include('navbar')

  <div class="container py-4">
        @include('flash::message')

    @yield('content')
  </div>


</body>

</html>
