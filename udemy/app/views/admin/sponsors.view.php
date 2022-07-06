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

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Sponsors Page</h1>

                    <!-- ADD SECTION -->
                    <?php if ($action == 'add') : ?>

                        <div class="container-sm align-items-center">
                            <form method="POST" id="create-sponsor-form" enctype="multipart/form-data">
                                <legend class="h1 text-center my-3">Add Show Sponsor</legend>
                                <div class="mb-3">
                                    <label for="sponsor" class="form-label">Sponsor</label>
                                    <input type="text" class="form-control" id="sponsor" name="sponsor" value="<?= set_value('sponsor') ?>" required1>
                                    <?php if (!empty($errors['sponsor'])) : ?>
                                        <div class="text-danger js-error-sponsor"><?= $errors['sponsor'] ?></div>
                                    <?php endif; ?>
                                </div>
                                <div class="mb-3">
                                    <label for="sponsor_image" class="form-label">Sponsor sponsor_image</label>
                                    <input type="file" class="form-control" id="sponsor_image" name="sponsor_image" value="<?= set_value('sponsor_image') ?>" required1>
                                    <?php if (!empty($errors['sponsor_image'])) : ?>
                                        <div class="text-danger js-error-sponsor_image"><?= $errors['sponsor_image'] ?></div>
                                    <?php endif; ?>
                                </div>
                                <div class="mb-3">
                                    <label for="URL" class="form-label">Website Link</label>
                                    <input type="url" class="form-control" id="URL" name="sponsor_url" value="<?= set_value('sponsor_url') ?>" required1>
                                    <?php if (!empty($errors['sponsor_url'])) : ?>
                                        <div class="text-danger js-error-sponsor_url"><?= $errors['sponsor_url'] ?></div>
                                    <?php endif; ?>
                                </div>
                                <div class="d-flex justify-content-evenly">
                                    <input type="submit" value="Create Sponsor" data-bs-dismiss="modal" class="my-3 btn btn-primary">
                                    <a href="<?= ROOT ?>/admin/sponsors" class="btn btn-outline-primary my-3 ml-4">Cancel</a>
                                </div>
                            </form>
                        </div>

                        <!-- END ADD SECTION -->

                        <!-- EDIT SECTION -->
                    <?php elseif ($action == 'edit') : ?>

                        <div class="container-sm align-items-center">
                            <form method="POST" id="create-sponsor-form" enctype="multipart/form-data">
                                <legend class="h1 text-center my-3">Edit Show Sponsor</legend>
                                <div class="mb-3">
                                    <label for="sponsor" class="form-label">Sponsor</label>
                                    <input type="text" class="form-control" id="sponsor" name="sponsor" value="<?= set_value('sponsor', $row[0]->sponsor) ?>" required1>
                                    <?php if (!empty($errors['sponsor'])) : ?>
                                        <div class="text-danger js-error-sponsor"><?= $errors['sponsor'] ?></div>
                                    <?php endif; ?>
                                </div>
                                <div class="mb-3">
                                    <label for="sponsor_image" class="form-label">Sponsor sponsor_image</label>
                                    <input type="file" class="form-control" id="sponsor_image" name="sponsor_image" value="<?= set_value('sponsor_image') ?>" required1>
                                    <?php if (!empty($errors['sponsor_image'])) : ?>
                                        <div class="text-danger js-error-sponsor_image"><?= $errors['sponsor_image'] ?></div>
                                    <?php endif; ?>
                                </div>
                                <div class="mb-3">
                                    <label for="URL" class="form-label">Website Link</label>
                                    <input type="url" class="form-control" id="URL" name="sponsor_url" value="<?= set_value('sponsor_url', $row[0]->sponsor_url) ?>" required1>
                                    <?php if (!empty($errors['sponsor_url'])) : ?>
                                        <div class="text-danger js-error-sponsor_url"><?= $errors['sponsor_url'] ?></div>
                                    <?php endif; ?>
                                </div>
                                <div class="d-flex justify-content-evenly">
                                    <input type="submit" value="Update Sponsor" data-bs-dismiss="modal" class="btn btn-primary mt-3 p-2">
                                    <a href="<?= ROOT ?>/admin/sponsors" class="btn btn-outline-primary ml-5 mt-3 p-2">Cancel</a>
                                </div>
                            </form>
                        </div>


                        <!-- END EDIT SECTION -->

                        <!-- VIEW SECTION -->
                    <?php else : ?>
                        <?php if ($rows) ?>
                        <!-- DataTales -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">
                                    Sponsors
                                    <a href="<?= ROOT ?>/admin/sponsors/add">
                                        <button class='btn btn-primary ml-3 p-2'><i class="fa-solid fa-calendar-days mr-2"></i>New Sponsor</button>
                                </h6>
                                </a>
                            </div>

                            <div class="card-body">
                                <div>
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Sponsor</th>
                                                <th>Image</th>
                                                <th>URL</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Sponsor</th>
                                                <th>Image</th>
                                                <th>URL</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>

                                        <?php if (!empty($rows)) : ?>
                                            <tbody class="dataset">

                                                <?php foreach ($rows as $row) : ?>
                                                    <tr>
                                                        <td><?= $row->id ?></td>
                                                        <td><?= esc($row->sponsor) ?></td>
                                                        <td><img src="<?= esc($row->sponsor_image) ?>" alt="" width="90"></td>
                                                        <td><?= esc($row->sponsor_url) ?></td>
                                                        <td>
                                                            <a href="<?= ROOT ?>/admin/sponsors/edit/<?= $row->id ?>">
                                                                <i class="fa-solid fa-pen-to-square text-success"></i>
                                                            </a>
                                                            <a href="<?= ROOT ?>/admin/sponsors/delete/<?=$row->id ?>">
                                                                <i class="fa-solid fa-trash-can text-danger"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        <?php else : ?>
                                            <tr>
                                                <td colspan="8">No records found</td>
                                            </tr>
                                        <?php endif; ?>

                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- end datatable -->
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