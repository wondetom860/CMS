<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    @notifyCss
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    {{--
    <link href="/css/bootstrap.min.css" rel="stylesheet" /> --}}
    <title>: @yield('title', '')</title>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
</head>

<body>
    <!-- header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary py-4">
        <div class="container">
            <a class="navbar-brand" href="/">{{ __('CRM-System') }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    {{-- <a class="nav-link active" href="/">{{ __('Home') }}</a>
                    <a class="nav-link active" href="/products">{{ __('Products') }}</a>
                    <a class="nav-link active" href="/cart">{{ __('Cart') }}</a>
                    <a class="nav-link active" href="/about">{{ __('About') }}</a>
                    <div class="vr bg-white mx-2 d-none d-lg-block"></div> --}}
                    @guest
                    <a href="{{ route('login') }}" class="nav-link active">Login</a>
                    {{-- <a href="{{ route('register') }}" class="nav-link active">Register</a> --}}
                    @else
                    {{-- <a href="{{ route('myaccount.orders') }}" class="nav-link active">{{ __('My Orders') }}</a>
                    --}}
                    <a href="{{ route('myaccount.profile') }}" class="nav-link active">{{ __('My Profile') }}</a>
                    @if (Auth::user()->isAdmin())
                    <a href="{{ route('admin.home.index') }}" class="nav-link active">{{ __('Dashboard') }}</a>
                    @endif
                    @if (Auth::user()->isSuperAdmin())
                    <a href="{{ route('roles.index') }}" class="nav-link active text-warning">Roles</a>
                    <a href="{{ route('users.index') }}" class="nav-link active text-warning">Users</a>
                    @endif
                    {{-- logged In user --}}
                    <form action="{{ route('logout') }}" id="logout" method="POST">
                        <a title="Logout" role="button" class="nav-link active text-center"
                            onclick="document.getElementById('logout').submit();">Logout({{ Auth::user()->name }})</a>
                        @csrf
                    </form>
                    @endguest
                </div>
            </div>
        </div>
    </nav>
    <header class="masthead bg-warning text-white text-center py-4">
        <div class="container d-flex align-items-center flex-column">
            <h2>@yield('subtitle', 'MOD - Court Case Managment System')</h2>
        </div>
    </header>
    <!-- header -->
    <main class="py-4">
        <div class="container-fluid">
            @if ($errors->any())
            <div class="col-12 alert alert-warning alert-dismissible">
                <ul class="alert alert-danger list-unstyled">
                    @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
        @yield('content')
    </main>
    <br><br><br>
    <div style="clear: both"></div>
    {{-- footer starts here --}}
    <div class=" py-4 text-center text-white footer" style="background-color: #1A252F;">
        <div class="container">
            <small class="copyright">
                Copyright - <a class="text-reset fw-bold text-decoration-none" target="_blank"
                    href="https://twitter.com/user">
                    MOD
                </a> - <b>ICT <i>YoungTigers</i></b>
            </small>
            @include('partials.language_switcher')
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    {{--
    <script src="/css/bootstrap.min.js"></script> --}}
    @notifyJs
    @include('notify::components.notify')
</body>

</html>