<?php
$title= basename($_SERVER['SCRIPT_FILENAME'], '.php');
$title = str_replace('_',' ', $title);

if($title == 'index') {$title = 'Home';}
$title = ucwords($title);

// A COMPLETER
$content_title = '';
$content_description = '';
$content = '';

?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Design of..." />
    <meta name="keywords" 
          content="php, mvc, web app..." />
    <meta name="author" content="Cogip sprl" />
    <!-- <link rel="shortcut icon" href="./public/assets/img/cogip-favico.jpg" type="image/jpg" sizes="16x16" />
    <link rel="apple-touch-icon" href="./public/assets/img/cogip-favico.jpg" type="image/jpg" sizes="16x16" /> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <!-- <link rel="stylesheet" href="./public/assets/css/app.css" /> -->
    <title>Cogip | <?=$title?></title>
    <!-- <link href="style.css" rel="stylesheet" />  -->
    </head>
        
    <body>
        <main id="main" class="jumbotron jumbotron-fluid mb-0 py-3">
        <!-- main-content -->
            <section class="container main-content main-content__home">
                <h2 class="main-content__title"><?= $content_title?></h2>
                <div class="main-content__body">
                    <p><?=$content_description?></p>
                    <section class="section-category">
                        <?= $content ?>
                    </section>
                </div>
            </section>
        </main>

        <!-- footer -->
        <footer id="footer">
            <div class="footer__copy py-2">&copy; 2018-2019 Cogip Sprl &ndash; All rights reserved.</div>
        </footer>
        <!-- footer-end -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <!-- <script src="./public/assets/js/app.js" async></script> -->

    </body>

</html>