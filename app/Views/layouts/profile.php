<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <title><?= $this->renderSection('metaTitle') ?></title>
</head>

<body>
    <?php

    if (session()->has('warning')) : ?>
        <div class="alert alert-warning">
            <?= session('warning') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->has('info')) : ?>
        <div class="alert alert-info">
            <?= session('info') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->has('errors')) : ?>
        <ul>
            <?php foreach (session('errors') as $error) : ?>
                <li style="color:red;"><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <?= $this->renderSection('content') ?>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>

</html>