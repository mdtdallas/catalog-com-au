<style>
    .scroll {
        height: 200px!important;
        width: 150px!important;
        overflow-y: scroll;
    }
</style>

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
    =            Search Bar            =
    ================================-->

    <?php $this->view('includes/searchbar', $data) ?>

    <!--===============================
    =           Main Content Area     =
    ================================-->


    <!--===============================
    =           Add Cat Area     =
    ================================-->
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
                        <select name="colour" id="colour_list" class="scroll">
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
                    <div class="col">
                        <label for="type" class="form-label">Cat Type</label>
                        <select name="type" id="type" class="form-select">
                            <option value="value">Select...</option>
                            <?php foreach ($types as $type) : ?>
                                <option value="<?= $type->id ?>"><?= $type->type ?></option>
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

        <!--===============================
        =           Edit Cat Area     =
        ================================-->
    <?php elseif ($action == 'edit') : ?>
        <div class="container align-items-center">
            <form method="POST" class="row mx-4" enctype="multipart/form-data">
        
                <?php csrf() ?>
                

                <legend class="h1 text-center mt-4">Edit Cat</legend>
                <div class="row mb-3">
                    <div class="col">
                        <label for="name" class="form-label">Cat Name</label>
                        <input class="form-control" type="text" name="name" value="<?= set_value('name', $row->name) ?>">
                    </div>
                    <div class="col">
                        <div class="top row d-flex justify-content-center">
                            <img src="<?= ROOT ?>/<?=$row->image?>" alt="profile" class="js-image-preview rounded shadow-sm" height="130" width="130">
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
                </div>
                <div class="row">
                    <div class="col-3">
                        <label for="bio">Bio</label>
                        <textarea name="bio" cols="30" rows="10"></textarea>
                    </div>
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
                    <div class="col">
                        <label for="type" class="form-label">Cat Type</label>
                        <select name="type" id="type" class="form-select">
                            <option value="value">Select...</option>
                            <?php foreach ($types as $type) : ?>
                                <option <?= set_select('type', $row->type) ?> value="<?= $type->id ?>"><?= $type->type ?></option>
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
                        <div>Current File: <?=$row->pedigreePath?></div>
                    </div>
                    <div class="col">
                        <label for="vaccination" class="form-label">Vaccination Certificate</label>
                        <input class="form-control" type="file" name="vaccinationPath">
                        <div>Current File: <?=$row->vaccinationPath?></div>
                    </div>
                </div>
                <div class="row">
                    <input type="submit" value="Update Cat" class="m-5 btn btn-primary col">
                    <a href="<?= ROOT ?>/cats/list" class="btn btn-outline-primary m-5 col">Cancel</a>
                </div>
            </form>
        </div>

        <!--===============================
        =        Single Cat View Area     =
        ================================-->
    <?php elseif ($action == 'views') : ?>

        <section class="section bg-gray">
            <!-- Container Start -->
            <div class="container">
                <div class="row">
                    <!-- Left sidebar -->
                    <div class="col-md-8">
                        <div class="product-details">
                            <h1 class="product-title"><?= $row->name ?></h1>
                            <div class="product-meta">
                                <ul class="list-inline">
                                    <li class="list-inline-item"><i class="fa fa-user-o"></i> By <a href=""><?= $row->user_row->firstname ?></a></li>
                                    <li class="list-inline-item"><i class="fa fa-folder-open-o"></i> Breed<a href=""><?= $row->breed ?></a></li>
                                    <li class="list-inline-item"><i class="fa fa-cat"></i> Type<a href=""><?= $row->type ?></a></li>
                                </ul>
                            </div>

                            <!-- product slider -->
                            <img src="<?= get_image($row->image) ?>" alt="" class="rounded mt-3 ml-5 mb-0 pb-0">
                            <!-- product slider -->

                            <div class="content">
                                <ul class="nav nav-pills  justify-content-center" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Cat Bio</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Cat Details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Papers</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                        <h3 class="tab-title">Cat Bio</h3>
                                        <p><?=$row->bio?></p>

                                    </div>
                                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                        <h3 class="tab-title">Cat Details</h3>
                                        <table class="table table-bordered product-table">
                                            <tbody>
                                                <tr>
                                                    <td>Name</td>
                                                    <td><?= $row->name ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Added</td>
                                                    <td><?= $row->dateCreated ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Type</td>
                                                    <td><?= $row->type ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Birthday</td>
                                                    <td><?= $row->birthDate ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Sex</td>
                                                    <td><?= $row->sex_row->sex ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Registration Number</td>
                                                    <td><?= $row->registration ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Breeder</td>
                                                    <td><?= $row->breeder ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Sire</td>
                                                    <td><?= $row->sire ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Dam</td>
                                                    <td><?= $row->dam ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Breed</td>
                                                    <td><?= $row->breed ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Colour</td>
                                                    <td><?= $row->colour ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                        <h3 class="tab-title">Vaccination Papers</h3>
                                        <div class="product-review">
                                            <div class="media">
                                                <div class="media-body">
                                                    <div class="review-comment">
                                                        <iframe src="<?=ROOT?>/<?=$row->vaccinationPath?>#toolbar=0" width="100%" height="500px" frameborder="0"></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                            <h3>Pedigree Papers</h3>
                                            <div class="media">
                                                <div class="media-body">
                                                    <div class="review-comment">
                                                        <iframe src="<?=ROOT?>/<?=$row->pedigreePath?>#toolbar=0" width="100%" height="500px" frameborder="0"></iframe>
                                                    </div>
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
                                
                                <h2 class="text-white h2">Level</h2>
                                <i class="fa-solid fa-award text-white h1"></i>
                                <p><?=$row->level_row->level?></p>
                            </div>
                            <!-- User Profile widget -->
                            <div class="widget user text-center">
                                <img class="rounded-circle img-fluid mb-5 px-5" src="<?=ROOT?>/<?=$row->user_row->image?>" alt="">
                                <h4><a href=""><?=$row->user_row->name?></a></h4>
                                <p class="member-time">Member Since <?=$row->user_row->created?></p>
                                <a href="">See all cats</a>
                                
                            </div>
                            <!-- Map Widget -->
                            <div class="widget map">
                                <div class="map">
                                    <div id="map_canvas" data-latitude="51.507351" data-longitude="-0.127758"></div>
                                </div>
                            </div>
                            

                        </div>
                    </div>

                </div>
            </div>
            <!-- Container End -->
        </section>
       

        <!--===============================
    =           Cat List Area     =
    ================================-->
    <?php elseif ($action == 'list') : ?>
        
        <section class="section-sm">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="search-result bg-gray row">
                            <div class="col-9">
                                <h2>My Cats</h2>
                                <p><?= Date('jS M Y') ?></p>
                            </div>
                            <div class="col-3 m-0 w-100">
                                <div class="col-md-6">
                                    <div class="view btn btn-primary">
                                        <div class="row">
                                            <a href="<?= ROOT ?>/cats/add">
                                                <ul class="list-inline view-switcher">
                                                    <li class="list-inline-item">
                                                        <i class="fa fa-plus pt-1 text-white"></i>
                                                    </li>
                                                </ul>
                                                <strong>Add Cat</strong>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-4">
                        <div class="category-sidebar">
                            <div class="widget filter">
                                <h4 class="widget-header">Show Produts</h4>
                                <select>
                                    <option>Popularity</option>
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
                                <a href="<?= ROOT ?>/cats/views/<?= $row->id ?>">
                                <!-- cat list  -->
                                <div class="ad-listing-list mt-20">
                                    <div class="row p-lg-3 p-sm-5 p-4">
                                        <div class="col-lg-4 align-self-center">
                                            <a href="<?= ROOT ?>/cats/views/<?= $row->id ?>">
                                                <img src="<?= get_image($row->image)?>" class="img-fluid" alt="" role="button">
                                            </a>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-10">
                                                    <div class="ad-listing-content">
                                                        <div>
                                                            <a href="<?= ROOT ?>/cats/views/<?= $row->id ?>" class="font-weight-bold"><?= $row->name ?></a>
                                                        </div>
                                                        <ul class="list-inline mt-2 mb-3">
                                                            <li class="list-inline-item"><a href="<?= ROOT ?>/cats/views/<?= $row->id ?>"> <i class="fa-solid fa-blender p-1"></i> <?= $row->breed ?></a>
                                                            </li>
                                                            <li class="list-inline-item"><a href="<?= ROOT ?>/cats/views/<?= $row->id ?>"><i class="fa fa-calendar p-1"></i><?= $row->birthDate ?></a>
                                                            </li>
                                                            <li class="list-inline-item"><a href="<?= ROOT ?>/cats/views/<?= $row->id ?>"><i class="fa-solid fa-cat p-1"></i><?= $row->sex ?></a></li>
                                                        </ul>
                                                        <p class="pr-5">This is the page, consectetur adipisicing elit.
                                                            Explicabo, aliquam!</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 align-self-center">

                                                    <div class="product-ratings float-lg-right pb-3 mr-4">
                                                        <ul class="list-inline">
                                                            <a href="<?= ROOT ?>/cats/edit/<?= $row->id ?>">
                                                                <i class="fa-solid fa-pen-to-square text-success"></i>
                                                            </a>
                                                            <a href="<?= ROOT ?>/cats/delete/<?= $row->id ?>" class="ml-3">
                                                                <i class="fa-solid fa-trash-can text-danger"></i>
                                                            </a>

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </a>
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


        <!--===============================
    =           My Cats Area     =
    ================================-->
    <?php else : ?>
        <div></div>
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

<!--============================
=       Java Scripts           =
=============================-->
<script>
    function getColourByBreed() {
        let breed = document.querySelector('#breed_list').value
        let colour_list = document.querySelector('#colour_list')
    }

    function load_image(file) {
        document.querySelector('.js-filename').innerHTML = 'Selected File:' + file.name;

        let mylink = URL.createObjectURL(file);
        document.querySelector('.js-image-preview').src = mylink;
    }
</script>