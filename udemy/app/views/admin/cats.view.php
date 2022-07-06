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

                    <!-- ADD SECTION -->
                    <?php if ($action == 'add') : ?>

                        <div class="container align-items-center">
                            <form method="POST" class="row mx-4" id="create-cat-form" enctype="multipart/form-data">

                                <?php csrf() ?>

                                <legend class="h1 text-center mt-4">Add New Cat</legend>
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="name" class="form-label">Cat Name</label>
                                        <input class="form-control" type="text" name="name">
                                    </div>
                                    <div class="col">
                                        <div class="top row d-flex justify-content-center">
                                            <img src="<?= ROOT ?>/assets/img/no_image.png" alt="profile" class="js-image-preview rounded shadow-sm" height="130" width="130">
                                        </div>
                                        <div class="js-filename p-3 text-center">Selected File: none</div>
                                        <div class="bottom row">
                                            <label class="btn btn-outline-primary btn-sm shadow-sm" title="Upload Show Picture">
                                                <i class="fa-solid fa-upload"></i>
                                                <input onchange="load_image(this.files[0])" type="file" name="image" style='display: none;' class="js-profile-image-input">
                                            </label>
                                            <span class="p-4">Upload Show Picture</span>
                                            <?php if (!empty($errors['image'])) : ?>
                                                <div class="text-danger js-error-image"><?= $errors['image'] ?></div>
                                            <?php endif; ?>
                                            <div class="text-danger js-error-image"></div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label for="type" class="form-label">Cat Type</label>
                                        <select name="type" id="type" class="form-select">
                                            <option value="value">Select...</option>
                                            <?php foreach ($types as $type) : ?>
                                                <option value="<?= $type->id ?>"><?= $type->type ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="level" class="form-label">Level</label>
                                        <select name="level" class="form-select">
                                            <option value="value">Select...</option>
                                            <?php foreach ($levels as $level) : ?>
                                                <option value="<?= $level->id ?>"><?= $level->level ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row m-3">
                                    <label for="bio">Cat Bio</label>
                                    <textarea name="bio" cols="50" rows="8"></textarea>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="birthDate" class="form-label">Birth Date</label>
                                        <input class="form-control" type="date" name="birthDate">
                                    </div>
                                    <div class="col">
                                        <label for="breed" class="form-label">Breed</label>
                                        <select name="breed" id="breed_list" class="form-select">

                                            <option value="">Select...</option>
                                            <?php foreach ($breeds as $breed) : ?>
                                                <option value="<?= $breed->breed ?>"><?= $breed->breed ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label for="colour" class="form-label">Colour</label>
                                        <select name="colour" id="colour_list" class="form-select">
                                            <option value="">Select...</option>
                                            <?php foreach ($colours as $colour) : ?>
                                                <option value="<?= $colour->colour ?>"><?= $colour->colour ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="sex" class="form-label">Sex</label>
                                        <select name="sex" id="sex" class="form-select">
                                            <option value="value">Select...</option>
                                            <?php foreach ($sexes as $sex) : ?>
                                                <option value="<?= $sex->id ?>"><?= $sex->sex ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="registration" class="form-label">Registration Number</label>
                                        <input class="form-control" type="text" name="registration">
                                    </div>
                                    <div class="col">
                                        <label for="breeder" class="form-label">Breeder Name</label>
                                        <input class="form-control" type="text" name="breeder">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="sire" class="form-label">Sire</label>
                                        <input class="form-control" type="text" name="sire">
                                    </div>
                                    <div class="col">
                                        <label for="dam" class="form-label">Dam</label>
                                        <input class="form-control" type="text" name="dam">
                                    </div>
                                </div>
                                <legend class="h2">Required Documents</legend>
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="pedigree" class="form-label">Pedigree Papers</label>
                                        <input class="form-control" type="file" name="pedigreePath">
                                    </div>
                                    <div class="col">
                                        <label for="vaccination" class="form-label">Vaccination Certificate</label>
                                        <input class="form-control" type="file" name="vaccinationPath">
                                    </div>
                                </div>
                                <div class="row">
                                    <input type="submit" value="Create Cat" class="m-5 btn btn-primary col">
                                    <a href="<?= ROOT ?>/cats/list" class="btn btn-outline-primary m-5 col">Cancel</a>
                                </div>
                            </form>
                        </div>
                        <!-- END ADD SECTION -->

                        <!-- EDIT SECTION -->
                    <?php elseif ($action == 'edit') : ?>

                        <div class="container align-items-center">
                            <form method="POST" class="row mx-4" id="create-cat-form" enctype="multipart/form-data">

                                <?php csrf() ?>


                                <legend class="h1 text-center mt-4">Edit Cat</legend>
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="name" class="form-label">Cat Name</label>
                                        <input class="form-control" type="text" name="name" value="<?= set_value('name', $row->name) ?>">
                                    </div>
                                    <div class="col">
                                        <div class="top row d-flex justify-content-center">
                                            <img src="<?= get_image($row->image) ?>" alt="profile" class="js-image-preview rounded shadow-sm" height="130" width="130">
                                        </div>
                                        <div class="js-filename p-3 text-center">Selected File: none</div>
                                        <div class="bottom row">
                                            <label class="btn btn-outline-primary btn-sm shadow-sm" title="Upload Show Picture">
                                                <i class="fa-solid fa-upload"></i>
                                                <input onchange="load_image(this.files[0])" type="file" name="image" style='display: none;' class="js-profile-image-input">
                                            </label>
                                            <span class="p-4">Upload Show Picture</span>
                                            <?php if (!empty($errors['image'])) : ?>
                                                <div class="text-danger js-error-image"><?= $errors['image'] ?></div>
                                            <?php endif; ?>
                                            <div class="text-danger js-error-image"></div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label for="type" class="form-label">Cat Type</label>
                                        <select name="type" id="type" class="form-select">
                                            <option value="value">Select...</option>
                                            <?php foreach ($types as $type) : ?>
                                                <option value="<?= $type->id ?>"><?= $type->type ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="level" class="form-label">Level</label>
                                        <select name="level" class="form-select">
                                            <option value="value">Select...</option>
                                            <?php foreach ($levels as $level) : ?>
                                                <option value="<?= $level->id ?>"><?= $level->level ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row m-3">
                                    <label for="bio">Cat Bio</label>
                                    <textarea name="bio" cols="50" rows="8"></textarea>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="birthDate" class="form-label">Birth Date</label>
                                        <input class="form-control" type="date" name="birthDate" value="<?= set_value('birthDate', $row->birthDate) ?>">
                                    </div>
                                    <div class="col">
                                        <label for="breed" class="form-label">Breed</label>
                                        <select name="breed" id="breed_list" class="form-select">

                                            <option value="">Select...</option>
                                            <?php foreach ($breeds as $breed) : ?>
                                                <option <?= set_select('breed', $breed->breed, $row->breed) ?> value="<?= $breed->breed ?>"><?= $breed->breed ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="colour" class="form-label">Colour</label>
                                        <select name="colour" id="colour_list" class="form-select">
                                            <option value="">Select...</option>
                                            <?php foreach ($colours as $colour) : ?>
                                                <option <?= set_select('colour', $colour->colour, $row->colour) ?> value="<?= $colour->colour ?>"><?= $colour->colour ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="col">
                                        <label for="sex" class="form-label">Sex</label>
                                        <select name="sex" id="sex" class="form-select">
                                            <option <?= set_select('sex', $row->sex) ?> value="value">Select...</option>
                                            <?php foreach ($sexes as $sex) : ?>
                                                <option <?= set_select('id', $sex->id, $row->sex) ?> value="<?= $sex->id ?>"><?= $sex->sex ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="registration" class="form-label">Registration Number</label>
                                        <input class="form-control" type="text" name="registration" value="<?= set_value('registration', $row->registration) ?>">
                                    </div>
                                    <div class="col">
                                        <label for="breeder" class="form-label">Breeder Name</label>
                                        <input class="form-control" type="text" name="breeder" value="<?= set_value('breeder', $row->breeder) ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="sire" class="form-label">Sire</label>
                                        <input class="form-control" type="text" name="sire" value="<?= set_value('sire', $row->sire) ?>">
                                    </div>
                                    <div class="col">
                                        <label for="dam" class="form-label">Dam</label>
                                        <input class="form-control" type="text" name="dam" value="<?= set_value('dam', $row->dam) ?>">
                                    </div>
                                </div>
                                <legend class="h2">Required Documents</legend>
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="pedigree" class="form-label">Pedigree Papers</label>
                                        <input class="form-control" type="file" name="pedigreePath">
                                    </div>
                                    <div class="col">
                                        <label for="vaccination" class="form-label">Vaccination Certificate</label>
                                        <input class="form-control" type="file" name="vaccinationPath">
                                    </div>
                                </div>
                                <div class="row">
                                    <input type="submit" value="Update Cat" class="m-5 btn btn-primary col">
                                    <a href="<?= ROOT ?>/cats/list" class="btn btn-outline-primary m-5 col">Cancel</a>
                                </div>
                            </form>
                        </div>
                        <!-- END EDIT SECTION -->

                        <!-- VIEW SECTION -->
                    <?php else : ?>

                        <!-- DataTales -->

                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">
                                    Cats
                                    <a href="<?= ROOT ?>/admin/cats/add">
                                        <button class='btn btn-primary ml-3 p-2'><i class="fa-solid fa-user mr-2"></i>New Cat</button>
                                </h6>
                                </a>
                            </div>

                            <div class="card-body">
                                <div>
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Image</th>
                                                <th>Sex</th>
                                                <th>Breeder</th>
                                                <th>Owner</th>
                                                <th>Level</th>
                                                <th>Breed</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Image</th>
                                                <th>Sex</th>
                                                <th>Breeder</th>
                                                <th>Owner</th>
                                                <th>Level</th>
                                                <th>Breed</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>

                                        <?php if (!empty($rows)) : ?>
                                            <tbody class="dataset">

                                                <?php foreach ($rows as $row) : ?>
                                                    <tr>
                                                        <td><?= $row->id ?></td>
                                                        <td><?= $row->name ?></td>
                                                        <td><img src="<?= ROOT ?>/<?= $row->image ?>" alt="" width="100"></td>
                                                        <td><?= $row->sex ?></td>
                                                        <td><?= $row->breeder ?></td>
                                                        <td><?= $row->user_row->name ?></td>
                                                        <td><?= $row->level ?></td>
                                                        <td><?= $row->breed ?></td>
                                                        <td>
                                                            <a href="<?= ROOT ?>/admin/cats/edit/<?= $row->id ?>">
                                                                <i class="fa-solid fa-pen-to-square text-success"></i>
                                                            </a>
                                                            <a href="<?= ROOT ?>/admin/cats/delete/<?= $row->id ?>">
                                                                <i class="fa-solid fa-trash-can text-danger"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
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

<!--===============================
=           Script Area          =
================================-->
<script>
    function load_image(file) {
        document.querySelector('.js-filename').innerHTML = 'Selected File:' + file.name;

        let mylink = URL.createObjectURL(file);
        document.querySelector('.js-image-preview').src = mylink;
    }

    function save_profile(e) {

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

    function send_data(obj, progbar = 'js-prog') {
        let prog = document.querySelector('.' + progbar)
        prog.children[0].style.width = '0%';
        prog.classList.remove('d-none');

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
</script>