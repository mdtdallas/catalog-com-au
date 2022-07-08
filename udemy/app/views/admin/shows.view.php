<!-- STYLES -->

<style>
    .loader {
        width: 500px;

    }

    .hide {
        display: none;
    }
</style>

<!--===============================
=            Header Area            =
================================-->

<?php $this->view('admin/admin-header', $data) ?>
<?php $this->view('includes/header', $data) ?>

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
                    <?php if ($action == 'add') : ?>

                        <!--===============================
                =           New Show Form         =
                ================================-->

                        <div class="container-fluid">
                            <div id="newShowForm" class="container-xxl align-items-center card shadow">
                                <form method="POST" id="create-show-form mb-3" class="row mx-4" enctype="multipart/form-data">
                                    <legend class="card-title text-center mt-5">Create New Show</legend>
                                    <div class="row align-items-center mb-3 mt-1">
                                        <div class="col">
                                            <div class="row">
                                                <div class="col mt-5">
                                                    <label for="sponsor" class="form-label">Show Sponsor</label>
                                                    <select class="form-select" aria-label="Default select example" id="sponsorList" name="sponsorName">
                                                        <option value="none">None</option>
                                                        <?php if (!empty($sponsors)) : ?>
                                                            <?php foreach ($sponsors as $spon) : ?>
                                                                <option value="<?= $spon->id ?>"><?= esc($spon->sponsor) ?></option>
                                                            <?php endforeach; ?>
                                                        <?php endif; ?>
                                                    </select>
                                                    <a href="<?=ROOT?>/admin/sponsors/add" class="btn btn-primary p-2 mt-3">Add Sponsor</a>
                                                </div>
                                                <div class="col mt-5">
                                                    <label for="council" class="form-label">Cat Council</label>
                                                    <select class="form-select council_list" aria-label="Default select example" id="council_list" name="council">
                                                        <option value="none">None</option>
                                                        <?php if (!empty($councils)) : ?>
                                                            <?php foreach ($councils as $coun) : ?>
                                                                <option value="<?= $coun->id ?>"><?= esc($coun->council) ?></option>
                                                            <?php endforeach; ?>
                                                        <?php endif; ?>
                                                    </select>
                                                    <a href="<?=ROOT?>/admin/councils/add" class="btn btn-primary mt-3 p-2">Add Council</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row input-group">
                                                <div class="col">
                                                    <label for="showDate" class="form-label">Show Date</label>
                                                    <input class="form-control <?= !empty($errors['showDate']) ? 'border-danger' : 'border'; ?>" type="date" id="showDate" name="showDate" value="<?= set_value('showTitle') ?>">
                                                    <?php if (!empty($errors['showDate'])) : ?>
                                                        <div class="text-danger"><?= $errors['showDate'] ?></div>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="col">
                                                    <label for="time" class="form-label">Time</label>
                                                    <div class="row">
                                                        <div class="col">
                                                            <input type="time" name="showTime" id="time" class="form-control <?= !empty($errors['time']) ? 'border-danger' : 'border'; ?>" value="<?= set_value('time') ?>">
                                                            <?php if (!empty($errors['time'])) : ?>
                                                                <div class="text-danger"><?= $errors['time'] ?></div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <label for="entryClosingDate" class="form-label">Show Entry Closing Date</label>
                                                    <input class="form-control <?= !empty($errors['entryClosingDate']) ? 'border-danger' : 'border'; ?>" type="date" id="entryClosingDate" name="entryClosingDate" value="<?= set_value('entryClosingDate') ?>">
                                                    <?php if (!empty($errors['entryClosingDate'])) : ?>
                                                        <div class="text-danger"><?= $errors['entryClosingDate'] ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   

                                    <div class="mb-3 input-group">
                                        <label for="showTitle" class="form-label">Show Title</label>
                                        <input type="text" class="form-control <?= !empty($errors['showTitle']) ? 'border-danger' : 'border'; ?>" id="showTitle" name="showTitle" value="<?= set_value('showTitle') ?>">
                                        <?php if (!empty($errors['showTitle'])) : ?>
                                            <div class="text-danger"><?= $errors['showTitle'] ?></div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="mb-3 input-group">
                                        <label for="location" class="form-label">Location</label>
                                        <input type="text" class="form-control <?= !empty($errors['location']) ? 'border-danger' : 'border'; ?>" id="location" name="location" value="<?= set_value('location') ?>">
                                        <?php if (!empty($errors['location'])) : ?>
                                            <div class="text-danger"><?= $errors['location'] ?></div>
                                        <?php endif; ?>
                                    </div>

                                    <legend class="text-center h2 p-3">Tickets</legend>
                                    <div class="row mb-3">
                                        <!-- entryTicket -->
                                        <div class="col">
                                            <div class="row">
                                                <div class="col">
                                                    <label for="entryTicket" class="form-label">Entry Tickets Price</label>
                                                    <input type="text" name="entryTicketPrice" class="form-control <?= !empty($errors['entryTicketPrice']) ? 'border-danger' : 'border'; ?>" value="<?= set_value('entryTicketPrice') ?>">
                                                    <?php if (!empty($errors['entryTicketPrice'])) : ?>
                                                        <div class="text-danger"><?= $errors['entryTicketPrice'] ?></div>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="col">
                                                    <label for="entryTicketCount" class="form-label">Total Tickets</label>
                                                    <input type="number" class="form-control <?= !empty($errors['entryTicketCount']) ? 'border-danger' : 'border'; ?>" name="entryTicketCount" value="<?= set_value('entryTicketPrice') ?>">
                                                    <?php if (!empty($errors['entryTicketCount'])) : ?>
                                                        <div class="text-danger"><?= $errors['entryTicketCount'] ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="d-flex mt-3 mb-5">
                                            <div class="col">
                                                <input type="submit" value="Create Show" class="btn btn-primary" onclick="save_profile(event)">
                                            </div>
                                            <div class="col">
                                                <a href="<?= ROOT ?>/admin/shows" class="btn btn-outline-primary">Cancel</a>
                                            </div>
                                        </div>
                                </form>
                            </div>
                        </div>


                    <?php elseif ($action == 'edit') : ?>

                        <!--===============================
                        =           Edit Show Form         =
                        ================================-->

                        <div class="container-fluid">
                            <div class="container-xxl align-items-center card shadow">
                                <div class="row">
                                    <div class="col">
                                        <a href="<?= ROOT ?>/admin/shows" class="btn btn-outline-primary">Back</a>
                                    </div>
                                    <div class="col">Edit Show</div>
                                </div>
                                <form method="POST" id="create-show-form mb-3" class="row mx-4" enctype="multipart/form-data">

                                    <?php if (!empty($row)) : ?>

                                        <div class="row align-items-center mb-3 mt-1">
                                            <div class="col">
                                                <div class="row">
                                                    <div class="col mt-5 input-group">
                                                        <label for="sponsor" class="form-label">Show Sponsor</label>
                                                        <select class="form-select" aria-label="Default select example" id="sponsorList" name="sponsorName">
                                                            <option value="none">None</option>
                                                            <?php if (!empty($sponsors)) : ?>
                                                                <?php foreach ($sponsors as $spon) : ?>
                                                                    <option <?= set_select('id', $spon->id, $row->sponsorName) ?> value="<?= $spon->id ?>"><?= esc($spon->sponsor) ?></option>
                                                                <?php endforeach; ?>
                                                            <?php endif; ?>
                                                        </select>
                                                        <a href="../html/createNewSponsor.html" class="btn btn-primary p-2 mt-3">Add Sponsor</a>
                                                    </div>
                                                    <div class="col mt-5">
                                                        <label for="council" class="form-label">Cat Council</label>
                                                        <select class="form-select council_list" aria-label="Default select example" id="council_list" name="council">
                                                            <option value="none">None</option>
                                                            <?php if (!empty($councils)) : ?>
                                                                <?php foreach ($councils as $coun) : ?>
                                                                    <option <?= set_select('id', $coun->id, $row->council) ?> value="<?= $coun->id ?>"><?= esc($coun->council) ?></option>
                                                                <?php endforeach; ?>
                                                            <?php endif; ?>
                                                        </select>
                                                        <a href="../html/createCatCouncil.html" class="btn btn-primary mt-3 p-2">Add Council</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="row input-group">
                                                    <div class="col">
                                                        <label for="showDate" class="form-label">Show Date</label>
                                                        <input class="form-control <?= !empty($errors['showDate']) ? 'border-danger' : 'border'; ?>" type="date" id="showDate" name="showDate" value="<?= esc($row->showDate) ?>">
                                                        <?php if (!empty($errors['showDate'])) : ?>
                                                            <div class="text-danger"><?= $errors['showDate'] ?></div>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="col">
                                                        <label for="showTime" class="form-label">Time</label>
                                                        <div class="row">
                                                            <div class="col">
                                                                <input type="time" name="showTime" id="showTime" class="form-control <?= !empty($errors['showTime']) ? 'border-danger' : 'border'; ?>" value="<?= $row->showTime ?>">
                                                                <?php if (!empty($errors['showTime'])) : ?>
                                                                    <div class="text-danger"><?= $errors['showTime'] ?></div>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <label for="entryClosingDate" class="form-label">Show Entry Closing Date</label>
                                                        <input class="form-control <?= !empty($errors['entryClosingDate']) ? 'border-danger' : 'border'; ?>" type="date" id="entryClosingDate" name="entryClosingDate" value="<?= esc($row->entryClosingDate) ?>">
                                                        <?php if (!empty($errors['entryClosingDate'])) : ?>
                                                            <div class="text-danger"><?= $errors['entryClosingDate'] ?></div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <!-- SHOW IMAGE UPLOAD  -->
                                        <div class="my-4 row">
                                            <div class="col-sm-4">
                                                <img src="<?= get_image($row->image) ?>" width="400" height="200" class="js-image-upload-preview pl-3 rounded">
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="h5"><b>Show Image:</b></div>
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil velit, placeat fuga nam illo architecto eveniet autem iste deleniti quidem nesciunt iusto aperiam eaque sapiente quam consequatur ex vero? Optio obcaecati sit reiciendis adipisci omnis quisquam sunt quo natus. In, quae! Nesciunt quisquam corporis impedit laborum quae? Dolores, doloribus consequuntur?

                                                <br><br>
                                                <input onchange="upload_show_image(this.files[0])" class="js-image-upload-input" type="file" name="image">
                                                <div class="progress my-4">
                                                    <div class="progress-bar progress-bar-image" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                                                </div>
                                                <div class="js-image-upload-info d-none"></div>
                                                <button type='button' onclick="ajax_show_image_cancel()" class="js-image-upload-cancel-button btn btn-outline-warning btn-sm d-none">Cancel Upload</button>
                                            </div>
                                        </div>
                                        <!-- SHOW IMAGE UPLOAD  -->


                                        <div class="mb-3 input-group">
                                            <label for="showTitle" class="form-label p-2 col-2">Show Title</label>
                                            <input type="text" class="form-control <?= !empty($errors['showTitle']) ? 'border-danger' : 'border'; ?>" id="showTitle" name="showTitle" value="<?= esc($row->showTitle) ?>">
                                            <?php if (!empty($errors['showTitle'])) : ?>
                                                <div class="text-danger"><?= $errors['showTitle'] ?></div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="mb-3 input-group">
                                            <label for="location" class="form-label p-2 col-2">Location</label>
                                            <input type="text" class="form-control <?= !empty($errors['location']) ? 'border-danger' : 'border'; ?>" id="location" name="location" value="<?= esc($row->location) ?>">
                                            <?php if (!empty($errors['location'])) : ?>
                                                <div class="text-danger"><?= $errors['location'] ?></div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="mb-3 input-group">
                                            <label for="map" class="form-label p-2 col-2" >Google Map Link</label>
                                            <input type="url" class="form-control" id="map" name="map" value="<?= esc($row->map) ?>">
                                        </div>
                                        <div class="mb-3 input-group">
                                            <label for="additionalInformation" class="form-label p-2 col-2" value="<?= esc($row->additiionalInformation) ?>">Show Description</label>
                                            <textarea class="form-control" id="additionalInformation" rows="3" name="additionalInformation"></textarea>
                                        </div>

                                        <!-- Rules File Upload  -->
                                        <!-- <div class="my-4 row">
                                            <div class="col-sm-4">
                                                <img src="<?= get_image($row->image) ?>" width="400" height="200" class="">
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="h5"><b>Show Rules:</b></div>
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat laudantium ipsum aperiam. Adipisci doloremque minus repellendus magnam non dolores nobis corporis asperiores? Consequatur ipsam labore fugit, at facilis blanditiis architecto!

                                                <br><br>
                                                <input onchange="upload_show_image(this.files[0])" class="js-image-upload-input" type="file" name="">
                                                <div class="progress my-4">
                                                    <div class="progress-bar progress-bar-image" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                                                </div>
                                                <div class="js-image-upload-info d-none"></div>
                                                <button type='button' onclick="ajax_show_image_cancel()" class="js-image-upload-cancel-button btn btn-outline-warning btn-sm d-none">Cancel Upload</button>
                                            </div>
                                        </div> -->

                                        <div class="mb-3 input-group">
                                            <label for="covid" class="form-label p-2 col-2" >Covid Plan</label>
                                            <input type="file" class="form-control" name="covidPath">
                                            <div>Current file: <?=$row->covidPath ?? 'None' ?></div>
                                        </div>

                                        <div class="mb-3 input-group">
                                            <label for="rulesPath" class="form-label p-2 col-2" >Show Rules</label>
                                            <input type="file" class="form-control" name="rulesPath">
                                            <div>Current file: <?=$row->rulesPath ?? 'None' ?></div>
                                        </div>
                                        <!-- END RULES FILE UPLOAD -->

                                        <!-- COVID FILE UPLOAD -->
                                        <!-- <div class="my-4 row">
                                            <div class="col-sm-4">
                                                <img src="<?= get_image($row->image) ?>" width="400" height="200" class="">
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="h5"><b>Covid Plan:</b></div>
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum, eum labore fuga impedit commodi illum totam aperiam earum culpa voluptatum eligendi iste eveniet cupiditate itaque maxime vero optio amet facere reprehenderit ex, aliquid recusandae! Qui praesentium corporis animi nostrum eos.

                                                <br><br>
                                                <input onchange="upload_show_image(this.files[0])" class="js-image-upload-input" type="file" name="">
                                                <div class="progress my-4">
                                                    <div class="progress-bar progress-bar-image" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                                                </div>
                                                <div class="js-image-upload-info d-none"></div>
                                                <button type='button' onclick="ajax_show_image_cancel()" class="js-image-upload-cancel-button btn btn-outline-warning btn-sm d-none">Cancel Upload</button>
                                            </div>
                                        </div> -->
                                        <!-- END COVID FILE UPLOAD -->

                                        <legend class="h2 text-center">Judges</legend>
                                        <div class="row judges input-group">
                                            <div class="col">
                                                <div class="row">
                                                    <div class="form-label pb-4">Sections</div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-label pb-4">Long Hair Kitten</div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-label pb-4">Long Hair Entire</div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-label pb-4">Long Hair Desexed</div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-label pb-4">Short Hair Kitten</div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-label pb-4">Short Hair Entire</div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-label pb-4">Short Hair Desexed</div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-label pb-4">Companion</div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="row">
                                                    <div class="form-label text-center">Ring 1</div>
                                                </div>
                                                <div class="row">
                                                    <input type="text" class="form-control" name="R1LHK" value="<?= esc($row->R1LHK) ?>">
                                                </div>
                                                <div class="row">
                                                    <input type="text" class="form-control" name="R1LHE" value="<?= esc($row->R1LHE) ?>">
                                                </div>
                                                <div class="row">
                                                    <input type="text" class="form-control" name="R1LHD" value="<?= esc($row->R1LHD) ?>">
                                                </div>
                                                <div class="row">
                                                    <input type="text" class="form-control" name="R1SHK" value="<?= esc($row->R1SHK) ?>">
                                                </div>
                                                <div class="row">
                                                    <input type="text" class="form-control" name="R1SHE" value="<?= esc($row->R1SHE) ?>">
                                                </div>
                                                <div class="row">
                                                    <input type="text" class="form-control" name="R1SHD" value="<?= esc($row->R1SHD) ?>">
                                                </div>
                                                <div class="row">
                                                    <input type="text" class="form-control" name="R1Companion" value="<?= esc($row->R1Companion) ?>">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="row">
                                                    <div class="form-label text-center">Ring 2</div>
                                                </div>
                                                <div class="row">
                                                    <input type="text" class="form-control" name="R2LHK" value="<?= esc($row->R2LHK) ?>">
                                                </div>
                                                <div class="row">
                                                    <input type="text" class="form-control" name="R2LHE" value="<?= esc($row->R2LHE) ?>">
                                                </div>
                                                <div class="row">
                                                    <input type="text" class="form-control" name="R2LHD" value="<?= esc($row->R2LHD) ?>">
                                                </div>
                                                <div class="row">
                                                    <input type="text" class="form-control" name="R2SHK" value="<?= esc($row->R2SHK) ?>">
                                                </div>
                                                <div class="row">
                                                    <input type="text" class="form-control" name="R2SHE" value="<?= esc($row->R2SHE) ?>">
                                                </div>
                                                <div class="row">
                                                    <input type="text" class="form-control" name="R2SHD" value="<?= esc($row->R2SHD) ?>">
                                                </div>
                                                <div class="row">
                                                    <input type="text" class="form-control" name="R2Companion" value="<?= esc($row->R2Companion) ?>">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="row">
                                                    <div class="form-label text-center">Ring 3</div>
                                                </div>
                                                <div class="row">
                                                    <input type="text" class="form-control" name="R3LHK" value="<?= esc($row->R3LHK) ?>">
                                                </div>
                                                <div class="row">
                                                    <input type="text" class="form-control" name="R3LHE" value="<?= esc($row->R3LHE) ?>">
                                                </div>
                                                <div class="row">
                                                    <input type="text" class="form-control" name="R3LHD" value="<?= esc($row->R3LHD) ?>">
                                                </div>
                                                <div class="row">
                                                    <input type="text" class="form-control" name="R3SHK" value="<?= esc($row->R3SHK) ?>">
                                                </div>
                                                <div class="row">
                                                    <input type="text" class="form-control" name="R3SHE" value="<?= esc($row->R3SHE) ?>">
                                                </div>
                                                <div class="row">
                                                    <input type="text" class="form-control" name="R3SHD" value="<?= esc($row->R3SHD) ?>">
                                                </div>
                                                <div class="row">
                                                    <input type="text" class="form-control" name="R3Companion" value="<?= esc($row->R3Companion) ?>">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="row">
                                                    <div class="form-label text-center">Ring 4</div>
                                                </div>
                                                <div class="row">
                                                    <input type="text" class="form-control" name="R4LHK" value="<?= esc($row->R4LHK) ?>">
                                                </div>
                                                <div class="row">
                                                    <input type="text" class="form-control" name="R4LHE" value="<?= esc($row->R4LHE) ?>">
                                                </div>
                                                <div class="row">
                                                    <input type="text" class="form-control" name="R4LHD" value="<?= esc($row->R4LHD) ?>">
                                                </div>
                                                <div class="row">
                                                    <input type="text" class="form-control" name="R4SHK" value="<?= esc($row->R4SHK) ?>">
                                                </div>
                                                <div class="row">
                                                    <input type="text" class="form-control" name="R4SHE" value="<?= esc($row->R4SHE) ?>">
                                                </div>
                                                <div class="row">
                                                    <input type="text" class="form-control" name="R4SHD" value="<?= esc($row->R4SHD) ?>">
                                                </div>
                                                <div class="row">
                                                    <input type="text" class="form-control" name="R4Companion" value="<?= esc($row->R4Companion) ?>">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="row">
                                                    <div class="form-label text-center">Ring 5</div>
                                                </div>
                                                <div class="row">
                                                    <input type="text" class="form-control" name="R5LHK" value="<?= esc($row->R5LHK) ?>">
                                                </div>
                                                <div class="row">
                                                    <input type="text" class="form-control" name="R5LHE" value="<?= esc($row->R5LHE) ?>">
                                                </div>
                                                <div class="row">
                                                    <input type="text" class="form-control" name="R5LHD" value="<?= esc($row->R5LHD) ?>">
                                                </div>
                                                <div class="row">
                                                    <input type="text" class="form-control" name="R5SHK" value="<?= esc($row->R5SHK) ?>">
                                                </div>
                                                <div class="row">
                                                    <input type="text" class="form-control" name="R5SHE" value="<?= esc($row->R5SHE) ?>">
                                                </div>
                                                <div class="row">
                                                    <input type="text" class="form-control" name="R5SHD" value="<?= esc($row->R5SHD) ?>">
                                                </div>
                                                <div class="row">
                                                    <input type="text" class="form-control" name="R5Companion" value="<?= esc($row->R5Companion) ?>">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="row">
                                                    <div class="form-label text-center">Ring 6</div>
                                                </div>
                                                <div class="row">
                                                    <input type="text" class="form-control" name="R6LHK" value="<?= esc($row->R6LHK) ?>">
                                                </div>
                                                <div class="row">
                                                    <input type="text" class="form-control" name="R6LHE" value="<?= esc($row->R6LHE) ?>">
                                                </div>
                                                <div class="row">
                                                    <input type="text" class="form-control" name="R6LHD" value="<?= esc($row->R6LHD) ?>">
                                                </div>
                                                <div class="row">
                                                    <input type="text" class="form-control" name="R6SHK" value="<?= esc($row->R6SHK) ?>">
                                                </div>
                                                <div class="row">
                                                    <input type="text" class="form-control" name="R6SHE" value="<?= esc($row->R6SHE) ?>">
                                                </div>
                                                <div class="row">
                                                    <input type="text" class="form-control" name="R6SHD" value="<?= esc($row->R6SHD) ?>">
                                                </div>
                                                <div class="row">
                                                    <input type="text" class="form-control" name="R6Companion" value="<?= esc($row->R6Companion) ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <legend class="h2 text-center pt-3">Managers Details</legend>
                                        <div class="row  input-group">
                                            <div class="col ">
                                                <label for="managersName" class="form-label">Managers Name</label>
                                                <input type="text" class="form-control" id="managersName" name="managersName" value="<?= esc($row->managersName) ?>">
                                            </div>
                                            <div class="col">
                                                <label for="managersPhone" class="form-label">Managers Phone</label>
                                                <input type="text" class="form-control" id="managersPhone" name="managersPhone" value="<?= esc($row->managersPhone) ?>">
                                            </div>
                                            <div class="col">
                                                <label for="managersEmail" class="form-label">Managers Email</label>
                                                <input type="email" name="managersEmail" id="managersEmail" class="form-control" value="<?= esc($row->managersEmail) ?>">
                                            </div>
                                        </div>
                                        <legend class="text-center h2 p-3">Tickets</legend>
                                        <div class="row mb-3">
                                            <!-- entryTicket -->
                                            <div class="col input-group">
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="entryTicket" class="form-label">Entry Tickets Price</label>
                                                        <input type="text" name="entryTicketPrice" class="form-control <?= !empty($errors['entryTicketPrice']) ? 'border-danger' : 'border'; ?>" value="<?= esc($row->entryTicketPrice) ?>">
                                                        <?php if (!empty($errors['entryTicketPrice'])) : ?>
                                                            <div class="text-danger"><?= $errors['entryTicketPrice'] ?></div>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="col">
                                                        <label for="entryTicketCount" class="form-label">Total Tickets</label>
                                                        <input type="number" class="form-control <?= !empty($errors['entryTicketCount']) ? 'border-danger' : 'border'; ?>" name="entryTicketCount" value="<?= esc($row->entryTicketCount) ?>">
                                                        <?php if (!empty($errors['entryTicketCount'])) : ?>
                                                            <div class="text-danger"><?= $errors['entryTicketCount'] ?></div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <!-- secondEntryTicket -->
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="secondEntryTicketPrice" class="form-label">Additional Show Entry</label>
                                                        <input type="text" name="secondEntryTicketPrice" class="form-control" value="<?= esc($row->secondEntryTicketPrice) ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- small cage -->
                                            <div class="col input-group">
                                                <div class="row">
                                                    <div class="col m-2">
                                                        <label for="smallCagePrice" class="form-label">Small Cage Price</label>
                                                        <input type="text" name="smallCagePrice" class="form-control <?= !empty($errors['smallCagePrice']) ? 'border-danger' : 'border'; ?>" value="<?= esc($row->smallCagePrice) ?>">
                                                        <?php if (!empty($errors['smallCagePrice'])) : ?>
                                                            <div class="text-danger"><?= $errors['smallCagePrice'] ?></div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col m-2">
                                                        <label for="largeCage" class="form-label">Large Cage Price</label>
                                                        <input type="text" name="largeCagePrice" class="form-control <?= !empty($errors['largeCagePrice']) ? 'border-danger' : 'border'; ?>" value="<?= esc($row->largeCagePrice) ?>">
                                                        <?php if (!empty($errors['largeCagePrice'])) : ?>
                                                            <div class="text-danger"><?= $errors['largeCagePrice'] ?></div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- catalogue raffle -->
                                            <div class="col input-group">
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="cataloguePrice" class="form-label">Catalogue Price</label>
                                                        <input type="text" class="form-control" name="cataloguePrice" value="<?= esc($row->cataloguePrice) ?>">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="rafflePrice" class="form-label">Raffle Ticket Price</label>
                                                        <input type="text" class="form-control" name="rafflePrice" value="<?= esc($row->rafflePrice) ?>">
                                                    </div>
                                                    <div class="col">
                                                        <label for="raffleTicketCount" class="form-label">Total Tickets</label>
                                                        <input type="number" class="form-control" max="10000" name="raffleTicketCount" value="<?= esc($row->raffleTicketCount) ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex mt-3 mb-5">
                                            <div class="col">
                                                <input type="submit" value="Update Show" class="btn btn-primary">
                                            </div>
                                            <div class="col">
                                                <a href="<?= ROOT ?>/admin/shows" class="btn btn-outline-primary">Cancel</a>
                                            </div>
                                        </div>

                                    <?php else : ?>
                                        <div class="pb-4">Show was not found!</div>
                                    <?php endif; ?>
                                </form>
                            </div>
                        </div>
                        <!--===============================
                        =           Show Results         =
                        ================================-->
                    <?php elseif($action == 'results') : ?>
                        <div class="h3 text-center">Show <?=$results->id?> Results</div>
                        <form method="POST">
                        <div class="row">
                            <div class="col p-2">
                                Ring 1
                            </div>
                            <div class="col p-2">
                                Long Hair Kitten
                            </div>
                            <div class="col p-2">
                                <select name="R1LHK">
                                    <option value="">Select...</option>
                                    <?php foreach($cats as $cat) :?>
                                    <option <?= set_select('id', $cat->id, $results->R1LHK) ?> value="<?=$cat->id?>"><?=$cat->name?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="col p-2">
                                Long Hair Entire
                            </div>
                            <div class="col p-2">
                                <select name="R1LHE">
                                    <option value="">Select...</option>
                                    <?php foreach($cats as $cat) :?>
                                    <option <?= set_select('id', $cat->id, $results->R1LHE) ?> value="<?=$cat->id?>"><?=$cat->name?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="col p-2">
                                Long Hair Desexed
                            </div>
                            <div class="col p-2">
                                <select name="R1LHD">
                                    <option value="">Select...</option>
                                    <?php foreach($cats as $cat) :?>
                                    <option <?= set_select('id', $cat->id, $results->R1LHD) ?> value="<?=$cat->id?>"><?=$cat->name?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col p-2">
                                
                            </div>
                            <div class="col p-2">
                                Short Hair Kitten
                            </div>
                            <div class="col p-2">
                                <select name="R1SHK">
                                    <option value="">Select...</option>
                                    <?php foreach($cats as $cat) :?>
                                    <option <?= set_select('id', $cat->id, $results->R1SHK) ?> value="<?=$cat->id?>"><?=$cat->name?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="col p-2">
                                Short Hair Entire
                            </div>
                            <div class="col p-2">
                                <select name="R1SHE">
                                    <option value="">Select...</option>
                                    <?php foreach($cats as $cat) :?>
                                    <option <?= set_select('id', $cat->id, $results->R1SHE) ?> value="<?=$cat->id?>"><?=$cat->name?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="col p-2">
                                Short Hair Desexed
                            </div>
                            <div class="col p-2">
                                <select name="R1SHD">
                                    <option value="">Select...</option>
                                    <?php foreach($cats as $cat) :?>
                                    <option <?= set_select('id', $cat->id, $results->R1SHD) ?> value="<?=$cat->id?>"><?=$cat->name?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col p-2">
                                
                            </div>
                            <div class="col p-2">
                                Companion
                            </div>
                            <div class="col p-2">
                                <select name="R1Companion">
                                    <option value="">Select...</option>
                                    <?php foreach($cats as $cat) :?>
                                    <option <?= set_select('id', $cat->id, $results->R1Companion) ?> value="<?=$cat->id?>"><?=$cat->name?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="col p-2">
                                
                            </div>
                            <div class="col p-2">
                                
                            </div>
                            <div class="col p-2">
                                
                            </div>
                            <div class="col p-2">
                                
                            </div>                            
                        </div>
                        <div class="row border-top">
                            <div class="col p-2">
                                Ring 2
                            </div>
                            <div class="col p-2">
                                Long Hair Kitten
                            </div>
                            <div class="col p-2">
                                <select name="R2LHK">
                                    <option value="">Select...</option>
                                    <?php foreach($cats as $cat) :?>
                                    <option <?= set_select('id', $cat->id, $results->R2LHK) ?> value="<?=$cat->id?>"><?=$cat->name?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="col p-2">
                                Long Hair Entire
                            </div>
                            <div class="col p-2">
                                <select name="R2LHE">
                                    <option value="">Select...</option>
                                    <?php foreach($cats as $cat) :?>
                                    <option <?= set_select('id', $cat->id, $results->R2LHE) ?> value="<?=$cat->id?>"><?=$cat->name?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="col p-2">
                                Long Hair Desexed
                            </div>
                            <div class="col p-2">
                                <select name="R2LHD">
                                    <option value="">Select...</option>
                                    <?php foreach($cats as $cat) :?>
                                    <option <?= set_select('id', $cat->id, $results->R2LHD) ?> value="<?=$cat->id?>"><?=$cat->name?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col p-2">
                                
                            </div>
                            <div class="col p-2">
                                Short Hair Kitten
                            </div>
                            <div class="col p-2">
                                <select name="R2SHK">
                                    <option value="">Select...</option>
                                    <?php foreach($cats as $cat) :?>
                                    <option <?= set_select('id', $cat->id, $results->R2SHK) ?> value="<?=$cat->id?>"><?=$cat->name?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="col p-2">
                                Short Hair Entire
                            </div>
                            <div class="col p-2">
                                <select name="R2SHE">
                                    <option value="">Select...</option>
                                    <?php foreach($cats as $cat) :?>
                                    <option <?= set_select('id', $cat->id, $results->R2SHE) ?> value="<?=$cat->id?>"><?=$cat->name?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="col p-2">
                                Short Hair Desexed
                            </div>
                            <div class="col p-2">
                                <select name="R2SHD">
                                    <option value="">Select...</option>
                                    <?php foreach($cats as $cat) :?>
                                    <option <?= set_select('id', $cat->id, $results->R2SHD) ?> value="<?=$cat->id?>"><?=$cat->name?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col p-2">
                                
                            </div>
                            <div class="col p-2">
                                Companion
                            </div>
                            <div class="col p-2">
                                <select name="R2Companion">
                                    <option value="">Select...</option>
                                    <?php foreach($cats as $cat) :?>
                                    <option <?= set_select('id', $cat->id, $results->R2Companion) ?> value="<?=$cat->id?>"><?=$cat->name?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="col p-2">
                                
                            </div>
                            <div class="col p-2">
                                
                            </div>
                            <div class="col p-2">
                                
                            </div>
                            <div class="col p-2">
                                
                            </div>                            
                        </div>
                        <div class="row border-top">
                            <div class="col p-2">
                                Ring 3
                            </div>
                            <div class="col p-2">
                                Long Hair Kitten
                            </div>
                            <div class="col p-2">
                                <select name="R3LHK">
                                    <option value="">Select...</option>
                                    <?php foreach($cats as $cat) :?>
                                    <option <?= set_select('id', $cat->id, $results->R3LHK) ?> value="<?=$cat->id?>"><?=$cat->name?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="col p-2">
                                Long Hair Entire
                            </div>
                            <div class="col p-2">
                                <select name="R3LHE">
                                    <option value="">Select...</option>
                                    <?php foreach($cats as $cat) :?>
                                    <option <?= set_select('id', $cat->id, $results->R3LHE) ?> value="<?=$cat->id?>"><?=$cat->name?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="col p-2">
                                Long Hair Desexed
                            </div>
                            <div class="col p-2">
                                <select name="R3LHD">
                                    <option value="">Select...</option>
                                    <?php foreach($cats as $cat) :?>
                                    <option <?= set_select('id', $cat->id, $results->R3LHD) ?> value="<?=$cat->id?>"><?=$cat->name?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col p-2">
                                
                            </div>
                            <div class="col p-2">
                                Short Hair Kitten
                            </div>
                            <div class="col p-2">
                                <select name="R3SHK">
                                    <option value="">Select...</option>
                                    <?php foreach($cats as $cat) :?>
                                    <option <?= set_select('id', $cat->id, $results->R3SHK) ?> value="<?=$cat->id?>"><?=$cat->name?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="col p-2">
                                Short Hair Entire
                            </div>
                            <div class="col p-2">
                                <select name="R3SHE">
                                    <option value="">Select...</option>
                                    <?php foreach($cats as $cat) :?>
                                    <option <?= set_select('id', $cat->id, $results->R3SHE) ?> value="<?=$cat->id?>"><?=$cat->name?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="col p-2">
                                Short Hair Desexed
                            </div>
                            <div class="col p-2">
                                <select name="R3SHD">
                                    <option value="">Select...</option>
                                    <?php foreach($cats as $cat) :?>
                                    <option <?= set_select('id', $cat->id, $results->R3SHD) ?> value="<?=$cat->id?>"><?=$cat->name?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col p-2">
                                
                            </div>
                            <div class="col p-2">
                                Companion
                            </div>
                            <div class="col p-2">
                                <select name="R3Companion">
                                    <option value="">Select...</option>
                                    <?php foreach($cats as $cat) :?>
                                    <option <?= set_select('id', $cat->id, $results->R3Companion) ?> value="<?=$cat->id?>"><?=$cat->name?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="col p-2">
                                
                            </div>
                            <div class="col p-2">
                                
                            </div>
                            <div class="col p-2">
                                
                            </div>
                            <div class="col p-2">
                                
                            </div>                            
                        </div>
                        
                        <div class="row border-top">
                            <div class="col p-2">
                                Ring 4
                            </div>
                            <div class="col p-2">
                                Long Hair Kitten
                            </div>
                            <div class="col p-2">
                                <select name="R4LHK">
                                    <option value="">Select...</option>
                                    <?php foreach($cats as $cat) :?>
                                    <option <?= set_select('id', $cat->id, $results->R4LHK) ?> value="<?=$cat->id?>"><?=$cat->name?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="col p-2">
                                Long Hair Entire
                            </div>
                            <div class="col p-2">
                                <select name="R4LHE">
                                    <option value="">Select...</option>
                                    <?php foreach($cats as $cat) :?>
                                    <option <?= set_select('id', $cat->id, $results->R4LHE) ?> value="<?=$cat->id?>"><?=$cat->name?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="col p-2">
                                Long Hair Desexed
                            </div>
                            <div class="col p-2">
                                <select name="R4LHD">
                                    <option value="">Select...</option>
                                    <?php foreach($cats as $cat) :?>
                                    <option <?= set_select('id', $cat->id, $results->R4LHD) ?> value="<?=$cat->id?>"><?=$cat->name?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col p-2">
                                
                            </div>
                            <div class="col p-2">
                                Short Hair Kitten
                            </div>
                            <div class="col p-2">
                                <select name="R4SHK">
                                    <option value="">Select...</option>
                                    <?php foreach($cats as $cat) :?>
                                    <option <?= set_select('id', $cat->id, $results->R4SHK) ?> value="<?=$cat->id?>"><?=$cat->name?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="col p-2">
                                Short Hair Entire
                            </div>
                            <div class="col p-2">
                                <select name="R4SHE">
                                    <option value="">Select...</option>
                                    <?php foreach($cats as $cat) :?>
                                    <option <?= set_select('id', $cat->id, $results->R4SHE) ?> value="<?=$cat->id?>"><?=$cat->name?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="col p-2">
                                Short Hair Desexed
                            </div>
                            <div class="col p-2">
                                <select name="R4SHD">
                                    <option value="">Select...</option>
                                    <?php foreach($cats as $cat) :?>
                                    <option <?= set_select('id', $cat->id, $results->R4SHD) ?> value="<?=$cat->id?>"><?=$cat->name?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col p-2">
                                
                            </div>
                            <div class="col p-2">
                                Companion
                            </div>
                            <div class="col p-2">
                                <select name="R4Companion">
                                    <option value="">Select...</option>
                                    <?php foreach($cats as $cat) :?>
                                    <option <?= set_select('id', $cat->id, $results->R4Companion) ?> value="<?=$cat->id?>"><?=$cat->name?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="col p-2">
                                
                            </div>
                            <div class="col p-2">
                                
                            </div>
                            <div class="col p-2">
                                
                            </div>
                            <div class="col p-2">
                                
                            </div>                            
                        </div>
                        <div class="row border-top">
                            <div class="col p-2">
                                Ring 5
                            </div>
                            <div class="col p-2">
                                Long Hair Kitten
                            </div>
                            <div class="col p-2">
                                <select name="R5LHK">
                                    <option value="">Select...</option>
                                    <?php foreach($cats as $cat) :?>
                                    <option <?= set_select('id', $cat->id, $results->R5LHK) ?> value="<?=$cat->id?>"><?=$cat->name?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="col p-2">
                                Long Hair Entire
                            </div>
                            <div class="col p-2">
                                <select name="R5LHE">
                                    <option value="">Select...</option>
                                    <?php foreach($cats as $cat) :?>
                                    <option <?= set_select('id', $cat->id, $results->R5LHE) ?> value="<?=$cat->id?>"><?=$cat->name?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="col p-2">
                                Long Hair Desexed
                            </div>
                            <div class="col p-2">
                                <select name="R5LHD">
                                    <option value="">Select...</option>
                                    <?php foreach($cats as $cat) :?>
                                    <option <?= set_select('id', $cat->id, $results->R5LHD) ?> value="<?=$cat->id?>"><?=$cat->name?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col p-2">
                                
                            </div>
                            <div class="col p-2">
                                Short Hair Kitten
                            </div>
                            <div class="col p-2">
                                <select name="R5SHK">
                                    <option value="">Select...</option>
                                    <?php foreach($cats as $cat) :?>
                                    <option <?= set_select('id', $cat->id, $results->R5SHK) ?> value="<?=$cat->id?>"><?=$cat->name?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="col p-2">
                                Short Hair Entire
                            </div>
                            <div class="col p-2">
                                <select name="R5SHE">
                                    <option value="">Select...</option>
                                    <?php foreach($cats as $cat) :?>
                                    <option <?= set_select('id', $cat->id, $results->R5SHE) ?> value="<?=$cat->id?>"><?=$cat->name?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="col p-2">
                                Short Hair Desexed
                            </div>
                            <div class="col p-2">
                                <select name="R5SHD">
                                    <option value="">Select...</option>
                                    <?php foreach($cats as $cat) :?>
                                    <option <?= set_select('id', $cat->id, $results->R5SHD) ?> value="<?=$cat->id?>"><?=$cat->name?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col p-2">
                                
                            </div>
                            <div class="col p-2">
                                Companion
                            </div>
                            <div class="col p-2">
                                <select name="R5Companion">
                                    <option value="">Select...</option>
                                    <?php foreach($cats as $cat) :?>
                                    <option <?= set_select('id', $cat->id, $results->R5Companion) ?> value="<?=$cat->id?>"><?=$cat->name?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="col p-2">
                                
                            </div>
                            <div class="col p-2">
                                
                            </div>
                            <div class="col p-2">
                                
                            </div>
                            <div class="col p-2">
                                
                            </div>                            
                        </div>

                        <button type="submit" class="btn btn-primary">Save Results</button>

                        </form>
                    <?php else : ?>

                        <!--===============================
                        =         Show List Area          =
                        ================================-->

                        <!-- DataTales -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">
                                    My Shows
                                    <a href="<?= ROOT ?>/admin/shows/add">
                                        <button class='btn btn-primary ml-3 p-2'><i class="fa-solid fa-calendar-days mr-2"></i>New Show</button>
                                </h6>
                                </a>
                            </div>

                            <div class="card-body">
                                <div>
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Title</th>
                                                <th>Date</th>
                                                <th>location</th>
                                                <th>Sponsor</th>
                                                <th>Council</th>
                                                <th>Created On</th>
                                                <th>Created By</th>
                                                <th>Price</th>
                                                <th>Ticket Amount</th>
                                                <th>Action</th>
                                                <th>Results</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Title</th>
                                                <th>Date</th>
                                                <th>location</th>
                                                <th>Sponsor</th>
                                                <th>Council</th>
                                                <th>Created On</th>
                                                <th>Created By</th>
                                                <th>Price</th>
                                                <th>Ticket Amount</th>
                                                <th>Action</th>
                                                <th>Results</th>
                                            </tr>
                                        </tfoot>

                                        <?php if (!empty($rows)) : ?>
                                            <tbody class="dataset">

                                                <?php foreach ($rows as $row) : ?>
                                                    <tr>
                                                        <td><?= $row->id ?></td>
                                                        <td><?= esc($row->showTitle) ?></td>
                                                        <td><?= ($row->showDate) ?></td>
                                                        <td><?= esc($row->location) ?></td>
                                                        <td><?= esc($row->sponsor_row->sponsor ?? 'Unknown') ?></td>
                                                        <td><?= esc($row->council_row->council ?? 'Unknown') ?></td>
                                                        <td><?= esc($row->created) ?></td>
                                                        <td><?= esc($row->user_row->name ?? 'Unknown') ?></td>
                                                        <td><?= esc($row->entryTicketPrice) ?></td>
                                                        <td><?= esc($row->entryTicketCount) ?></td>
                                                        <td>
                                                            <a href="<?= ROOT ?>/admin/shows/edit/<?= $row->id ?>">
                                                                <i class="fa-solid fa-pen-to-square text-success"></i>
                                                            </a>
                                                            <a href="<?= ROOT ?>/admin/shows/delete/<?= $row->id ?>">
                                                                <i class="fa-solid fa-trash-can text-danger"></i>
                                                            </a>
                                                        </td>
                                                        <td >
                                                        <a href="<?= ROOT ?>/admin/shows/results/<?= $row->id ?>">
                                                                <i class="fa-solid fa-pen-to-square text-success ml-3"></i>
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

<script>
    // function show_loader() {
    //     let data = {};
    //     data.data_type = 'read';
    //     send_data(data);
    //     let contentDiv = document.querySelector('dataset');
    //     let content = contentDiv.innerHTML;
    //     content = '<img src="<?= ROOT ?>/assets/img/memes-loading.gif" alt="" class="loader">';
    // }

    // function handle_result(result) {
    //     let contentDiv = document.querySelector('dataset');
    //     let content = contentDiv.innerHTML;
    // }

    function load_image(file) {
        document.querySelector('.js-filename').innerHTML = 'Selected File:' + file.name;

        let mylink = URL.createObjectURL(file);
        document.querySelector('.js-image-preview').src = mylink;
    }

    function save_show(e) {

        let form = e.currentTarget.form;
        let inputs = form.querySelectorAll('input');
        let obj = {};
        let image_added = false;
        for (let i = 0; i < inputs.length; i++) {
            let key = inputs[i].name;

            if (key == 'image') {
                if (typeof inputs[i].files[0] == 'object') {
                    obj[key] = inputs[i].files[0];
                    image_added = true;
                }
            } else {
                obj[key] = inputs[i].value;
            }

        }
        //   validate image  
        if (image_added) {
            // let image = obj.image;
            let allowed = ['jpg', 'jpeg', 'png'];
            if (typeof obj.image == 'object') {
                let ext = obj.image.name.split('.').pop();
            }
            let ext = obj.image.name.split('.').pop();
            if (!allowed.includes(ext.toLowerCase())) {
                alert('Only JPEG, JPG or PNG allowed');
                return;
            }
        }


        send_data(obj);
    }

    function send_data(obj) {

        let myform = new FormData();
        for (key in obj) {
            myform.append(key, obj[key]);
        }
        let ajax = new XMLHttpRequest();
        ajax.addEventListener('readystatechange', function() {
            if (ajax.readyState == 4) {
                if (ajax.status == 200) {
                    //window.location.reload();
                    handle_result(ajax.responseText);
                } else {
                    alert('Error occurred');
                }
            }
        })
        ajax.upload.addEventListener('progress', function(e) {
            let percent = Math.round((e.loaded / e.total) * 100);
            prog.children[0].style.width = percent + '%';
            prog.children[0].innerHTML = 'Saving.. ' + percent + '%';
        });

        ajax.open('POST', '', true);
        ajax.send(myform);

    }

    function handle_result(result) {
        let obj = JSON.parse(result);
        if (typeof obj == 'object') {
            //object was created

            if (typeof obj.errors == 'object') {
                //we have errors
                display_errors(obj.errors);
                alert("Please correct the errors on the page");
            } else {
                //save complete
                //alert("Profile saved successfully!");
                window.location.reload();

            }
        }
    }

    function display_errors(errors) {

        for (key in errors) {

            console.log(errors[key]);
            document.querySelector(".js-error-" + key).innerHTML = errors[key];
        }
    }


    let show_image_uploading = false;

    let ajax_show_image = null;

    function upload_show_image(file) {

        if (show_image_uploading) {

            alert("please wait while the other image uploads");
            return;
        }
        // validate image ext
        let allowed_types = ['jpg', 'jpeg', 'png'];
        let ext = file.name.split(".").pop();
        ext = ext.toLowerCase();
        if (!allowed_types.includes(ext)) {
            alert('Only files of this type:' + allowed_types.toString(','));
            return;
        }

        // display an image preview
        let img = document.querySelector(".js-image-upload-preview");
        let link = URL.createObjectURL(file);
        img.src = link;

        // begin upload
        show_image_uploading = true;

        document.querySelector(".js-image-upload-info").innerHTML = file.name;
        document.querySelector(".js-image-upload-info").classList.remove('d-none');
        document.querySelector(".js-image-upload-input").classList.add('d-none');
        document.querySelector(".js-image-upload-cancel-button").classList.remove('d-none');

        var myform = new FormData();
        ajax_show_image = new XMLHttpRequest();

        ajax_show_image.addEventListener('readystatechange', function() {

            if (ajax_show_image.readyState == 4) {

                if (ajax_show_image.status == 200) {
                    //everything went well
                    //alert("upload complete");
                    //alert(ajax_show_image.responseText);
                    show_image_uploading = false;
                }

                show_image_uploading = false;
                document.querySelector(".js-image-upload-info").classList.add('d-none');
                document.querySelector(".js-image-upload-input").classList.remove('d-none');
                document.querySelector(".js-image-upload-cancel-button").classList.add('d-none');

            }
        });

        ajax_show_image.addEventListener('error', function() {
            alert('An error occurred!');
        });

        ajax_show_image.addEventListener('abort', function() {
            alert('Upload Aborted');
        });

        ajax_show_image.upload.addEventListener('progress', function(e) {

            var percent = Math.round((e.loaded / e.total) * 100);
            document.querySelector(".progress-bar-image").style.width = percent + "%";
            document.querySelector(".progress-bar-image").innerHTML = percent + "%";
        });

        myform.append('data_type', 'upload_show_image');

        myform.append('image', file);

        ajax_show_image.open('post', '', true);
        ajax_show_image.send(myform);

    }

    function ajax_show_image_cancel() {
        ajax_show_image.abort();
    }
</script>