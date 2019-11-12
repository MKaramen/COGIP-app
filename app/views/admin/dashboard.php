<?php
require getenv('APP_ROOT') . '/app/views/inc/header.php';
Session::timeout();
?>

<!-- MAIN (index.php) -->
<main id="main">

    <!-- ASIDE (dashboard) -->
    <aside id="aside" class="dashboard">
        <?php require getenv('APP_ROOT') . '/app/views/inc/navbar_admin.php' ?>
    </aside>
    <!-- END OF ASIDE -->

    <!-- MAIN CONTENT (dashboard.php) -->
    <section id="home" class="container content">
        <h2 class="content__title"><?= $dataInfo['content_title'] ?></h2>
        <div class="content__body">
            <p class="content__description"><?= $dataInfo['content_description'] ?></p>

            <!-- TABLE (users) -->
            <div class="content__table">
                <h3 class="content__table-title">Table of users</h3>
                <table class="table table-fluid table-bordered table-hover table-striped table-sm" id="admin__users">
                    <?= Helper::makeAdminTable($dataModel['users'], []) ?>
                </table>
            </div>

            <!-- TABLE (companies) -->
            <div class="content__table">
                <h3 class="content__table-title">Table of companies</h3>
                <table class="table table-fluid table-bordered table-hover table-striped table-sm" id="admin__companies">
                    <?= Helper::makeAdminTable($dataModel['companies'], []) ?>
                </table>
            </div>

            <!-- TABLE (invoices) -->
            <div class="content__table">
                <h3 class="content__table-title">Table of invoices</h3>
                <table class="table table-fluid table-bordered table-hover table-striped table-sm" id="admin__invoices">
                    <?= Helper::makeAdminTable($dataModel['invoices'], []) ?>
                </table>
            </div>
        </div>

    </section>
    <!-- END OF MAIN CONTENT -->

</main>
<!-- END OF MAIN -->

<?php require getenv('APP_ROOT') . '/app/views/inc/footer.php' ?>
<!-- END OF BODY -->