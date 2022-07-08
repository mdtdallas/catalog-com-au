<!--===============================
=            Header Area            =
================================-->

<?php $this->view('includes/header', $data) ?>

<body class="body-wrapper">




    <!--===============================
=            Nav Area            =
================================-->

    <h1 class="container-fluid text-center pt-5">Cat A Log</h1>

    <section class="login py-5 border-top-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8 align-item-center">
                    <div class="border border">
                        <h3 class="bg-gray p-4">Register Now</h3>
                        <form method="POST">
                            <fieldset class="p-4">
                                <div class="row">
                                    <div class='col-6 m-0'>
                                        <input type="text" placeholder="First Name*" class="border p-3 w-100 my-2 <?=!empty($errors['firstname']) ? 'border-danger':'border';?>" value="<?= set_value('firstname') ?>" name="firstname" required>
                                        <?php if (!empty($errors['firstname'])) : ?>
                                            <div class="text-danger"><?= $errors['firstname'] ?></div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-6">
                                        <input type="text" placeholder="Last Name*"  class="border p-3 w-100 my-2 <?=!empty($errors['lastname']) ? 'border-danger':'';?>" value="<?= set_value('lastname') ?>" name="lastname" required>
                                        <?php if (!empty($errors['lastname'])) : ?>
                                            <div class="text-danger"><?= $errors['lastname'] ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <input type="phone" placeholder="Phone*" maxlength="10" class="border p-3 w-100 my-2 <?=!empty($errors['phone']) ? 'border-danger':'';?>" value="<?= set_value('phone') ?>" value="<?= set_value('phone') ?>" name="phone" required>
                                    <?php if (!empty($errors['phone'])) : ?>
                                        <div class="text-danger"><?= $errors['phone'] ?></div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-12">
                                    <input type="email" placeholder="Email*" class="border p-3 w-100 my-2 <?=!empty($errors['email']) ? 'border-danger':'';?>" value="<?= set_value('email') ?>" name="email" required>
                                    <?php if (!empty($errors['email'])) : ?>
                                        <div class="text-danger"><?= $errors['email'] ?></div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-12">
                                    <input type="password" placeholder="Password*" class="border p-3 w-100 my-2 <?=!empty($errors['password']) ? 'border-danger':'';?>" value="<?= set_value('password') ?>" value="<?= set_value('password') ?>" name="password" required>
                                </div>
                                <div class="col-12">
                                    <input type="password" placeholder="Confirm Password*" class="border p-3 w-100 my-2 <?=!empty($errors['password']) ? 'border-danger':'';?>" value="<?= set_value('password') ?>" value="<?= set_value('confirm') ?>" name="confirm" required>
                                    <?php if (!empty($errors['password'])) : ?>
                                        <div class="text-danger"><?= $errors['password'] ?></div>
                                    <?php endif; ?>
                                </div>
                                <div class="loggedin-forgot d-inline-flex my-3">
                                    <input type="checkbox" id="registering" name="registering" class="mt-1" <?= set_value('registering') ? 'checked' : ''; ?>>
                                    <label for="registering" class="px-2">By registering, you accept our <a class="text-primary font-weight-bold" href="<?=ROOT?>/terms">Terms & Conditions</a></label>
                                    <?php if (!empty($errors['registering'])) : ?>
                                        <div class="text-danger"><?= $errors['registering'] ?></div>
                                    <?php endif; ?>
                                </div>
                                <button type="submit" class="d-block py-3 px-4 bg-primary text-white border-0 rounded font-weight-bold">Register Now</button>
                                <a class="mt-3 d-inline-block text-primary" href="login">Already a member?</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
=            Footer            =
=============================-->



    <!--============================
=            Scripts            =
=============================-->

    <?php $this->view('includes/scripts', $data) ?>

</body>

</html>