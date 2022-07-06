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
    =            Nav Area            =
    ================================-->

    <?php $this->view('includes/searchbar', $data) ?>


    <!--=====================================================================
    =                            Main Content Area                          =
    =======================================================================-->
 
    <section class="section-sm">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="search-result bg-gray row">
                        <div class="col-9">
                            <h2>My Shows</h2>
                            <p><?= Date('jS M Y') ?></p>
                        </div>
                        
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="category-sidebar">
                        <div class="widget filter">
                            <h4 class="widget-header">Menu</h4>
                            <select>
                                <option>First</option>
                                <option value="1">Top rated</option>
                                <option value="2">Lowest Price</option>
                                <option value="4">Highest Price</option>
                            </select>
                        </div>

                    </div>
                </div>
                <div class="col-lg-9 col-md-8">
                    <div class="category-search-filter">
                        <div class="row">
                            <div class="col-md-6">
                                <strong>Sort</strong>
                                <select>
                                    <option>Most Recent</option>
                                    <option value="1">Most Popular</option>
                                    <option value="2">Lowest Price</option>
                                    <option value="4">Highest Price</option>
                                </select>
                            </div>

                        </div>
                    </div>
                    
                    <?php if ($rows) : ?>
                        <?php foreach ($rows as $row) : ?>
                            <!-- cat list  -->
                            <div class="ad-listing-list mt-20">
                                <div class="row p-lg-3 p-sm-5 p-4">
                                    <div class="col-lg-4 align-self-center">
                                        <a href="">
                                            <img src="<?= ROOT ?>/<?= $row->show_row->image ?>" class="img-fluid" alt="">
                                        </a>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-10">
                                                <div class="ad-listing-content">
                                                    <div>
                                                        <a href="" class="font-weight-bold"><?= $row->show_row->showTitle ?></a>
                                                    </div>
                                                    <ul class="list-inline mt-2 mb-3">
                                                        <li class="list-inline-item"><a href="category.html"> <i class="fa-solid fa-map-location"></i> <?= $row->show_row->location ?></a>
                                                        </li>
                                                        <li class="list-inline-item"><a href=""><i class="fa fa-calendar p-1"></i><?= $row->show_row->showDate ?></a>
                                                        </li>

                                                    </ul>
                                                    <div>><span class="p-2">Sponsor:</span><?= $row->sponsor_row->sponsor ?></div>
                                                    <div>><span class="p-2">Council:</span><?= $row->council_row->council ?></div>
                                                    <p class="pr-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                        Explicabo, aliquam!</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row pb-2">
                                                <div><i class="fa-solid fa-cat p-1"></i><span class="p-2">Cat Entered:</span><?=$row->cat_row->name?></div>
                                                </div>
                                                <div class="row pb-2">
                                                <div><i class="fa-solid fa-award p-1"></i><span class="p-2">Award:</span>results</div>
                                                </div>
                                                <?php if(empty($row->second_cat_row)) :?>
                                                    <div></div>
                                                <?php else:?>
                                                    <div class="row pb-2">
                                                <div><i class="fa-solid fa-cat p-1"></i><span class="p-2">Second Cat Entered:</span><?=$row->second_cat_row->name ?? 'Unknown' ?></div>
                                                </div>
                                                <div class="row pb-2">
                                                <div><i class="fa-solid fa-award p-1"></i><span class="p-2">Award:</span>results</div>
                                                </div>
                                                <?php endif;?>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>

                        <div class="ad-listing-list mt-20">
                            <div class="row p-lg-3 p-sm-5 p-4">
                                <div class="col-lg-4 align-self-center">
                                    <a href="single.html">
                                        <img src="images/products/products-2.jpg" class="img-fluid" alt="">
                                    </a>
                                </div>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-10">
                                            <div class="ad-listing-content">
                                                <div>
                                                    <a href="single.html" class="font-weight-bold">Study Table Combo</a>
                                                </div>
                                                <ul class="list-inline mt-2 mb-3">
                                                    <li class="list-inline-item"><a href="category.html"> <i class="fa fa-folder-open-o"></i> Electronics</a></li>
                                                    <li class="list-inline-item"><a href=""><i class="fa fa-calendar"></i>26th December</a></li>
                                                </ul>
                                                <p class="pr-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                    Explicabo, aliquam!</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 align-self-center">
                                            <div class="product-ratings float-lg-right pb-3">
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
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </section>

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