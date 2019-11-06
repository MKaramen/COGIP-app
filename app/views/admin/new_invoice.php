<!-- header content -->
<?php require getenv('APP_ROOT') . '/app/views/inc/header.php'?>

<!-- main content -->
<main id="main" class="jumbotron jumbotron-fluid dashboard mb-0 py-3">
    
    <aside class="dashboard__navbar">
        <?php require getenv('APP_ROOT') . '/app/views/inc/navbar_admin.php'?>
    </aside>

    <!-- new invoice content -->
    <section class="content dashboard__content">
        <h2 class="content__title"><?=$dataInfo['content_title']?></h2>
        <div class="content__body">
            <p class="content__description"><?=$dataInfo['content_description']?></p>


            <!-- Form (new invoice) -->
            <section class="new-user__form">
                <h3 class="new-user__form-title">New invoice</h3>

            </section>

        </div>
    </section>
</main>

<!-- footer content -->
<?php require getenv('APP_ROOT') . '/app/views/inc/footer.php'?>