<html>
<!--===============================
=            Header Area            =
================================-->

<?php $this->view('includes/header', $data) ?>


<body class="body-wrapper">

    <!--===============================
=            Nav Area            =
================================-->

    <?php $this->view('includes/nav', $data) ?>

    <!--===============================
=            Hero Area            =
================================-->

    <section class="hero-area bg-1 text-center overly">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Header Contetnt -->
                    <div class="content-block">
                        <h1>Cat Shows Near You </h1>
                        <p>Join the millions who win awards <br> everyday in local communities around Australia</p>
                        <div class="short-popular-category-list text-center">
                            <h2>Popular Category</h2>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="category"><i class="fa fa-cat text-white"></i> Long Hair</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="category"><i class="fa fa-cat"></i> Short Hair</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="category"><i class="fa fa-cat"></i> Companion</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="category"><i class="fa fa-cat"></i> Kitten</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="category"><i class="fa fa-cat"></i> Councils</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <!-- Advance Search -->
                    <!-- <div class="advance-search">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-12 col-md-12 align-content-center">
                                    <form method="POST">
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control my-2 my-lg-1" id="inputtext4" placeholder="What area?" disabled>
                                            </div>
                                            
                                            <div class="form-group col-md-7">
                                                <input type="text" class="form-control my-2 my-lg-1" id="inputLocation4" placeholder="Location" name="searchLocation">
                                            </div>
                                            <div class="form-group col-md-2 align-self-center">
                                                <button type="submit" class="btn btn-primary">Search Now</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> -->

                </div>
            </div>
        </div>
        <!-- Container End -->
    </section>

<!--===================================
=            Client Slider            =
====================================-->


<!--===========================================
=            Upcoming Shows section            =
============================================-->

    <section class="popular-deals section bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2>Upcoming Shows</h2>
                        <p>Browser shows in your area</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- offer 01 -->
                <div class="col-lg-12">
                    <div class="trending-ads-slide">
                        <?php if(!empty($rows)) : ?>
                            <?php foreach($rows as $row) : ?>
                        <div class="col-sm-12 col-lg-4">
                            <!-- product card -->
                            <div class="product-item bg-light">
                                <div class="card">
                                    <div class="thumb-content">
                                        <div class="price">Ticket Price: $<?= $row->entryTicketPrice?></div>
                                        <a href="<?=ROOT?>/shows/<?=$row->id?>">
                                            <img class="card-img-top img-fluid" src="<?=get_image($row->image) ?>?>" alt="Card image cap">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title"><a href="<?=ROOT?>/shows/<?=$row->id?>"><?= $row->showTitle?></a></h4>
                                        <ul class="list-inline product-meta">
                                            <li class="list-inline-item">
                                                <a href="<?=ROOT?>/shows/<?=$row->id?>"><i class="fa fa-folder-open-o"></i><?= $row->location?></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#"><i class="fa fa-calendar"></i><?=get_date($row->showDate)?></a>
                                            </li>
                                        </ul>
                                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, aliquam!</p>
                                        <div class="product-ratings">
                                            <ul class="list-inline">
                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                                <?php endforeach;?>
                                <?php else : ?>
                                    <!-- ORIGINAL TEMPLATE ITEM CARD -->
                                    <div class="col-sm-12 col-lg-4">
                            <!-- product card -->
                            <div class="product-item bg-light">
                                <div class="card">
                                    <div class="thumb-content">
                                        <!-- <div class="price">$200</div> -->
                                        <a href="single">
                                            <img class="card-img-top img-fluid" src="<?=ROOT?>/classimax/images/products/products-1.jpg" alt="Card image cap">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title"><a href="single">11inch Macbook Air</a></h4>
                                        <ul class="list-inline product-meta">
                                            <li class="list-inline-item">
                                                <a href="single"><i class="fa fa-folder-open-o"></i>Electronics</a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#"><i class="fa fa-calendar"></i>26th December</a>
                                            </li>
                                        </ul>
                                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, aliquam!</p>
                                        <div class="product-ratings">
                                            <ul class="list-inline">
                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                                    <!-- END ORIGINAL TEMPLATE ITEM CARD -->
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </section>






    <!--====================================
=            Call to Action            =
=====================================-->

    <section class="call-to-action overly bg-3 section-sm">
        <!-- Container Start -->
        <div class="container">
            <div class="row justify-content-md-center text-center">
                <div class="col-md-8">
                    <div class="content-holder">
                        <h2>Become a Member today!</h2>
                        <ul class="list-inline mt-30">
                            <li class="list-inline-item"><a class="btn btn-main" href="register">Sign Up</a></li>
                            <li class="list-inline-item"><a class="btn btn-secondary" href="shows">Browser Shows</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container End -->
    </section>

    <!--============================
=            Footer            =
=============================-->

    <?php $this->view('includes/footer', $data) ?>

<!--============================
=            Scripts            =
=============================-->

    <?php $this->view('includes/scripts', $data) ?>



</body>

</html>