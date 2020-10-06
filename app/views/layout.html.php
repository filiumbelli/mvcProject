<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= TITLE ?></title>
    <link rel="stylesheet" href="<?= URLROOT ?>/public/css/bootstrap.css">
    <link rel="stylesheet" href="<?= URLROOT ?>/public/css/styles.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">

    <?php if (isset($styles)) {
        echo $styles;
    } ?>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand active" href="/mvcProject/">1 indirimvaaar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    

                    <?php if (isset($_SESSION['user_id'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link <?= rtrim(basename($_SERVER['REQUEST_URI']), '.php') == 'login' ? 'active' : null ?>" href="/mvcProject/users/profile">Profil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/mvcProject/users/logout">Çıkış</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link <?= rtrim(basename($_SERVER['REQUEST_URI']), '.php') == 'register' ? 'active' : null ?>" href="/mvcProject/users/register">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= rtrim(basename($_SERVER['REQUEST_URI']), '.php') == 'login' ? 'active' : null ?>" href="/mvcProject/users/login">Giriş</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <main role="main">
        <?php

        if (isset($output)) {
            echo $output;
        } else {
            echo '<div class="container mt-5"> ';
            echo '<p class=" w-3 mt-3 mb-3 alert-danger text-center">Nothing to show or a tumbleweed!!</p>';
            echo '<img class="justify-content-center d-flex" src="https://media3.giphy.com/media/5x89XRx3sBZFC/giphy.gif" alt="tumbleweed">';
            echo '</div>';
        }; ?>


        <?php if (isset($script)) {
            echo $script;
        } else {
        } ?>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </main>
</body>

</html>