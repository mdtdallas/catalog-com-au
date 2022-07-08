<!-- Topbar -->

<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->
    <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary p-2" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form> -->

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>
<?php if(Auth::is_admin()) : ?>
        <!-- Nav Item - Alerts -->
        <?php if(!empty($bookings)) : ?>

        <li class="nav-item dropdown no-arrow mx-1">
            
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter"><?=$data['total_bookings'] ?? 'none' ?></span>
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                    Alerts Center
                </h6>
                <?php foreach($bookings as $booking) : ?>
                <div class="dropdown-item d-flex align-items-center" >
                    <div class="mr-3">
                        <div class="icon-circle bg-primary">
                            <i class="fa-solid fa-ticket text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500"><time><?=$booking->created?></time></div>
                        <span class="">Ticket Sold!</span>
                        <div><?=$booking->show_row->showTitle?></div>
                    </div>
                    <div>
                        <form method="POST">
                        <button type="submit" class="btn btn-outline-secondary pl-3 ml-5"><div class=""><i class="fa-solid fa-check pl-3"></i></div></button>
                        <input type="text" name="active" value="no" hidden>
                        <input type="text" name="id" value="<?=$booking->id?>" hidden>
                        </form>
                    </div>
                </div>
                <?php endforeach;?>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
            </div>
        </li>
        <?php else : ?>
            <div></div>
            <?php endif; ?>

        <!-- Nav Item - Messages -->
        <li class="nav-item dropdown no-arrow mx-1">
        <?php if(!empty($messages)) : ?>
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter"><?=$total_messages ?? 'none'?></span>
            </a>
            
            <!-- Dropdown - Messages -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                    Message Center
                </h6>
                <?php foreach($messages as $message) : ?>
                <a class="dropdown-item d-flex align-items-center" href="<?=ROOT?>/admin/messages/<?=$message->id?>">
                    <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="<?= ROOT ?>/assets/img/undraw_profile_1.svg" alt="...">
                        <div class="status-indicator bg-success"></div>
                    </div>
                    <div class="font-weight-bold">
                        <div class="text-truncate"><?=$message->message?></div>
                        <div class="small text-gray-500">From: <?=$message->name?> <?=$message->email?></div>
                    </div>
                </a>
                <?php endforeach;?>
                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
            </div>
            <?php else : ?>
                <div></div>
            <?php endif;?>
        </li>
<?php endif;?>
        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= Auth::getFirstName() ?> <?= Auth::getLastName() ?></span>
                <img class="img-profile rounded-circle" src="<?= ROOT ?>/<?= Auth::getImage() ?>">
                <img alt="">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <span class="dropdown-item"><?= ucfirst(Auth::getRole()) ?></span>
                <a class="dropdown-item" href="<?=ROOT?>/admin/profile/<?=Auth::getId()?>">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <a class="dropdown-item" href="<?=ROOT?>/admin/messages">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Messages
                </a>
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?=ROOT?>/admin/" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>

    </ul>

</nav>

<!-- End of Topbar -->
<?php if (message()) : ?>
    <div class="alert alert-success text-center"><?= message('', true) ?></div>
<?php endif; ?>