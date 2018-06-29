<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <h1>Resultado:</h1>
            <h2><?php echo e($id); ?></h2>
            <h3><?php echo e($name); ?></h3>
            <h4> <?php echo e($mail); ?></h4>
            <h4> <?php echo e($pass); ?></h4>
        </div>
    </body>
</html>