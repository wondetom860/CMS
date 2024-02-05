<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <title>About page</title>
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
            <a class="navbar-brand" href="#">Online Store - About Page</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" href="/">Home</a>
                    <a class="nav-link active" href="/products">Products</a>
                    <a class="nav-link active" href="/cart">Cart</a>
                    <a class="nav-link active" href="/about">About</a>
                    <a class="nav-link active" href="/test">Test</a>
                    <a class="nav-link active" href="/posts">Teams</a>
                </div>
            </div>
        </div>
    </nav>
    <header class="masthead text-white text-center py-4 bg-primary" style="background-color: #1ABC9C;">
        <div class="container d-flex align-items-center flex-column" style="background-color: transparent;">
            <h2>Online Store V1.0 powered by laravel - About Team Member Page</h2>
        </div>
    </header>
    <!-- header -->
    <div class="container my-4">
        <?php
        // var_dump($profileData);
        if (is_null($profileData)) {
            echo "<div class='alert alert-danger'><p class='bg-default'>Record not found!</p></div>";
            exit;
        }
        ?>
        <h3>About <?= $profileData["name"] ?></h3>
        <div class="col-md-6 col-lg-6 col-sm-12 text-center">
            <div class="card text-left p-2">
                <a href="/posts.about/<?= $profileData['name'] ?>">
                    <img class="rounded-circle" src="<?= "/images" . "/" . $profileData["propic"] ?>" alt="Card image" width="300px" height="295px">
                </a>
                <hr>
                <div class="card-body text-left">
                    <h4 class="card-title">Name: <u><?= $profileData["name"] ?></u></h4>
                    <p class="card-text">Date of Birth: <u><?= date("d/m/Y", $profileData["date_of_birth"]) ?></u></p>
                    <p class="card-text">Company: <u><?= $profileData["company"] ?></u></p>
                    <p class="card-text">Role: <u><?= $profileData["role"] ?></u></p>
                    <hr>
                    <p>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sapiente officiis a iusto repellat! Ad, perspiciatis nisi laudantium aliquam ipsum, facere voluptatem blanditiis nesciunt aperiam minus neque porro quae commodi nemo.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class=" py-4 text-center text-white footer">
        <div class="container">
            <small class="copyright">
                Copyright - <a class="text-reset fw-bold text-decoration-none" target="_blank" href="https://twitter.com/user">
                    <?= $profileData["name"] ?>
                </a> - <b><?= $profileData["company"] ?></b>
            </small>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
</body>

</html>