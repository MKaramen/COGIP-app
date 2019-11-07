<!-- header content -->
<?php require getenv('APP_ROOT') . '/app/views/inc/header.php' ?>
<?php require getenv('APP_ROOT') . '/app/views/inc/table.php';
?>

<!-- main content -->
<main id="main" class="jumbotron jumbotron-fluid mb-0 py-3">
    <!-- main-content -->
    <section class="container content">
        <h2 class="content__title"><?= $data['content_title'] ?></h2>
        <div class="content__body">
            <p class="content__description"><?= $data['content_description'] ?></p>
            <!-- clients -->
            <section class="content__table mt-4">
                <h3 class="content__table-title mb-3"><?= $data['firsth3'] ?></h3>
                <div class="content__table-body">
                    <?= $first_part;
                    Helper::makeTable("user_info", $dataModel);
                    echo $second_part; ?>
                </div>
            </section>

            <section class="content__table mt-4">
                <h3 class="content__table-title mb-3"><?= $data['secondh3'] ?></h3>
                <div class="content__table-body">
                    <?= $first_part;
                    Helper::makeTable("user_invoices", $dataModel);
                    echo $second_part; ?>
                </div>
            </section>

        </div>
    </section>
</main>

<!-- footer content -->
<?php require getenv('APP_ROOT') . '/app/views/inc/footer.php' ?>