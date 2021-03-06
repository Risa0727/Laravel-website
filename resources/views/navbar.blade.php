<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="{{ route('home') }}"> My Blog</a>

    <button class="navbar-toggler" type="button"
        data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    {{-- menu --}}
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      {{-- Left side --}}
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('home') }}">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('about') }}">ABOUT</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('contact') }}">CONTACT</a>
        </li>
      </ul>

      {{-- Right side --}}
      <ul class="navbar-nav">
        {{-- <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">LOGIN</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">REGISTER</a>
        </li> --}}
        @if (Route::has('login'))
            @auth
              <li class="nav-item">
                <a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a>
              </li>
            @else
              <li class="nav-item">
                <a href="{{ route('login') }}" class="nav-link">Log in</a>
              </li>
                @if (Route::has('register'))
                  <li class="nav-item">
                    <a href="{{ route('register') }}" class="nav-link">Register</a>
                  </li>
                @endif
            @endif
        @endif
        {{-- Drop down Menu --}}
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#"
            id="navbarDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            USER NAME <span class="caret"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right"
            aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href=""{{ route('logout') }}">LOGOUT</a>
          </div>
        </li>
      </ul>
    </div>

  </div>


</nav>
