<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('metaTitle') ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="<?= site_url('/assets/favicon.ico') ?>" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?= site_url('/css/styles.css') ?>" rel="stylesheet" />

</head>

<body>

    <!-- Navigation-->
    <nav class="navbar  navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <?php if (current_user()) : ?>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="#!">Hello <?= esc(current_user()->name) ?></a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Settings
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?= site_url('Profile/edit') ?>">Profile</a>
                                <a class="dropdown-item" href="<?= site_url('login/logOut'); ?>">Log Out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            <?php else : ?>
                <a class="navbar-brand" href="#!">Start Bootstrap</a>
            <?php endif; ?>

            <?php if (session()->has('success')) : ?>
                <div class="alert alert-success">
                    <?= session('success') ?>
                </div>
            <?php endif; ?>
            <?php if (session()->has('warning')) : ?>
                <div class="alert alert-warning">
                    <?= session('warning') ?>
                </div>
            <?php endif; ?>

            <?php if (session()->has('info')) : ?>
                <div class="alert alert-info">
                    <?= session('info') ?>
                </div>
            <?php endif; ?>

            <div class="nav-link">
                <!-- Button trigger modal -->

                <?php if (! current_user()) : ?>
                    <a href="#signup" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Login">Login</a>
                    <a class="btn btn-primary" href="#signup" data-bs-toggle="modal" data-bs-target="#Signup">Sign Up</a>
                <?php endif; ?>
            </div>

        </div>
    </nav>

    <?= $this->renderSection("content") ?>



    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="<?= site_url('/js/form-validattion.js') ?>"></script>
    <script src="<?= site_url('/js/scripts.js') ?>"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

    <!-- <script type="text/javascript">
    $(document).ready(function(e){

        $('#signUpForm').on('submit',function(e){
            e.preventDefault();
        })
    });
</script> -->
</body>

</html>