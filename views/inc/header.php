<!DOCTYPE html>

<html lang="en">

<!-- HEAD -->
<head>
    <!-- METADA -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="viewport"    content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Design of the accounting application of the COGIP" />
    <meta name="keywords"    content="php, mvc, web app, html5, css3, bootstrap" />
    <meta name="author" content="Julio Zinga, Matis Karamenderes, Chin" />
    <link rel="shortcut icon"    href="<?=getenv('APP_URL')?>/public/assets/img/cogip_favico.jpg" type="image/jpg" sizes="16x16" />
    <link rel="apple-touch-icon" href="<?=getenv('APP_URL')?>/public/assets/img/cogip_favico.jpg" type="image/jpg" sizes="16x16" />
    <link rel="stylesheet"       href="https://fonts.googleapis.com/css?family=Monoton:regular" />
    <link rel="stylesheet"       href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <link rel="stylesheet"       href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet"       href="https://cdn.datatables.net/v/bs4/dt-1.10.20/r-2.2.3/datatables.min.css" />
    <link rel="stylesheet"       href="<?=getenv('APP_URL')?>/public/assets/css/app.css" type="text/css" />
    <title> <?=getenv('APP_NAME') . ' | ' . $dataInfo['title']?></title>
    <!-- END OF METADA -->
</head>
<!-- END OF HEAD -->

<!-- BODY -->
<body>
    <!-- HEADER -->
    <header class="header">
        <?php require getenv('APP_ROOT') . '/app/views/inc/navbar.php'?>
    </header>   
    <!-- END OF HEADER -->  