<!--===============================
=            Header Area          =
================================-->

<?php $this->view('includes/header', $data) ?>


<body class="body-wrapper">

    <!--===============================
    =            Nav Area            =
    ================================-->

    <?php $this->view('includes/nav', $data) ?>

    <!--===============================
    =        Search Bar Area          =
    ================================-->

    <?php $this->view('includes/searchbar', $data) ?>


    <!--=====================================================================
    =                            Main Content Area                          =
    =======================================================================-->

    <!--===============================
    =           Add Content Area     =
    ================================-->
    <!-- POST ONLY -->
    <?php if ($action == 'add') : ?>
            <!-- ADD ITEM FORM -->
        <!--===============================
    =           Edit Content Area     =
    ================================-->
        <!-- Requires 1 row -->
    <?php elseif ($action == 'edit') : ?>
        <?php if ($row) : ?>
        <!-- SINGLE ITEM EDIT FORM -->
        <?php else : ?>
            <!-- GO BACK -->
        <?php endif; ?>
        <!--===============================
    =         List Content Area     =
    ================================-->
        <!-- Requires rows -->
    <?php elseif ($action == 'list') : ?>
        <?php if ($rows) : ?>
            <!-- ITEM LIST -->
        <?php else : ?>
            <!-- TEMPLATE ITEM -->
        <?php endif; ?>
        <!--===============================
    =       Single Content Area       =
    ================================-->
        <!-- requires row -->
    <?php else : ?>
        <?php if ($row) : ?>
            <!-- SINGLE ITEM VIEW -->
        <?php else : ?>

        <?php endif; ?>
    <?php endif; ?>

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