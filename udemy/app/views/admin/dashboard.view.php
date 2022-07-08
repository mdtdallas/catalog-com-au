<!--===============================
=            Header Area            =
================================-->

<?php $this->view('admin/admin-header', $data) ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!--===============================
        =            Sidebar Area          =
        ================================-->

<?php $this->view('admin/admin-sidebar', $data) ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!--===============================
                =            Topbar Area         =
                ================================-->

<?php $this->view('admin/admin-topbar', $data) ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>
<?php if(Auth::is_admin()) : ?>
                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Earnings (Monthly)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Earnings (Annual)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tickets Sold
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?=$total_bookings?></div>
                                                </div>
                                                <div class="col">
                                                    <!-- <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                        <a href="<?=ROOT?>/admin/messages" class="row">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pending Messages</div>
                                           
                                            </a>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?= $data['total_messages']?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
<?php endif; ?>
                    <!-- Content Row -->

                    <div class="row">

                        

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                          <!-- Illustrations -->
                          <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Title</h6>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="<?= ROOT ?>/assets/img/undraw_posting_photo.svg" alt="...">
                                    </div>
                                    
                                    <a target="_blank" rel="nofollow" href="https://webscape.net.au">See all sites from Webscape &rarr;</a>
                                </div>
                            </div>  

                            

                        </div>

                        <div class="col-lg-6 mb-4">

                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Title</h6>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="<?= ROOT ?>/assets/img/undraw_posting_photo.svg" alt="...">
                                    </div>
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tempora ut culpa, dignissimos quibusdam, deserunt unde facere accusantium dolorem minus maxime commodi assumenda dolorum vitae similique. Doloribus expedita hic dolor explicabo.</p>
                                    <a target="_blank" rel="nofollow" href="https://webscape.net.au">See all sites from Webscape &rarr;</a>
                                </div>
                            </div>

                            <!-- Approach -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Secondary Title</h6>
                                </div>
                                <div class="card-body">
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. A eaque, laborum reiciendis eveniet exercitationem corrupti repudiandae quasi ratione nam accusamus.</p>
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quod exercitationem, perspiciatis sequi asperiores, ipsa quisquam incidunt tempore ducimus expedita enim quos. Nesciunt reiciendis, consectetur quis earum fugiat rem molestias dolor.</p>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

             <!--===============================
        =           Footer Area          =
        ================================-->

<?php $this->view('admin/admin-footer', $data) ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

</body>

</html>