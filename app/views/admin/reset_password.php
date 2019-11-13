<?php require getenv('APP_ROOT') . '/app/views/inc/header.php'?>

<!-- MAIN (index.php) -->
<main class="main jumbotron jumbotron-fluid mb-0 py-3">

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
        </div>  

        <!-- RESET PASSWORD FORM -->
        <div class="reset">
            <form method="post" class="form reset__form" action="">
                <div class="form-group">
                    <label for="email">Type your email*:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-at"></i></span>                    
                        </div>
                        <input class="form-control" type="email" name="reset_email" 
                            placeholder="Email address" id="email" autocomplete="email" required />
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" name="reset_submit" class="btn">
                        <i class="fas fa-sign-in-alt"></i> Send reset link
                    </button>
                </div>
                <div class="form-group">
                    <p class="reset__link">
                        <i class="fas fa-backspace"></i> Back to <a href="<?=getenv('APP_URL')?>/admin/login">login</a>
                    </p>
                </div>
            </form>
        </div>
    </section> 
    <!-- END OF MAIN CONTENT -->

</main>
<!-- END OF MAIN -->

<?php require getenv('APP_ROOT') . '/app/views/inc/footer.php'?>
<!-- END OF BODY -->