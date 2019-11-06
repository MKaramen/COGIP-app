<!-- header content -->
<?php require getenv('APP_ROOT') . '/app/views/inc/header.php'?>

<!-- main content (reset page) -->
<main id="main" class="jumbotron jumbotron-fluid mb-0 py-3">

    <!-- reset-content -->
    <section class="container content">
        <h2 class="content__title"><?=$dataInfo['content_title']?></h2>
        <div class="content__body">
            <p class="content__description"><?=$dataInfo['content_description']?></p>
            <div class="login">
                <form method="post" class="form login__form" action="">
                    <div class="form__alert form__alert-reset d-none">
                        <p>We can't find a user with that e-mail address.</p>
                    </div>
                    <div class="form-group">
                        <label for="email">Type your email*:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-at"></i></span>                    
                            </div>
                            <input class="form-control" type="email" name="user_id" 
                                placeholder="Email address" id="user_email" autocomplete="username" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="reset" class="btn">
                            <i class="fas fa-sign-in-alt"></i> Send reset link
                        </button>
                    </div>
                    <div class="form-group">
                        <p class="login__reset">
                            <i class="fas fa-backspace"></i> Back to <a href="<?=getenv('APP_URL')?>/admin/login">login</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>

<!-- footer content -->
<?php require getenv('APP_ROOT') . '/app/views/inc/footer.php'?>