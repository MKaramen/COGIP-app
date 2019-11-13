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
        </div>

        <!-- NEW USER FORM -->
        <div class="new-user">
            <form method="post" class="form new-user__form" action="<?=getenv('APP_URL')?>/admin/new_user">
                <div class="form-group">
                    <label for="lastname">Last name*: <span class="check check__lastname"></span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>                    
                        </div>
                        <input class="form-control" type="text" name="new_user_lastname" 
                            placeholder="Last name" id="lastname" autocomplete="lastname" required />
                    </div>
                </div>
                <div class="form-group">
                    <label for="firstname">First name*: <span class="check check__firstname"></span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>                    
                        </div>
                        <input class="form-control" type="text" name="new_user_firstname" 
                            placeholder="First name" id="firstname" autocomplete="firstname" required />
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone">Phone*: <span class="check check__phone"></span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>                    
                        </div>
                        <input class="form-control" type="tel" name="new_user_phone" 
                            placeholder="Phone" id="phone" autocomplete="phone" minlength="10" maxlength="10" required />
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email*: <span class="check check__email"></span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-at"></i></span>                    
                        </div>
                        <input class="form-control" type="email" name="new_user_email" 
                            placeholder="Email address" id="email" autocomplete="email" required />
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Password*: <span class="check check__password"></span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input class="form-control" type="password" name="new_user_password" 
                            placeholder="Password" id="password" autocomplete="password" required /> 
                        <div class="input-group-append password">
                            <span class="input-group-text"><i class="fas fa-eye-slash password__toggle"></i></span>                    
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="company">Company*: <span class="check check__company"></span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-registered"></i></span>                    
                        </div>
                        <select class="form-control" id="company" name="new_user_company">
                            <option value="" default selected>--Choose a company--</option>
                            <?php 
                            
                            ?>
                        </select>
                    </div>
                </div>
                <!-- <div class="form-group">
                    <label for="date">Date: <span class="check check__date"></span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input class="form-control" type="datetime-local" name="new_user_date" 
                            value="<?=date('Y-m-d') . 'T' . date('H:i:s')?>" 
                            id="date" autocomplete="date" step="1" required /> 
                    </div>
                </div> -->
                <div class="form-group">
                    <label for="access">Access: <span class="check check__access"></span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-lock"></i></span>                    
                        </div>
                        <select class="form-control" id="access" name="new_user_access">
                            <option value="god mode">God</option>
                            <option value="moderator">Moderator</option>
                            <option value="user" selected>User</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" name="new_user_submit" class="btn">
                        <i class="fas fa-user-plus"></i> Sign Up
                    </button>
                </div>
            </form>
        </div>

    </section> 
    <!-- END OF MAIN CONTENT -->

</main>
<!-- END OF MAIN -->

<?php require getenv('APP_ROOT') . '/app/views/inc/footer.php'?>
<!-- END OF BODY -->