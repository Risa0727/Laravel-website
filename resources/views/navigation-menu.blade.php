<nav class="navbar navbar-expand-md navbar-light bg-light border-bottom sticky-top">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand mr-4" href="{{ route('home') }}">
            {{-- <x-jet-application-mark width="36" /> --}}
            <img src="{{  asset('images/logo.png') }}" class="logo" alt="logo" width="80" height="50">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('home') }}">HOME</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('about') }}">ABOUT</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    CALENDER
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('calendar') }}">CALENDAR</a>
                    <a class="dropdown-item" href="{{ route('holiday-setting') }}">SETTINGS</a>
                    <a class="dropdown-item" href="{{ route('extra-holiday-setting') }}">EXTRA SETTINGS</a>
                  </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('birthday') }}">BIRTHDAY</a>
                </li>
                {{-- <li class="nav-item">
                  <a class="nav-link" href="{{ route('contact') }}">CONTACT</a>
                </li> --}}
                {{-- <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                    {{ __('DASHBOARD') }}
                </x-jet-nav-link> --}}
                {{-- <li>{{ Auth::user() }}</li> --}}
                  @auth
                    @if (Auth::user()->id == 1)
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('memo') }}">MEMO</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('bbs') }}">BBS</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('hello') }}">TEST</a>
                    </li>
                    @endif
                  @endauth
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto align-items-baseline">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <x-jet-dropdown id="teamManagementDropdown">
                        <x-slot name="trigger">
                            {{ Auth::user()->currentTeam->name }}

                            <svg class="ml-2" width="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Team Management -->
                            <h6 class="dropdown-header">
                                {{ __('Manage Team') }}
                            </h6>

                            <!-- Team Settings -->
                            <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                {{ __('Team Settings') }}
                            </x-jet-dropdown-link>

                            @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                    {{ __('Create New Team') }}
                                </x-jet-dropdown-link>
                            @endcan

                            <hr class="dropdown-divider">

                            <!-- Team Switcher -->
                            <h6 class="dropdown-header">
                                {{ __('Switch Teams') }}
                            </h6>

                            @foreach (Auth::user()->allTeams() as $team)
                                <x-jet-switchable-team :team="$team" />
                            @endforeach
                        </x-slot>
                    </x-jet-dropdown>
                @endif

                <!-- Settings Dropdown -->
                <ul class="navbar-nav">
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
                </ul>
                {{-- --@r --}}
                @auth
                    <x-jet-dropdown id="settingsDropdown">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <img class="rounded-circle" width="32" height="32" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            @else
                                {{ Auth::user()->name }}

                                <svg class="ml-2" width="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <h6 class="dropdown-header small text-muted">
                                {{ __('Manage Account') }}
                            </h6>

                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-jet-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-jet-dropdown-link>
                            @endif

                            <hr class="dropdown-divider">

                            <!-- Authentication -->
                            <x-jet-dropdown-link href="{{ route('logout') }}"
                                                 onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                {{ __('Log out') }}
                            </x-jet-dropdown-link>
                            <form method="POST" id="logout-form" action="{{ route('logout') }}">
                                @csrf
                            </form>
                        </x-slot>
                    </x-jet-dropdown>
                @endauth
            </ul>
        </div>
    </div>
</nav>
