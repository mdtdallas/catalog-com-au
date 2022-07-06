<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= ROOT ?>/admin">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Cat A Log <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?= ROOT ?>/admin">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="<?= ROOT ?>/">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Home Page</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <?php if (Auth::is_admin()) : ?>
        <li class="nav-item active">
            <a class="nav-link" href="<?= ROOT ?>/admin/users">
                <i class="fa-solid fa-users"></i>
                <span>Users</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="<?= ROOT ?>/admin/cats">
                <i class="fa-solid fa-cat"></i>
                <span>Cats</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="<?= ROOT ?>/admin/councils">
                <i class="fa-solid fa-ticket"></i>
                <span>Councils</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="<?= ROOT ?>/admin/sponsors">
                <i class="fa-solid fa-ticket"></i>
                <span>Sponsors</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="<?= ROOT ?>/admin/messages">
                <i class="fa-solid fa-message"></i>
                <span>Messages</span></a>
        </li>
    <?php else : ?>

        <div></div>
        
    <?php endif; ?>

    <li class="nav-item active">
        <a class="nav-link" href="<?= ROOT ?>/admin/shows">
            <i class="fa-solid fa-calendar-days"></i>
            <span>Shows</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item active">
        <a class="nav-link" href='<?= ROOT ?>/admin/profile/'>
            <i class="fa-solid fa-ticket"></i>
            <span>Profile</span></a>
    </li>

    <!-- <li class="nav-item active">
        <a class="nav-link" href="<?= ROOT ?>/admin/dbadmin">
            <i class="fa-solid fa-ticket"></i>
            <span>Database Maintenance</span></a>
    </li> -->

    <li class="nav-item active">
        <a class="nav-link" href="<?= ROOT ?>/logout">
            <i class="fa-solid fa-ticket"></i>
            <span>Logout</span></a>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->