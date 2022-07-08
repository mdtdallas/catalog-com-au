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
                    <h1 class="h3 mb-4 text-gray-800">Councils Page</h1>

                    <!-- ADD SECTION -->
                    <?php if ($action == 'add') : ?>
                        <div class="container-sm align-items-center">
                            <form method="POST" enctype="multipart/form-data" class="row mx-4" id="create-council-form">
                                <legend class="h1 text-center mt-3">Add Cat Council</legend>
                                <div class="mb-3">
                                    <label for="councilImagePath" class="form-label">Council Image</label>
                                    <input class="form-control" type="file" id="councilImagePath" name="councilImagePath">
                                    <?php if (!empty($errors['councilImagePath'])) : ?>
                                        <div class="text-danger js-error-councilImagePath"><?= $errors['councilImagePath'] ?></div>
                                    <?php endif; ?>
                                </div>
                                <div class="mb-3">
                                    <label for="council" class="form-label">Council Abbreviation</label>
                                    <input type="text" class="form-control" id="council" name="council" value="<?= set_value('council') ?>" required1>
                                    <?php if (!empty($errors['council'])) : ?>
                                        <div class="text-danger js-error-council"><?= $errors['council'] ?></div>
                                    <?php endif; ?>
                                </div>
                                <div class="mb-3">
                                    <label for="councilName" class="form-label">Council Name</label>
                                    <input type="text" class="form-control" id="councilName" name="councilName" value="<?= set_value('councilName') ?>" required>
                                    <?php if (!empty($errors['councilName'])) : ?>
                                        <div class="text-danger js-error-councilName"><?= $errors['councilName'] ?></div>
                                    <?php endif; ?>
                                </div>
                                <legend class="h2">Postage Address</legend>
                                <div class="mb-3">
                                    <label for="street" class="form-label">Address</label>
                                    <input type="text" class="form-control" name="street" value="<?= set_value('street') ?>">
                                    <?php if (!empty($errors['street'])) : ?>
                                        <div class="text-danger js-error-street"><?= $errors['street'] ?></div>
                                    <?php endif; ?>
                                </div>
                                <div class="row align-items-start">
                                    <div class="col">
                                        <label for="suburb" class="form-label">Suburb</label>
                                        <input type="text" class="form-control" name="suburb" value="<?= set_value('suburb') ?>">
                                        <?php if (!empty($errors['suburb'])) : ?>
                                        <div class="text-danger js-error-suburb"><?= $errors['suburb'] ?></div>
                                    <?php endif; ?>
                                    </div>
                                    <div class="col">
                                        <label for="state" class="form-label">State</label>
                                        <input type="text" class="form-control" name="state" value="<?= set_value('state') ?>">
                                        <?php if (!empty($errors['state'])) : ?>
                                        <div class="text-danger js-error-state"><?= $errors['state'] ?></div>
                                    <?php endif; ?>
                                    </div>
                                    <div class="col">
                                        <label for="postcode" class="form-label">Post Code</label>
                                        <input type="text" class="form-control" name="postcode" value="<?= set_value('postcode') ?>">
                                        <?php if (!empty($errors['postcode'])) : ?>
                                        <div class="text-danger js-error-postcode"><?= $errors['postcode'] ?></div>
                                    <?php endif; ?>
                                    </div>
                                </div>
                                <legend class="h2 pt-3">Contact Details</legend>
                                <div class="row align-items-start">
                                    <div class="col">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" class="form-control" name="councilPhone" value="<?= set_value('councilPhone') ?>">
                                        <?php if (!empty($errors['councilPhone'])) : ?>
                                        <div class="text-danger js-error-councilPhone"><?= $errors['councilPhone'] ?></div>
                                    <?php endif; ?>
                                    </div>
                                    <div class="col">
                                        <label for="email" class="form-label">Email Address</label>
                                        <input type="email" class="form-control" name="councilEmail" value="<?= set_value('councilEmail') ?>">
                                        <?php if (!empty($errors['councilEmail'])) : ?>
                                        <div class="text-danger js-error-councilEmail"><?= $errors['councilEmail'] ?></div>
                                    <?php endif; ?>
                                    </div>
                                    <div class="col">
                                        <label for="url" class="form-label">Website</label>
                                        <input type="url" class="form-control" name="councilURL" value="<?= set_value('councilURL') ?>">
                                        <?php if (!empty($errors['councilURL'])) : ?>
                                        <div class="text-danger js-error-councilURL"><?= $errors['councilURL'] ?></div>
                                    <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col">
                                    <input type="submit" value="Create Council" data-bs-dismiss="modal" class="my-5 btn btn-primary">
                                </div>
                                <div class="col">
                                <a href="<?= ROOT ?>/admin/councils" class="btn btn-outline-primary my-5">Cancel</a>
                                </div>
                                </div>
                            </form>
                        </div>

                        <!-- END ADD SECTION -->

                        <!-- EDIT SECTION -->
                    <?php elseif ($action == 'edit') : ?>

                        <div class="container-sm align-items-center">
                            <form method="POST" enctype="multipart/form-data" class="row mx-4" id="create-council-form">
                                <legend class="h1 text-center mt-3">Edit Cat Council</legend>
                                <div class="mb-3">
                                    <img src="<?=get_image($row->councilImagePath)?>" alt="" class="image-preview">
                                    <label for="councilImagePath" class="form-label">Council Image</label>
                                    <input class="form-control" type="file" id="councilImagePath" name="councilImagePath" >
                                    <?php if (!empty($errors['councilImagePath'])) : ?>
                                        <div class="text-danger js-error-councilImagePath"><?= $errors['councilImagePath'] ?></div>
                                    <?php endif; ?>
                                </div>
                                <div class="mb-3">
                                    <label for="council" class="form-label">Council Abbreviation</label>
                                    <input type="text" class="form-control" id="council" name="council" value="<?= set_value('council', $row->council) ?>" required1>
                                    <?php if (!empty($errors['council'])) : ?>
                                        <div class="text-danger js-error-council"><?= $errors['council'] ?></div>
                                    <?php endif; ?>
                                </div>
                                <div class="mb-3">
                                    <label for="councilName" class="form-label">Council Name</label>
                                    <input type="text" class="form-control" id="councilName" name="councilName" value="<?= set_value('councilName', $row->councilName) ?>" required>
                                    <?php if (!empty($errors['councilName'])) : ?>
                                        <div class="text-danger js-error-councilName"><?= $errors['councilName'] ?></div>
                                    <?php endif; ?>
                                </div>
                                <legend class="h2">Postage Address</legend>
                                <div class="mb-3">
                                    <label for="street" class="form-label">Address</label>
                                    <input type="text" class="form-control" name="street" value="<?= set_value('street', $row->street) ?>">
                                    <?php if (!empty($errors['street'])) : ?>
                                        <div class="text-danger js-error-street"><?= $errors['street'] ?></div>
                                    <?php endif; ?>
                                </div>
                                <div class="row align-items-start">
                                    <div class="col">
                                        <label for="suburb" class="form-label">Suburb</label>
                                        <input type="text" class="form-control" name="suburb" value="<?= set_value('suburb', $row->suburb) ?>">
                                        <?php if (!empty($errors['suburb'])) : ?>
                                        <div class="text-danger js-error-suburb"><?= $errors['suburb'] ?></div>
                                    <?php endif; ?>
                                    </div>
                                    <div class="col">
                                        <label for="state" class="form-label">State</label>
                                        <input type="text" class="form-control" name="state" value="<?= set_value('state', $row->state) ?>">
                                        <?php if (!empty($errors['state'])) : ?>
                                        <div class="text-danger js-error-state"><?= $errors['state'] ?></div>
                                    <?php endif; ?>
                                    </div>
                                    <div class="col">
                                        <label for="postcode" class="form-label">Post Code</label>
                                        <input type="text" class="form-control" name="postcode" value="<?= set_value('postcode', $row->postcode) ?>">
                                        <?php if (!empty($errors['postcode'])) : ?>
                                        <div class="text-danger js-error-postcode"><?= $errors['postcode'] ?></div>
                                    <?php endif; ?>
                                    </div>
                                </div>
                                <legend class="h2 pt-3">Contact Details</legend>
                                <div class="row align-items-start">
                                    <div class="col">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" class="form-control" name="councilPhone" value="<?= set_value('councilPhone', $row->councilPhone) ?>">
                                        <?php if (!empty($errors['councilPhone'])) : ?>
                                        <div class="text-danger js-error-councilPhone"><?= $errors['councilPhone'] ?></div>
                                    <?php endif; ?>
                                    </div>
                                    <div class="col">
                                        <label for="email" class="form-label">Email Address</label>
                                        <input type="email" class="form-control" name="councilEmail" value="<?= set_value('councilEmail', $row->councilEmail) ?>">
                                        <?php if (!empty($errors['councilEmail'])) : ?>
                                        <div class="text-danger js-error-councilEmail"><?= $errors['councilEmail'] ?></div>
                                    <?php endif; ?>
                                    </div>
                                    <div class="col">
                                        <label for="url" class="form-label">Website</label>
                                        <input type="url" class="form-control" name="councilURL" value="<?= set_value('councilURL', $row->councilURL) ?>">
                                        <?php if (!empty($errors['councilURL'])) : ?>
                                        <div class="text-danger js-error-councilURL"><?= $errors['councilURL'] ?></div>
                                    <?php endif; ?>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-evenly">
                                    <input type="submit" value="Update Council" data-bs-dismiss="modal" class="my-5 btn btn-primary">
                                    <a href="<?= ROOT ?>/admin/councils" class="btn btn-outline-primary my-5">Cancel</a>
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
                                    Cat Councils
                                    <a href="<?= ROOT ?>/admin/councils/add">
                                        <button class='btn btn-primary ml-3 p-2'><i class="fa-solid fa-calendar-days mr-2"></i>New Council</button>
                                </h6>
                                </a>
                            </div>

                            <div class="card-body">
                                <div>
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Council</th>
                                                <th>Council Name</th>
                                                <th>Image</th>
                                                <th>State</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Created By</th>
                                                <th>Created On</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Council</th>
                                                <th>Council Name</th>
                                                <th>Image</th>
                                                <th>State</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Created By</th>
                                                <th>Created On</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>

                                        <?php if (!empty($rows)) : ?>
                                            <tbody class="dataset">

                                                <?php foreach ($rows as $row) : ?>
                                                    <tr>
                                                        <td><?= $row->id ?></td>
                                                        <td><?= esc($row->council ?? 'Unknown') ?></td>
                                                        <td><?= ($row->councilName ?? 'Unknown') ?></td>
                                                        <td><img src="<?= get_image($row->councilImagePath) ?>" alt="" width="90"></td>
                                                        <td><?= esc($row->state) ?></td>
                                                        <td><?= esc($row->councilPhone ?? 'Unknown') ?></td>
                                                        <td><?= esc($row->councilEmail ?? 'Unknown') ?></td>
                                                        <td><?= esc($row->user_row->name ?? 'Unknown') ?></td>
                                                        <td><?= esc($row->dateCreated ?? 'Unknown') ?></td>

                                                        <td>
                                                            <a href="<?= ROOT ?>/admin/councils/edit/<?= $row->id ?>">
                                                                <i class="fa-solid fa-pen-to-square text-success"></i>
                                                            </a>
                                                            <a href="<?= ROOT ?>/admin/councils/delete/<?= $row->id ?>">
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