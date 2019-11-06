<!-- nav -->
<nav class="navbar navbar-expand-md py-sm-0" id="nav">

    <!-- logo -->
    <a class="navbar-brand d-flex logo__block" href="<?=getenv('APP_URL')?>">
        <div class="logo__im d-none d-sm-block mr-2">
            <img src="<?=getenv('APP_URL')?>/public/assets/img/cogip-logo.png" alt="Cogip logo">
        </div>
        <div class="logo__body">
            <h1 class="logo__title"><?=getenv('APP_NAME')?></h1>
            <div class="logo__ratings">
                <i class="fas fa-star"></i> <i class="fas fa-star"></i> <span>Becode certified</span>
            </div>
        </div>
    </a>
    <!-- logo-end -->

    <!-- hamburger icon -->
    <button class="navbar-toggler nav__hamburger pb-3" type="button" 
            data-toggle="collapse" data-target="#hidden-nav" 
            aria-controls="hidden-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="line line1"></span>
        <span class="line line2"></span>
        <span class="line line3"></span>
    </button>
    <!-- hamburger icon-end --> 

    <!-- top menu items -->
    <div class="collapse navbar-collapse d-felx justify-content-end align-self-start" id="hidden-nav">
        <ul class="navbar-nav border-top py-3 py-md-0 nav__top">
            <li class="nav-item text-md-center">
                <a class="nav-link <?php if ($dataInfo['title'] == 'Home') echo 'nav-link--active'?>" 
                    href="<?=getenv('APP_URL')?>">
                    <i class="fas fa-home"></i> Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($dataInfo['title'] == 'Users') echo 'nav-link--active'?>" 
                    href="<?=getenv('APP_URL')?>/pages/users">
                    <i class="fas fa-users"></i> Users</a>
            </li>
            <li class="nav-item text-md-center">
                <a class="nav-link <?php if ($dataInfo['title'] == 'Invoices') echo 'nav-link--active'?>" 
                    href="<?=getenv('APP_URL')?>/pages/invoices">
                    <i class="fas fa-file-invoice"></i> Invoices</a>
            </li>
            <li class="nav-item text-md-center">
                <a class="nav-link <?php if ($dataInfo['title'] == 'Companies') echo 'nav-link--active'?>" 
                    href="<?=getenv('APP_URL')?>/pages/companies">
                    <i class="far fa-registered"></i> Companies</a>
            </li>
            <li class="nav-item text-md-center">
                <a class="nav-link <?php if ($dataInfo['title'] == 'Login') echo 'nav-link--active'?>" 
                    href="<?=getenv('APP_URL')?>/admin/login">
                    <i class="fas fa-user-lock"></i> Login</a>
            </li> 
        </ul>
    </div> 
    <!-- top menu items-end --> 

</nav>
<!-- nav-end -->