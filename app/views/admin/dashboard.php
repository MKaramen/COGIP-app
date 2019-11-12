<?php 

require getenv('APP_ROOT') . '/app/views/inc/header.php';
Session::timeout();

?>

<!-- MAIN (index.php) -->
<main id="main">

    <!-- ASIDE (dashboard) -->
    <aside id="aside" class="dashboard">
        <?php require getenv('APP_ROOT') . '/app/views/inc/navbar_admin.php'?>
    </aside>
    <!-- END OF ASIDE -->

    <!-- MAIN CONTENT (dashboard.php) -->
    <section id="home" class="container content">
        <h2 class="content__title"><?=$dataInfo['content_title']?></h2>
        <div class="content__body">
            <p class="content__description"><?=$dataInfo['content_description']?></p>

            <!-- TABLE (users) -->
            <div class="content__table">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped table-sm">
                        
                    </table>
                </div>
            </div>
        </div>

        <!-- TABLE (companies) -->

    </section> 
    <!-- END OF MAIN CONTENT -->

</main>
<!-- END OF MAIN -->

<?php require getenv('APP_ROOT') . '/app/views/inc/footer.php'?>
<!-- END OF BODY -->