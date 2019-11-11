<?php require getenv('APP_ROOT') . '/app/views/inc/header.php';?>

<!-- MAIN (login.php) -->
<main id="main" class="jumbotron jumbotron-fluid mb-0 py-3">

    <!-- ASIDE (dashboard) -->
    <aside id="aside" class="dashboard">

    </aside>
    <!-- END OF ASIDE -->

    <!-- MAIN CONTENT (login.php) -->
    <section id="home" class="container content">
        <h2 class="content__title"><?=$dataInfo['content_title']?></h2>
        <div class="content__body">
            <p class="content__description"><?=$dataInfo['content_description']?></p>
        </div>

        <!-- LOGIN FORM -->
        <div class="login">
            <form method="post" class="form login__form" action="<?=getenv('APP_URL')?>/admin/login/no" autocomplete="off">
                <div class="<?=$dataModel['login_error'] ? 'alert alert-danger':''?>" role="alert"><?=$dataModel['login_error']?>
                </div>
                <div class="form-group">
                    <label for="username">Type your username*: <span class="check check__username"></span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>                    
                        </div>
                        <input class="form-control" type="text" name="login_username" 
                            placeholder="Username" id="username" autocomplete="username" required />
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Type your password*: <span class="check check__password"></span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input class="form-control" type="password" name="login_password" 
                            placeholder="Password" id="password" autocomplete="password" required /> 
                        <div class="input-group-append password">
                            <span class="input-group-text"><i class="fas fa-eye-slash password__toggle"></i></span>                    
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <p class="mb-1">Remember me</p>
                    <div class="remember">
                        <label for="checkbox" class="remember__paddle">
                            <span class="sr-only sr-only-focusable">Remember me</span>
                            <span class="remember--active">Yes</span>
                            <input class="form-control remember__input" type="checkbox" name="login_remember" id="checkbox" />
                            <div class="remember__slider"></div>
                            <span class="remember--inactive">No</span>
                        </label>
                    </div> 
                </div>
                <div class="form-group">
                    <button type="submit" name="login_submit" class="btn">
                        <i class="fas fa-sign-in-alt"></i> Sign In
                    </button>
                </div>
                <div class="form-group">
                    <p class="login__reset">
                        Forgot your password? <a href="<?=getenv('APP_URL')?>/admin/reset_password">Recover it</a>
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