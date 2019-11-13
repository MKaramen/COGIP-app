<!-- NAVBAR ADMIN -->
<nav class="navbar navbar-expand-md py-sm-0" id="nav-sidebar">
    <ul class="navbar-nav flex-column dashboard__nav-items">
        <li class="nav-item">
            <a class="nav-link <?php if ($dataInfo['title'] == 'Dashboard') echo 'nav-link--active'?>" 
               href="<?=getenv('APP_URL')?>/admin/dashboard">
                <i class="fas fa-tachometer-alt"></i>&nbsp;<span class="d-none d-xl-inline">Dashboard</span></a></li>
        <li class="nav-item">
            <a class="nav-link <?php if ($dataInfo['title'] == 'New user') echo 'nav-link--active'?>" 
               href="<?=getenv('APP_URL')?>/admin/new_user">
               <i class="fas fa-user"></i>&nbsp; <span class="d-none d-xl-inline">New User</span></a></li>
        <li class="nav-item">
            <a class="nav-link <?php if ($dataInfo['title'] == 'New invoice') echo 'nav-link--active'?>" 
               href="<?=getenv('APP_URL')?>/admin/new_invoice">
               <i class="fas fa-file-invoice"></i>&nbsp; <span class="d-none d-xl-inline">New Invoice</span></a></li>
        <li class="nav-item">
            <a class="nav-link <?php if ($dataInfo['title'] == 'New company') echo 'nav-link--active'?>" 
               href="<?=getenv('APP_URL')?>/admin/new_company">
               <i class="far fa-registered"></i> <span class="d-none d-xl-inline">New Company</span></a></li>
    </ul>
</nav>
<!-- END OF NAVBAR ADMIN -->