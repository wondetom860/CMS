<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
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
    <nav class="navbar navbar-light" style="background-color: #4682B4;">
        <a class="navbar-brand" href="#" style="max-width: 4%; padding-left: 9px;">
            <img src="{{ asset('/images/8.png') }}" class="img-fluid">
        </a>
        {{-- <a class="navbar-brand" href="#" style="max-width: 4%; padding-left: 9px;">
            <img src="{{ asset('/images/8.png') }}" class="img-fluid">
        </a> --}}
        
        <div class="container">
            <a class="navbar-brand" href="/" style="color: white">{{ __('CRM-System') }}</a>
            <div class="navbar navbar-expand-lg" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">

                    <a class="nav-link active" href="/" style="color: white">{{ __('Home') }}</a>
                    @can('case-list')
                    <a class="nav-link active" href="/case" style="color: white">{{ __('Cases') }}</a>
                    @endcan
                    {{-- <a class="nav-link active" href="/cart">{{ __('Cart') }}</a>
                    <a class="nav-link active" href="/about">{{ __('About') }}</a> --}}
                    <div class="vr bg-white mx-2 d-none d-lg-block"></div>
                    @guest
                        <a href="{{ route('login') }}" class="nav-link active" style="color: white">Login</a>
                        
                        {{-- <a href="{{ route('register') }}" class="nav-link active">Register</a> --}}
                    @else
                    
                        {{-- <a href="{{ route('myaccount.orders') }}" class="nav-link active">{{ __('My Orders') }}</a>
                    --}}
                        <a href="{{ route('myaccount.profile') }}" class="nav-link active"
                            style="color: white">{{ __('My Profile') }}</a>
                        @if (Auth::user()->isAdmin())
                            {{-- <a href="{{ route('admin.home.index') }}" class="nav-link active"
                                style="color: white">{{ __('Dashboard') }}</a> --}}
                        @endif
                       @can('dashboard-view')
                       <a href="{{ route('admin.home.index') }}" class="nav-link active">{{ __('Dashboard') }}</a>
                       @endcan
                        @if (Auth::user()->isSuperAdmin())
                            <a href="{{ route('admin.roles.index') }}" class="nav-link active text-warning">Roles</a>
                            <a href="{{ route('admin.users.index') }}" class="nav-link active text-warning">Users</a>
                        @endif
                        {{-- logged In user --}}
                        <form action="{{ route('logout') }}" id="logout" method="POST">
                            <a title="Logout" role="button" class="nav-link active text-center"
                                onclick="document.getElementById('logout').submit();"
                                style="color: white">Logout({{ Auth::user()->user_name }})</a>
                            @csrf
                        </form>
                    @endguest
                </div>
            </div>
        </div>
    </nav>
    <header class="container-fluid d-flix align-items-center flex-column" style="background-color: #E6EDf5;">
        <div class="container d-flex align-items-center flex-column">
            <h2 style="color: teal">@yield('subtitle', 'MOD - Court Case Managment System')</h2>
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
        <br><br><br>
        <div style="clear: both"></div>
        {{-- footer starts here --}}
        <div class=" py-1  footer">

        </div>
    </main>
    <footer class="footer py-1 text-center text-white" style="background-color: #1A252F;">
        <div class="container">
            <p class="copyright">
                @include('partials.language_switcher')
                Copyright - <a class="text-reset" target="_blank" href="https://www.mod.gov.et">
                    MOD
                </a> - <b>ICT</b>
                <span class="flex justify-right justify-end pt-0">
                    By: <i>YoungTigers</i>
                </span>
            </p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    {{--
    <script src="/css/bootstrap.min.js"></script> --}}
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    @notifyJs
    @include('notify::components.notify')
</body>

</html>
