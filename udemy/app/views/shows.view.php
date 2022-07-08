<html>
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
=           Main Content Area     =
================================-->


    <!--===============================
=           Show Area             =
================================-->

    <?php if ($row) : ?>
        <!--===================================
        =            Single Show              =
        ====================================-->
        <section class="section bg-gray">
            <!-- Container Start -->
            <div class="container">
                <div class="row">
                    <!-- Left sidebar -->
                    <div class="col-md-8">
                        <div class="product-details">
                            <h1 class="product-title"><?= $row[0]->showTitle ?></h1>
                            <div class="product-meta">
                                <ul class="list-inline">
                                    <li class="list-inline-item"><i class="fa fa-user-o"></i> By <a href=""><?= $row[0]->user_row->firstname ?></a></li>
                                    <li class="list-inline-item"><i class="fa fa-folder-open-o"></i> Category<a href="">All</a></li>
                                    <li class="list-inline-item"><i class="fa fa-location-arrow"></i> Location<a href=""><?= $row[0]->location ?></a></li>
                                </ul>
                            </div>

                            <!-- product slider -->
                            <img src="<?= get_image($row[0]->image) ?>" alt="">
                            <!-- product slider -->

                            <div class="content mt-5 pt-5">
                                <ul class="nav nav-pills  justify-content-center" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="false">Show Info</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#pills-judges" role="tab" aria-controls="pills-judges" aria-selected="false">Judges</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="true">Show Details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Papers</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                        <h3 class="tab-title">Show Description</h3>
                                        <p><?= $row[0]->additionalInformation ?></p>
                                    </div>

                                    
                                    <div class="tab-pane fade" id="pills-judges" role="tabpanel" aria-labelledby="pills-judges-tab">
                                        <table class="table table-bordered product-table">
                                            
                                            <tbody>
                                            <th class="text-center">Ring 1</th>
                                            <th class="text-center">Judge</th>
                                                <tr>
                                                    <td>Long Hair Kittens</td>
                                                    <td><?= $row[0]->R1LHK ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Long Hair Entire</td>
                                                    <td><?= $row[0]->R1LHE ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Long Hair Desexed</td>
                                                    <td><?= $row[0]->R1LHD ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Short Hair Kitten</td>
                                                    <td><?= $row[0]->R1SHK ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Short Hair Entire</td>
                                                    <td><?= $row[0]->R1SHE ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Short Hair Desexed</td>
                                                    <td><?= $row[0]->R1SHD ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Companion</td>
                                                    <td><?= $row[0]->R1Companion ?></td>
                                                </tr>
                                            </tbody>
                                            <tbody>
                                            <th class="text-center">Ring 2</th>
                                            <th class="text-center">Judge</th>
                                                <tr>
                                                    <td>Long Hair Kittens</td>
                                                    <td><?= $row[0]->R2LHK ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Long Hair Entire</td>
                                                    <td><?= $row[0]->R2LHE ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Long Hair Desexed</td>
                                                    <td><?= $row[0]->R2LHD ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Short Hair Kitten</td>
                                                    <td><?= $row[0]->R2SHK ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Short Hair Entire</td>
                                                    <td><?= $row[0]->R2SHE ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Short Hair Desexed</td>
                                                    <td><?= $row[0]->R2SHD ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Companion</td>
                                                    <td><?= $row[0]->R2Companion ?></td>
                                                </tr>
                                            </tbody>
                                            <tbody>
                                            <th class="text-center">Ring 3</th>
                                            <th class="text-center">Judge</th>
                                                <tr>
                                                    <td>Long Hair Kittens</td>
                                                    <td><?= $row[0]->R3LHK ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Long Hair Entire</td>
                                                    <td><?= $row[0]->R3LHE ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Long Hair Desexed</td>
                                                    <td><?= $row[0]->R3LHD ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Short Hair Kitten</td>
                                                    <td><?= $row[0]->R3SHK ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Short Hair Entire</td>
                                                    <td><?= $row[0]->R3SHE ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Short Hair Desexed</td>
                                                    <td><?= $row[0]->R3SHD ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Companion</td>
                                                    <td><?= $row[0]->R3Companion ?></td>
                                                </tr>
                                            </tbody>
                                            <tbody>
                                            <th class="text-center">Ring 4</th>
                                            <th class="text-center">Judge</th>
                                                <tr>
                                                    <td>Long Hair Kittens</td>
                                                    <td><?= $row[0]->R4LHK ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Long Hair Entire</td>
                                                    <td><?= $row[0]->R4LHE ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Long Hair Desexed</td>
                                                    <td><?= $row[0]->R4LHD ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Short Hair Kitten</td>
                                                    <td><?= $row[0]->R4SHK ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Short Hair Entire</td>
                                                    <td><?= $row[0]->R4SHE ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Short Hair Desexed</td>
                                                    <td><?= $row[0]->R4SHD ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Companion</td>
                                                    <td><?= $row[0]->R4Companion ?></td>
                                                </tr>
                                            </tbody>
                                            <tbody>
                                            <th class="text-center">Ring 5</th>
                                            <th class="text-center">Judge</th>
                                                <tr>
                                                    <td>Long Hair Kittens</td>
                                                    <td><?= $row[0]->R5LHK ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Long Hair Entire</td>
                                                    <td><?= $row[0]->R5LHE ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Long Hair Desexed</td>
                                                    <td><?= $row[0]->R5LHD ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Short Hair Kitten</td>
                                                    <td><?= $row[0]->R5SHK ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Short Hair Entire</td>
                                                    <td><?= $row[0]->R5SHE ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Short Hair Desexed</td>
                                                    <td><?= $row[0]->R5SHD ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Companion</td>
                                                    <td><?= $row[0]->R5Companion ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                        <h3 class="tab-title">Show Details</h3>
                                        <table class="table table-bordered product-table">
                                            <tbody>
                                                <tr>
                                                    <td>Ticket Price</td>
                                                    <td>$<?= $row[0]->entryTicketPrice ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Tickets Remaining</td>
                                                    <td><?= $row[0]->entryTicketCount ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Catalogue Price</td>
                                                    <td>$<?= $row[0]->cataloguePrice ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Small Cage Price</td>
                                                    <td>$<?= $row[0]->smallCagePrice ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Large Cage Price</td>
                                                    <td>$<?= $row[0]->largeCagePrice ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Raffle Ticket Price</td>
                                                    <td>$<?= $row[0]->rafflePrice ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Raffle Tickets Available</td>
                                                    <td><?= $row[0]->raffleTicketCount ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Added</td>
                                                    <td><?= get_date($row[0]->created) ?></td>
                                                </tr>
                                                <tr>
                                                    <td>State</td>
                                                    <td><?= $row[0]->location ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Cat Council</td>
                                                    <td><?= $row[0]->council_row->council ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Show Sponsor</td>
                                                    <td><?= $row[0]->sponsor_row->sponsor ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Additional Entry</td>
                                                    <td>$<?= $row[0]->secondEntryTicketPrice ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <!-- Map Widget -->

                                        <div class="widget map">
                                            <h4 class="text-center">Map</h4>
                                            <div class="">
                                                <iframe src="<?= $row[0]->map ?>" frameborder="0" width="100%" height="300"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                        <h3 class="tab-title">Covid Safe Plan</h3>
                                        <div class="product-review">
                                            <div class="media">

                                                <div class="media-body">
                                                    <iframe src="<?= ROOT ?>/<?= $row[0]->covidPath ?>#toolbar=0" width="100%" height="500px" frameborder="0"></iframe>

                                                </div>
                                            </div>

                                            <h3 class="tab-title">Show Rules</h3>
                                            <div class="media">

                                                <div class="media-body">
                                                    <iframe src="<?= ROOT ?>/<?= $row[0]->rulesPath ?>#toolbar=0" width="100%" height="500px" frameborder="0"></iframe>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="sidebar">
                            <div class="widget price text-center">
                                <h4>Ticket Price</h4>
                                <p>$<?= $row[0]->entryTicketPrice ?></p>
                                <br>
                                <h4>Tickets Remaining</h4>
                                <p><?= $row[0]->entryTicketCount ?></p>
                                <li class="list-inline-item"><a href="<?= ROOT ?>/bookings/<?= $row[0]->id ?>" class="btn btn-offer d-inline-block btn-secondary ml-n1 my-1 px-lg-4 px-md-3">Book a Ticket</a></li>
                            </div>
                            <!-- User Profile widget -->
                            <div class="widget user text-center">
                            
                                <h2 class="text-center">Sponsor</h2>
                                <img class="rounded-circle img-fluid mb-5 px-5" src="<?= get_image($row[0]->sponsor_row->sponsor_image) ?>" alt="">
                                <h4><a href=""><?= $row[0]->sponsor_row->sponsor ?></a></h4>
                                <p class="member-time">Member Since <?= $row[0]->sponsor_row->created ?></p>
                                <a href="<?= ROOT ?>/shows">See all shows</a>
                                
                            </div>


                            <!-- CAT COUNCIL -->
                            <div class="widget map text-center">
                                <h4 class="text-center p-3">Cat Council</h4>
                                <img class="rounded-circle img-fluid mb-5 px-5" src="<?= get_image($row[0]->council_row->councilImagePath) ?>" alt="">
                                <p><?= $row[0]->council_row->council ?></p>

                                <p><?= $row[0]->council_row->councilName ?></p>
                                <p><?= $row[0]->council_row->state ?></p>
                                <p><?= $row[0]->council_row->councilPhone ?></p>
                                <p><?= $row[0]->council_row->councilEmail ?></p>
                                <p><?= $row[0]->council_row->councilURL ?></p>
                            </div>



                        </div>
                    </div>

                </div>
            </div>
            <!-- Container End -->
        </section>




        <!--===============================
        =         All Shows Area        =
        ================================-->
    <?php elseif (!$row) : ?>


        <!--===============================
=        Search Area        =
================================-->
        <section class="page-search">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Advance Search -->
                        <div class="advance-search">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-12 col-md-12 align-content-center">
                                        <form method="POST">
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <input type="text" class="form-control my-2 my-lg-1 bg-secondary" id="inputtext4" placeholder="What area?" disabled>
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
                        </div>
                        <!-- END Advance Search -->
                    </div>
                </div>
            </div>
        </section>


        <section class="section-sm">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="search-result bg-gray">
                            <h2>Upcoming Shows</h2>
                            <p><?= Date('jS F Y') ?></p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="category-sidebar">
                            <!-- <div class="widget category-list">
                                <h4 class="widget-header">All Categories</h4>
                                <ul class="category-list">
                                    <li><a href="category.html">Long Hair Kitten <span>93</span></a></li>
                                    <li><a href="category.html">Short Hair Kitten <span>233</span></a></li>
                                    <li><a href="category.html">Long Hair Entire <span>183</span></a></li>
                                    <li><a href="category.html">Short Hair Entire <span>343</span></a></li>
                                    <li><a href="category.html">Long Hair Desexed <span>183</span></a></li>
                                    <li><a href="category.html">Short Hair Desexed <span>343</span></a></li>
                                    <li><a href="category.html">Companion <span>183</span></a></li>

                                </ul>
                            </div> -->

                            <!-- <div class="widget category-list">
                                <h4 class="widget-header">Australia</h4>
                                <ul class="category-list">
                                    <li><a href="category.html">Brisbane <span>93</span></a></li>
                                    <li><a href="category.html">Sydney <span>233</span></a></li>
                                    <li><a href="category.html">Melbourne <span>183</span></a></li>
                                    <li><a href="category.html">Canberra <span>120</span></a></li>
                                    <li><a href="category.html">Adelaide <span>40</span></a></li>
                                    <li><a href="category.html">Perth <span>81</span></a></li>
                                    <li><a href="category.html">Darwin <span>13</span></a></li>
                                    <li><a href="category.html">Tasmania <span>10</span></a></li>
                                </ul>
                            </div> -->

                            <!-- <div class="widget filter">
                                <h4 class="widget-header">Shows</h4>
                                <select>
                                    <option>Popularity</option>
                                    <option value="1">Top rated</option>
                                    <option value="2">Lowest Price</option>
                                    <option value="4">Highest Price</option>
                                </select>
                            </div> -->

                            <!-- <div class="widget price-range w-100">
                                <h4 class="widget-header">Price Range</h4>
                                <div class="block">
                                    <input class="range-track w-100" type="text" data-slider-min="0" data-slider-max="5000" data-slider-step="5" data-slider-value="[0,5000]">
                                    <div class="d-flex justify-content-between mt-2">
                                        <span class="value">$10 - $5000</span>
                                    </div>
                                </div>
                            </div> -->

                        </div>
                    </div>
                    <div class="col-md-9">
                        <!-- <div class="category-search-filter">
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
                        </div> -->
                        <div class="product-grid-list">
                            <div class="row mt-30">
                                <?php if ($rows) : ?>
                                    <?php foreach ($rows as $row) : ?>
                                        <div class="col-sm-12 col-lg-4 col-md-6">
                                            <!-- product card -->
                                            <div class="product-item bg-light">
                                                <div class="card">
                                                    <div class="thumb-content">
                                                        <!-- <div class="price">$200</div> -->
                                                        <a href="<?= ROOT ?>/shows/<?= $row->id ?>">
                                                            <img class="card-img-top img-fluid" src="<?=get_image($row->image)?>" alt="Card image cap">
                                                        </a>
                                                    </div>
                                                    <div class="card-body">
                                                        <h4 class="card-title"><a href="<?= ROOT ?>/shows/<?= $row->id ?>"><?= $row->showTitle ?></a></h4>
                                                        <ul class="list-inline product-meta">
                                                            <li class="list-inline-item">
                                                                <a href="<?= ROOT ?>/shows/<?= $row->id ?>"><i class="fa fa-folder-open-o"></i><?= $row->location ?></a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a href="#"><i class="fa fa-calendar"></i><?= $row->showDate ?></a>
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
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <div class="col-sm-12 col-lg-4 col-md-6">
                                        <!-- product card -->
                                        <div class="product-item bg-light">
                                            <div class="card">
                                                <div class="thumb-content">
                                                    <!-- <div class="price">$200</div> -->
                                                    <a href="single.html">
                                                        <img class="card-img-top img-fluid" src="images/products/products-1.jpg" alt="Card image cap">
                                                    </a>
                                                </div>
                                                <div class="card-body">
                                                    <h4 class="card-title"><a href="single.html">11inch Macbook Air</a></h4>
                                                    <ul class="list-inline product-meta">
                                                        <li class="list-inline-item">
                                                            <a href="single.html"><i class="fa fa-folder-open-o"></i>Electronics</a>
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
                                <?php endif; ?>

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <!--============================
=            Footer            =
=============================-->

    <?php $this->view('includes/footer', $data) ?>

    <!--============================
=            Scripts           =
=============================-->

    <?php $this->view('includes/scripts', $data) ?>



</body>

</html>