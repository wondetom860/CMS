<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <title>MOD-CRMS : @yield('title', '')</title>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
</head>

<body>
    <!-- header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary py-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="logo1.webp" style="display: inline-block;">
              </a>
            <a class="navbar-brand" href="/">Mod_CRM-System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    {{-- <a class="nav-link active" href="/">Home</a>
                    <a class="nav-link active" href="/products">Products</a>
                    <a class="nav-link active" href="/cart">Cart</a>
                    <a class="nav-link active" href="/about">About</a>
                    <div class="vr bg-white mx-2 d-none d-lg-block"></div> --}}
                    @guest
                        {{-- <a href="{{ route('login') }}" class="nav-link active">Login</a>
                        <a href="{{ route('register') }}" class="nav-link active">Register</a> --}}
                    @else
                        <form action="{{ route('logout') }}" id="logout" method="POST">
                            <a role="button" class="nav-link active"
                                onclick="document.getElementById('logout').submit();"  style="color: white">Logout</a>
                            @csrf
                        </form>
                    @endguest
                </div>
            </div>
        </div>
    </nav>
    <header class="masthead bg-primary text-white text-center py-4">
        <div class="container d-flex align-items-center flex-column">
            <h2>@yield('subtitle', '  ')</h2>
        </div>
    </header>
    <!-- header -->
    <main class="py-4">
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
                  Mod
                </a> - <b>Ict</b>
            </small>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
</body>

</html>
