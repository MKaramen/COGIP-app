<?php 

require getenv('APP_ROOT') . '/app/views/inc/header.php';
//Session::timeout();
require getenv('APP_ROOT') . '/app/views/inc/countries.php';
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

            <!-- NEW COMPANY FORM -->
            <div class="new-user">
                <form method="post" class="form" action="<?=getenv('APP_URL')?>/admin/new_user">
                    <div class="form-group">
                        <label for="invoice-number">Company*: <span class="check check__input"></span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-registered"></i></span>                    
                            </div>
                            <input class="form-control" type="text" name="company_name"
                                placeholder="Type your Company name" id="company" autocomplete="company name" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tva">TVA number*: <span class="check check__input"></span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-registered"></i></span>                    
                            </div>
                            <input class="form-control" type="text" name="company_tva"
                                placeholder="Type your TVA number" id="tva" autocomplete="tva number" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone*: <span class="check check__input"></span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-phone"></i></span>                    
                            </div>
                            <input class="form-control" type="text" name="company_phone" minlength="10" maxlength="10"
                                placeholder="Type your phone number" id="phone" autocomplete="phone number" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="user">Your country: <span class="check check__select"></span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-globe"></i></span>                    
                            </div>
                            <select class="form-control" id="user" name="invoice_fk_people">
                                <option value="" default selected>--Choose your country--</option>
                                <?php 
                                foreach ($countries as $country) {
                                    echo '<option value="' . strtolower($country) . '">' . $country . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="type">Type: <span class="check check__select"></span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-store"></i></span>                    
                            </div>
                            <select class="form-control" id="type" name="company_type">
                                <option value="supplier">Supplier</option>
                                <option value="client" selected>Client</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="company_submit" class="btn">
                            <i class="far fa-registered"></i> Add new company
                        </button>
                    </div>
                </form>
            </div>

        <div>

    </section> 
    <!-- END OF MAIN CONTENT -->

</main>
<!-- END OF MAIN -->

<?php require getenv('APP_ROOT') . '/app/views/inc/footer.php'?>
<!-- END OF BODY -->