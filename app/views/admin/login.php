<!-- header content -->
<?php require getenv('APP_ROOT') . '/app/views/inc/header.php'?>

<!-- main content (login page) -->
<main id="main" class="jumbotron jumbotron-fluid mb-0 py-3">

    <!-- section-content -->
    <section class="container content">
        <h2 class="content__title"><?=$dataInfo['content_title']?></h2>
        <div class="content__body">
            <p class="content__description"><?=$dataInfo['content_description']?></p>
            <div class="login">
                <form method="post" class="form login__form" action="<?=getenv('APP_URL')?>/admin/dashboard">
                    <div class="form__alert form__alert-login d-none">
                        <p>These credentials do not match our records.</p>
                    </div>
                    <div class="form-group">
                        <label for="username">Type your username*:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>                    
                            </div>
                            <input class="form-control" type="text" name="user_id" 
                                placeholder="Username" id="username" autocomplete="username" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Type your password*:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input class="form-control" type="password" name="user_password" 
                                placeholder="Password" id="password" autocomplete="current-password" required /> 
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-eye-slash toggle-password"></i></span>                    
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <p class="mb-1">Remember me</p>
                        <div class="remember">
                            <label for="checkbox" class="remember__paddle">
                                <span class="sr-only sr-only-focusable">Remember me</span>
                                <span class="remember--active" aria-hidden="true">Yes</span>
                                <input class="form-control remember__input" type="checkbox" 
                                    name="user_remember" id="checkbox" />
                                <div class="remember__slider"></div>
                                <span class="remember--inactive" aria-hidden="true">No</span>
                            </label>
                        </div> 
                    </div>
                    <div class="form-group">
                        <button type="submit" name="login" class="btn">
                            <i class="fas fa-sign-in-alt"></i> Sign In
                        </button>
                    </div>
                    <div class="form-group">
                        <p class="login__reset">
                            Forgot your password? <a href="<?=getenv('APP_URL')?>/admin/reset">Recover it</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>

<!-- footer content -->
<?php require getenv('APP_ROOT') . '/app/views/inc/footer.php'?>