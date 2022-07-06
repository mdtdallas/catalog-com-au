<!--===============================
=            Header Area            =
================================-->

<?php $this->view('admin/admin-header', $data) ?>



<?php if (!empty($row)) : ?>

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

                        <!--==================================
=            User Profile            =
===================================-->
                        <section class="user-profile section">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-10 offset-md-1 col-lg-3 offset-lg-0">
                                        <div class="profile-sidebar">
                                            <!-- User Widget -->
                                            <div class="widget user">
                                                <!-- User Image -->
                                                <div class="image d-flex justify-content-center">
                                                    <img src="<?= ROOT ?>/<?= $row->image ?>" alt="" class="" height="150" width="150">
                                                </div>
                                                <!-- User Name -->
                                                <h5 class="text-center"><?= esc($row->firstname) ?> <?= esc($row->lastname) ?></h5>
                                                <!-- User Email -->
                                                <h5 class="text-center"><?= esc($row->email) ?> </h5>
                                                <!-- User Phone -->
                                                <h5 class="text-center"><?= esc($row->phone) ?> </h5>
                                            </div>
                                            <!-- Dashboard Links -->
                                            <div class="widget dashboard-links">
                                                <ul>
                                                    <li><a class="my-1 d-inline-block" href="">Savings Dashboard</a></li>
                                                    <li><a class="my-1 d-inline-block" href="">Saved Offer <span>(5)</span></a></li>
                                                    <li><a class="my-1 d-inline-block" href="">Favourite Stores <span>(3)</span></a></li>
                                                    <li><a class="my-1 d-inline-block" href="">Recommended</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-10 offset-md-1 col-lg-9 offset-lg-0">
                                        <!-- Edit Profile Welcome Text -->
                                        <div class="widget welcome-message">
                                            <h2>Edit profile</h2>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
                                        </div>
                                        <!-- Edit Personal Info -->
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="widget personal-info">
                                                    <h3 class="widget-header user">Edit Personal Information</h3>
                                                    <!-- FORM START -->
                                                    <form method="POST" enctype="multipart/form-data">
                                                        <!-- First Name -->
                                                        <div class="form-group">
                                                            <label for="first-name">First Name</label>
                                                            <input type="text" class="form-control" id="firstname" name='firstname' value="<?= set_value('firstname', $row->firstname) ?>" required>
                                                            <?php if (!empty($errors['firstname'])) : ?>
                                                                <div class="text-danger js-error-firstname"><?= $errors['firstname'] ?></div>
                                                            <?php endif; ?>
                                                            <div class="text-danger js-error-firstname"></div>
                                                        </div>
                                                        <!-- Last Name -->
                                                        <div class="form-group">
                                                            <label for="last-name">Last Name</label>
                                                            <input type="text" class="form-control" id="lastname" name="lastname" value="<?= set_value('lastname', $row->lastname) ?>" required>
                                                            <?php if (!empty($errors['lastname'])) : ?>
                                                                <div class="text-danger js-error-lastname"><?= $errors['lastname'] ?></div>
                                                            <?php endif; ?>
                                                            <div class="text-danger js-error-lastname"></div>
                                                        </div>
                                                        <!-- email -->
                                                        <div class="form-group">
                                                            <label for="email">Email</label>
                                                            <input type="email" class="form-control" id="email" name="email" value="<?= set_value('email', $row->email) ?>" required>
                                                            <?php if (!empty($errors['email'])) : ?>
                                                                <div class="text-danger js-error-email"><?= $errors['email'] ?></div>
                                                            <?php endif; ?>
                                                            <div class="text-danger js-error-email"></div>
                                                        </div>
                                                        <!-- File chooser -->
                                                        <div class="col">
                                                            <div class="top row d-flex justify-content-center">
                                                                <img src="<?= ROOT ?>/<?= $row->image ?>" alt="profile" class="js-image-preview rounded shadow-sm" height="130" width="130">
                                                            </div>
                                                            <div class="js-filename p-3 text-center">Selected File: none</div>
                                                            <div class="bottom row">
                                                                <label class="btn btn-outline-primary btn-sm shadow-sm" title="Upload Profile Picture">
                                                                    <i class="fa-solid fa-upload"></i>
                                                                    <input onchange="load_image(this.files[0])" type="file" name="image" style='display: none;' class="js-profile-image-input">
                                                                </label>
                                                                <span class="p-4">Upload Profile Picture</span>
                                                                <?php if (!empty($errors['image'])) : ?>
                                                                    <div class="text-danger js-error-image"><?= $errors['image'] ?></div>
                                                                <?php endif; ?>
                                                                <div class="text-danger js-error-image"></div>
                                                            </div>
                                                        </div>


                                                        <!-- Role -->

                                                        <?php if (Auth::is_admin()) : ?>

                                                            <div class="col mt-5 input-group m-2">
                                                                <label for="role" class="form-label pr-3 pt-2">Role</label>
                                                                <select class="form-select" name="role">
                                                                    <option value="none">None</option>
                                                                    <?php if (!empty($roles)) : ?>
                                                                        <?php foreach ($roles as $role) : ?>
                                                                            <option <?= set_select('id', $role->id, $row->role) ?> value="<?= $role->id ?>"><?= $role->role ?></option>
                                                                        <?php endforeach; ?>
                                                                    <?php endif; ?>
                                                                </select>
                                                                <div class="text-danger js-error-role"></div>
                                                            </div>

                                                        <?php else : ?>
                                                            <div></div>
                                                        <?php endif; ?>

                                                        <!-- Phone -->
                                                        <div class="form-group">
                                                            <label for="phone">Phone</label>
                                                            <input type="phone" maxlength="10" class="form-control" id="phone" name="phone" value="<?= set_value('phone', $row->phone) ?>" required>
                                                            <?php if (!empty($errors['phone'])) : ?>
                                                                <div class="text-danger js-error-phone"><?= $errors['phone'] ?></div>
                                                            <?php endif; ?>
                                                            <div class="text-danger js-error-phone"></div>
                                                        </div>

                                                        <!-- facebook -->
                                                        <div class="form-group">
                                                            <label for="facebook">Facebook</label>
                                                            <input type="url" class="form-control" id="facebook_link" name="facebook_link" value="<?= set_value('facebook_link', $row->facebook_link) ?>">
                                                            <?php if (!empty($errors['facebook_link'])) : ?>
                                                                <div class="text-danger js-error-facebook_link"><?= $errors['facebook_link'] ?></div>
                                                            <?php endif; ?>
                                                            <div class="text-danger js-error-facebook_link"></div>
                                                        </div>
                                                        <!-- Progress Bar -->
                                                        <div class="js-prog progress m-2 d-none">
                                                            <div class="progress-bar" role="progressbar" style="width: 75%"></div>
                                                        </div>
                                                        <!-- Submit button -->
                                                        <button type="submit" onclick="save_profile(event)" class="btn btn-transparent shadow-sm mb-5">Save My Changes</button>
                                                    </form>
                                                    <!-- FORM END -->

                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <!-- Change Password -->
                                                <div class="widget change-password">
                                                    <h3 class="widget-header user">Edit Password</h3>
                                                    <form method="">
                                                        <!-- Current Password -->
                                                        <div class="form-group">
                                                            <label for="current-password">Current Password</label>
                                                            <input type="password" class="form-control" id="current-password">
                                                        </div>
                                                        <!-- New Password -->
                                                        <div class="form-group">
                                                            <label for="new-password">New Password</label>
                                                            <input type="password" class="form-control" id="new-password">
                                                        </div>
                                                        <!-- Confirm New Password -->
                                                        <div class="form-group">
                                                            <label for="confirm-password">Confirm New Password</label>
                                                            <input type="password" class="form-control" id="confirm-password">
                                                        </div>
                                                        <!-- Submit Button -->
                                                        <button class="btn btn-transparent shadow-sm">Change Password</button>

                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!--===============================
        =           Footer Area          =
        ================================-->
            <?php else : ?>
                <div class="container-fluid">
                    <div class="bg-gradient-danger p-20">
                        <span class="icon text-white-50 p-6">
                            <i class="fas fa-trash"></i>
                        </span>
                        <span class="text-white p-5">Profile not found!</span>
                    </div>
                </div>
            <?php endif; ?>

            <!--===============================
        =           Scripts Area          =
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
            <?php $this->view('admin/admin-footer', $data) ?>

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

    </body>

    </html>