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

                <!--===============================
                =            Main Content         =
                ================================-->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <?php if ($action == 'reply') : ?>
                        <div class="row">
                            
                                <div class="col-1 p-3 h4">ID: <?= $row->id ?></div>
                          
                            <div class="col p-3 h4">User: <strong><?= $row->name ?></strong></div>
                            <div class="col p-3 h4">Posted: <strong><time><?= $row->created ?></time></strong></div>
                            <div class="col p-3 h4">Responded: <strong><?= $row->responded ?></strong></div>
                            <div class="col-4 p-3 h4">Email: <strong><?= $row->email ?></strong></div>
                        </div>
                        <div class="row">
                            <p class="m-5 bg-white border p-3 text-dark rounded"><?= $row->message ?></p>
                        </div>
                        <br>
                        <form method="POST">
                            <div class="row">
                                <textarea name="reply" cols="180" rows="10" class="m-3 rounded"></textarea>
                            </div>
                            <div class="row ml-2">
                                <div class="col-2">
                                <button type="submit" class="btn btn-primary float-end">Send Reply</button>
                                </div>
                                <div class="col-1">
                                <a href="<?=ROOT?>/admin/messages"><button type="submit" class="btn btn-primary float-end">Cancel</button></a>
                                </div>
                            </div>
                            
                        </form>

                    <?php else : ?>

                        <div class="col-md-12 ">
                            <!-- Recently Favorited -->
                            <div class="widget dashboard-container my-adslist">
                                <h3 class="widget-header">Messages</h3>
                                <table class="table table-responsive product-dashboard-table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Message</th>
                                            <th class="text-center" span='2'>Posted on:</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($messages)) : ?>
                                            <?php foreach ($messages as $message) : ?>

                                                <tr>
                                                    <td class="">
                                                        <h4><?= $message->id ?></h4>
                                                    </td>
                                                    <td class="product-details col">
                                                        <a href="<?= ROOT ?>/admin/messages/reply/<?= $message->id ?>" class="nav-link">
                                                            <p><?= $message->message ?></p>
                                                        </a>
                                                    </td>
                                                    <td class="product-category"><span class="categories"><?= $message->created ?></span></td>
                                                    <td class="action" data-title="Action">
                                                        <div class="">
                                                            <ul class="list-inline justify-content-center">
                                                                <li class="list-inline-item">
                                                                    <a data-toggle="tooltip" data-placement="top" title="View" class="view" href="<?= ROOT ?>/admin/messages/reply/<?= $message->id ?>">
                                                                        <i class="fa fa-eye"></i>
                                                                    </a>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <a data-toggle="tooltip" data-placement="top" title="Delete" class="delete" href="<?= ROOT ?>/admin/messages/delete/<?= $message->id ?>">
                                                                        <i class="fa fa-trash"></i>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else : ?>

                                            <tr>
                                                <td class="product-thumb">
                                                   
                                                </td>
                                                <td class="product-details">
                                                    <h3 class="title"></h3>
                                                    <p class="text-center">No Active Messages!</p>
                                                </td>
                                                <td class="product-category"><span class="categories"></span></td>
                                                <td class="action" data-title="Action">
                                                    <div class="">
                                                        <ul class="list-inline justify-content-center">
                                                            <li class="list-inline-item">
                                                                <a data-toggle="tooltip" data-placement="top" title="View" class="view" href="category.html">
                                                                    <i class="fa fa-eye"></i>
                                                                </a>
                                                            </li>
                                                            
                                                            
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endif; ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>

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