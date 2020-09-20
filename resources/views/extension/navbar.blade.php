<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        @auth
        <li class="nav-item d-none d-sm-inline-block">
            <a class="nav-link" href="{{ route('patients.index') }}">{{ __('login.patientlist') }}</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a class="nav-link" href="{{ route('rendezvous.index') }}">{{ __('My appointments') }}</a>
        </li>
        @endauth
    </ul>
    <!-- Left navbar links -->
    <!-- Right Side Of Navbar -->
    <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('login.login') }}</a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('login.register') }}</a>
                </li>
            @endif
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" v-pre>
                    Dr {{ Auth::user()->lastname }} <span class="caret"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('profile') }}">{{ __('login.profil') }}</a>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                        {{ __('login.logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
        @if (count(config('app.languages')) > 1)
            <li class="nav-item dropdown d-md-down-none">
                <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                    aria-expanded="false">
                    @if (app()->getLocale() == 'en')
                        <span class="flag-icon flag-icon-gb"></span>
                    @else
                        <span class="flag-icon flag-icon-{{ app()->getLocale() }}"></span>
                    @endif
                    {{ strtoupper(app()->getLocale()) }}
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    @foreach (config('app.languages') as $langLocale => $langName)
                        <a class="dropdown-item" href="{{ url()->current() }}?change_language={{ $langLocale }}">
                            @if ($langLocale == 'en')
                                <span class="flag-icon flag-icon-gb"></span>
                            @else
                                <span class="flag-icon flag-icon-{{ $langLocale }}"></span>
                            @endif
                            {{ $langName }}
                        </a>
                    @endforeach
                </div>
            </li>
        @endif
    </ul>
</nav>
