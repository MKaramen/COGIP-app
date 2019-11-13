<?php 

require getenv('APP_ROOT') . '/app/views/inc/header.php';
//Session::timeout();
?>

<!-- MAIN (index.php) -->
<main class="main jumbotron jumbotron-fluid mb-0 py-0">

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

            <!-- NEW USER FORM -->
            <div class="new-user">
                <form method="post" class="form" action="<?=getenv('APP_URL')?>/admin/new_user">
                    <div class="form-group">
                        <label for="lastname">Last name*: <span class="check check__input"></span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>                    
                            </div>
                            <input class="form-control" type="text" name="user_lastname" 
                                value="<?=$dataModel['lastname']?>"
                                placeholder="Last name" id="lastname" autocomplete="lastname" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="firstname">First name*: <span class="check check__input"></span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>                    
                            </div>
                            <input class="form-control" type="text" name="user_firstname" 
                                value="<?=$dataModel['firstname']?>"
                                placeholder="First name" id="firstname" autocomplete="firstname" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone*: <span class="check check__input"></span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-phone"></i></span>                    
                            </div>
                            <input class="form-control" type="tel" name="user_phone" 
                                value="<?=$dataModel['phone']?>"
                                placeholder="Phone" id="phone" autocomplete="phone" minlength="10" maxlength="10" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email*: <span class="check check__input"></span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-at"></i></span>                    
                            </div>
                            <input class="form-control" type="email" name="user_email" 
                                value="<?=$dataModel['email']?>"
                                placeholder="Email address" id="email" autocomplete="email" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password*: <span class="check check__input"></span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input class="form-control" type="password" name="user_password" 
                                value="<?=$dataModel['password']?>"
                                placeholder="Password" id="password" autocomplete="password" required /> 
                            <div class="input-group-append password">
                                <span class="input-group-text"><i class="fas fa-eye-slash password__toggle"></i></span>                    
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="company">Company*: <span class="check check__select"></span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-registered"></i></span>                    
                            </div>
                            <select class="form-control" id="company" name="user_company">
                                <option value="" default selected>--Choose a company--</option>
                                <?php foreach ($dataModel['companies'] as $company) {?>
                                <option value="<?= strtolower($company) ?>" <?=$company==$dataModel['company'] ? 'selected':''?>>
                                    <?=$company?>
                                </option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="date">Date: <span class="check check__input"></span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input class="form-control" type="datetime-local" name="user_date" 
                                value="<?=$dataModel['date']?>"
                                id="date" autocomplete="date" step="1" required /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="access">Access: <span class="check check__select"></span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-lock"></i></span>                    
                            </div>
                            <select class="form-control" id="access" name="user_access">
                                <option value="god" <?=$dataModel['access']=='god' ? 'selected': ''?>>God</option>
                                <option value="moderator" <?=$dataModel['access']=='moderator' ? 'selected': ''?>>Moderator</option>
                                <option value="user" <?=$dataModel['access']=='user' ? 'selected': ''?>>User</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="user_submit" class="btn">
                            <i class="fas fa-user-plus"></i> Sign Up
                        </button>
                    </div>
                </form>
            </div>
        
        </div>

    </section> 
    <!-- END OF MAIN CONTENT -->

</main>
<!-- END OF MAIN -->

<?php require getenv('APP_ROOT') . '/app/views/inc/footer.php'?>
<!-- END OF BODY -->