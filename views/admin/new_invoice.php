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

            <!-- NEW INVOICE FORM -->
            <div class="new-user">
                <form method="post" class="form" action="<?=getenv('APP_URL')?>/admin/new_user">
                    <div class="form-group">
                        <label for="invoice-number">Invoice Number*: <span class="check check__input"></span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-invoice"></i></span>                    
                            </div>
                            <input class="form-control" type="text" name="invoice_number" maxlength="13"
                                placeholder="Invoice number" id="invoice-number" autocomplete="invoice number" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="date">Invoice Date*: <span class="check check__input"></span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input class="form-control" type="datetime-local" name="invoice_date" 
                                value="<?=date('Y-m-d') . 'T' . date('H:i:s')?>" 
                                id="date" autocomplete="date" step="1" required /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="company">Company*: <span class="check check__select"></span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-registered"></i></span>                    
                            </div>
                            <select class="form-control" id="company" name="invoice_fk_company">
                                <option value="" default selected>--Choose a company--</option>
                                <?php 
                                
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="user">Contact*: <span class="check check__select"></span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>                    
                            </div>
                            <select class="form-control" id="user" name="invoice_fk_people">
                                <option value="" default selected>--Choose your contact person--</option>
                                <?php 
                                
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="invoice_submit" class="btn">
                            <i class="fas fa-file-invoice"></i> Add new invoice
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