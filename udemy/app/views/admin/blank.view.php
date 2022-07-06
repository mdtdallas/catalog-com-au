<!--===============================
=            Header Area            =
================================-->

<?php $this->view('admin/admin-header', $data) ?>
<!-- <?php $this->view('includes/header', $data) ?> -->

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

                <!--===============================
                =            Main Content         =
                ================================-->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">New Blank Page</h1>

                    <!-- ADD SECTION -->
                    <?php if ($action == 'add') : ?>
                        <!-- END ADD SECTION -->

                        <!-- EDIT SECTION -->
                    <?php elseif ($action == 'edit') : ?>
                        <!-- END EDIT SECTION -->

                        <!-- VIEW SECTION -->
                    <?php else : ?>
                        <!-- END VIEW SECTION -->

                    <?php endif; ?>

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