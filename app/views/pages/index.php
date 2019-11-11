<?php require getenv('APP_ROOT') . '/app/views/inc/header.php'?>

<!-- MAIN (index.php) -->
<main id="main" class="jumbotron jumbotron-fluid mb-0 py-3">

    <!-- ASIDE (dashboard) -->
    <aside id="aside" class="dashboard">

    </aside>
    <!-- END OF ASIDE -->

    <!-- MAIN CONTENT (index.php) -->
    <section id="home" class="container content">
        <h2 class="content__title"><?=$dataInfo['content_title']?></h2>
        <div class="content__body">
            <p class="content__description"><?=$dataInfo['content_description']?></p>
        </div>

    </section> 
    <!-- END OF MAIN CONTENT -->

</main>
<!-- END OF MAIN -->

<?php require getenv('APP_ROOT') . '/app/views/inc/footer.php'?>
<!-- END OF BODY -->