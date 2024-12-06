<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>webprog.io</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css" />

    <link rel="stylesheet" href="<?= URL_ROOT ?>/public/assets/css/main.css">
</head>

<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= URL_ROOT ?>">Teachsha.Ir</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="<?= URL_ROOT ?>/posts">Posts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URL_ROOT ?>/categories">Category</a>
                </li>
            </ul>

            <div class="d-flex align-items-center">

                <?php if (isLoggedIn()) : ?>
                    <h6 class="mb-0"><?= $_SESSION['user_email'] ?></h6>
                    <a href="<?= URL_ROOT ?>/users/logout" class="btn btn-sm btn-secondary ms-2">Logout</a>
                <?php else : ?>
                    <a href="<?= URL_ROOT ?>/users/login-form" class="btn btn-sm btn-outline-dark">Login</a>
                    <a href="<?= URL_ROOT ?>/users/register" class="btn btn-sm btn-secondary ms-2">Register</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>