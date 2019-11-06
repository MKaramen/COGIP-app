<!-- nav admin -->
<nav class="navbar navbar-expand-md py-sm-0" id="dashboard__nav">
    <ul class="navbar-nav dashboard__nav-items">
        <li class="nav-item">
            <a class="nav-link <?php if ($dataInfo['title'] == 'Dashboard') echo 'nav-link--active'?>" 
               href="<?=getenv('APP_URL')?>/admin/dashboard">
                <i class="fas fa-tachometer-alt"></i> Dashboard <span class="sr-only">(current)</span></a></li>
        <li class="nav-item">
            <a class="nav-link <?php if ($dataInfo['title'] == 'New user') echo 'nav-link--active'?>" 
               href="<?=getenv('APP_URL')?>/admin/new_user"><i class="fas fa-user"></i> New User</a></li>
        <li class="nav-item">
            <a class="nav-link <?php if ($dataInfo['title'] == 'New invoice') echo 'nav-link--active'?>" 
               href="<?=getenv('APP_URL')?>/admin/new_invoice"><i class="fas fa-file-invoice"></i> New Invoice</a></li>
        <li class="nav-item">
            <a class="nav-link <?php if ($dataInfo['title'] == 'New company') echo 'nav-link--active'?>" 
               href="<?=getenv('APP_URL')?>/admin/new_company"><i class="far fa-registered"></i> New Company</a></li>
    </ul>
</nav>
<!-- nav-admin end -->