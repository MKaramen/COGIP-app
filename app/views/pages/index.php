<!-- header content -->
<?php require getenv('APP_ROOT') . '/app/views/inc/header.php' ?>

<!-- main content -->
<main id="main" class="jumbotron jumbotron-fluid mb-0 py-3">
    <!-- main-content -->
    <section class="container content">
        <h2 class="content__title"><?= $data['content_title'] ?></h2>
        <div class="content__body">
            <p class="content__description"><?= $data['content_description'] ?></p>

            <!-- Tables -->
            <?php require getenv('APP_ROOT') . '/app/views/inc/table.php';
            ?>
        </div>
    </section>
</main>

<!-- footer content -->
<?php require getenv('APP_ROOT') . '/app/views/inc/footer.php' ?>