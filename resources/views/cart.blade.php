<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <title>Online Store</title>
    <style>
        .bg-secondary {
            background-color: #2C3E50 !important;
        }

        .copyright {
            background-color: #1A252F;
        }

        .bg-primary {
            background-color: #1ABC9C !important;
        }

        nav {
            font-weight: 700;
        }

        .img-card {
            height: 18vw;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <!-- header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary py-4">
        <div class="container">
            <a class="navbar-brand" href="#">Online Store - Cart</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" href="/">Home</a>
                    <a class="nav-link active" href="/products">Products</a>
                    <a class="nav-link active" href="/cart">Cart</a>
                    <a class="nav-link active" href="/about">About</a>
                    <a class="nav-link active" href="/test">test</a>
                </div>
            </div>
        </div>
    </nav>
    <header class="masthead text-white text-center py-4 bg-primary" style="background-color: #1ABC9C;">
        <div class="container d-flex align-items-center flex-column" style="background-color: transparent;">
            <h2>Online Store V1.0 powered by laravel : Cart page</h2>
        </div>
    </header>
    <!-- header -->
    <div class="container my-4">
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
</body>

</html>