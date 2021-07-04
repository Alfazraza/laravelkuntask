<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
	    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">

    </head>
    <body>
            <div class="content">
                <div class="title m-b-md">
                    Kun Academy
                </div>

                <div class="links">
                    <a class="btn btn-primary btn_style" href="<?php echo e(route('classes.index')); ?>"> Classes</a>
                    <a class="btn btn-primary btn_style" href="<?php echo e(route('students.index')); ?>"> Students</a>
                </div>
            </div>
    </body>
</html>
