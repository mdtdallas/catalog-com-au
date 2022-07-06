<!--===============================
=            Header Area            =
================================-->

<?php $this->view('includes/header', $data) ?>

<body class="body-wrapper">


    <!--===============================
=            Form Area            =
================================-->

    <h1 class="container-fluid text-center pt-5">Cat A Log</h1>

    <section class="login py-5 border-top-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8 align-item-center">
                    <div class="border">
                        <h3 class="bg-gray p-4">Login Now</h3>

                        <?php if (message()) : ?>
                            <div class="alert alert-danger text-center"><?= message('', true) ?></div>
                        <?php endif; ?>

                        <?php if (!empty($errors['email'])) : ?>
                            <div class="alert alert-danger text-center"><?= $errors['email'] ?></div>
                                    <?php endif; ?>

                        <form method="POST">
                            <fieldset class="p-4">
                                <input type="email" placeholder="Email" class="border p-3 w-100 my-2" name='email' value='<?=set_value('email')?>' required1>
                                    
                                <input type="password" placeholder="Password" class="border p-3 w-100 my-2" name="password" value='<?=set_value('password')?>' required1>
                                
                                <button type="submit" class="d-block py-3 px-5 bg-primary text-white border-0 rounded font-weight-bold mt-3">Log in</button>
                                <a class="mt-3 d-block  text-primary" href="<?=ROOT?>/forgot">Forget Password?</a>
                                <a class="mt-3 d-inline-block text-primary" href="register">Register Now</a>
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