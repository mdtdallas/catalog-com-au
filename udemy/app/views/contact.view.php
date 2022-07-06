<!--===============================
=            Header Area          =
================================-->

<?php $this->view('includes/header', $data) ?>


<body class="body-wrapper">

    <!--===============================
    =            Nav Area            =
    ================================-->

    <?php $this->view('includes/nav', $data) ?>




    <!--=====================================================================
    =                            Main Content Area                          =
    =======================================================================-->

    <!-- page title -->
    <!--================================
=            Page Title            =
=================================-->
    <section class="page-title">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 text-center">
                    <!-- Title text -->
                    <h3>Contact Us</h3>
                </div>
            </div>
        </div>
        <!-- Container End -->
    </section>
    <!-- page title -->
    <?php if (message()) : ?>
        <div class="alert alert-success text-center"><?= message('', true) ?></div>
    <?php endif; ?>
    <!-- contact us start-->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="contact-us-content p-4">
                        <h5>Contact Us</h5>
                        <h1 class="pt-3">Hello, what's on your mind?</h1>
                        <p class="pt-3 pb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla elit dolor, blandit vel euismod ac, lentesque et dolor. Ut id tempus ipsum.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <form method="POST">
                        <fieldset class="p-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6 py-2">
                                        <input type="text" placeholder="Name *" class="form-control" name="name" required>
                                    </div>
                                    <div class="col-lg-6 pt-2">
                                        <input type="email" placeholder="Email *" class="form-control" name="email" required>
                                    </div>
                                </div>
                            </div>

                            <textarea name="message" placeholder="Message *" class="border w-100 p-3 mt-3 mt-lg-4"></textarea>
                            <div class="btn-grounp">
                                <button type="submit" class="btn btn-primary mt-2 float-right">SUBMIT</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- contact us end -->

    <!--=====================================================================
    =                        END Main Content Area                          =
    =======================================================================-->


    <!--============================
    =            Footer            =
    =============================-->

    <?php $this->view('includes/footer', $data) ?>

    <!--============================
    =            Scripts           =
    =============================-->

    <?php $this->view('includes/scripts', $data) ?>

</body>