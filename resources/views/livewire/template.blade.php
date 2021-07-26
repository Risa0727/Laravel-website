<!DOCTYPE html>
<html lang='en'>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>

  <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
  {{-- <link rel="stylesheet" href="{{ asset('/css/calendar.css') }}"> --}}
  <link rel="stylesheet" href="{{ asset('/css/birthday.css') }}">
  <script src="{{ asset('/js/app.js') }}"></script>
  @livewireStyles
</head>
<body>
  @include('navigation-menu')

  <div class="container py-4">
    @yield("content")
  </div>
  @livewireScripts
</body>
</html>
