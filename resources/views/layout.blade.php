<!DOCTYPE html>
<html lang='en'>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About</title>

  <link rel="stylesheet" href="{{ asset('./css/app.css') }}">
  <script src="{{ asset('/js/app.js') }}"></script>
</head>
<body>


  <div class="container py-4">
    @yield('content')
  </div>


</body>

</html>
