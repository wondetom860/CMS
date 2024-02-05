<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <title>Team Members</title>
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
            <a class="navbar-brand" href="#">Online Store - Team Members</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-show show" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" href="/">Home</a>
                    <a class="nav-link active" href="/products">Products</a>
                    <a class="nav-link active" href="/cart">Cart</a>
                    <a class="nav-link active" href="/about">About</a>
                    <a class="nav-link active" href="/test">Test</a>
                    <a class="nav-link active" href="/posts">Posts</a>
                </div>
            </div>
        </div>
    </nav>
    <header class="masthead text-white text-center py-4 bg-primary" style="background-color: #1ABC9C;">
        <div class="container d-flex align-items-center flex-column" style="background-color: transparent;">
            <h2>Online Store V1.0 powered by laravel : About Team Members Page</h2>
        </div>
    </header>
    <!-- header -->
    <div class="container my-4">
        <h3 style="text-decoration: underline;">Team Members</h3>
        <?php //var_dump($contacts); exit; 
        ?>
        <div class="row">
            <?php foreach ($contacts as $contact) : ?>
                <div class="col-md-3 col-lg-3 col-sm-12">
                    <div class="accordion" id="accordionExample<?= $contact['date_of_birth'] ?>">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne<?= $contact['date_of_birth'] ?>" aria-expanded="true" aria-controls="collapseOne">
                                    About <?= $contact["name"] ?>
                                </button>
                            </h2>
                            <div id="collapseOne<?= $contact['date_of_birth'] ?>" class="accordion-show show" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="card text-left p-2">
                                        <a href="posts.about/<?= $contact['name'] ?>">
                                            <img class="card-img-top rounded-circle" src="<?= "/images" . "/" . $contact["propic"] ?>" alt="Card image" width="200" height="295">
                                        </a>
                                        <hr>
                                        <div class="card-body">
                                            <h4 class="card-title">Name: <u><?= $contact["name"] ?></u></h4>
                                            <p class="card-text">Date of Birth: <u><?= date("d/m/Y", $contact["date_of_birth"]) ?></u></p>
                                            <p class="card-text">Company: <u><?= $contact["company"] ?></u></p>
                                            <p class="card-text">Role: <u><?= $contact["role"] ?></u></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
</body>

</html>