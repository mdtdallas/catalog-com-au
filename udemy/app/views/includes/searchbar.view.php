<!--===============================
    =            Search Bar            =
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
                                    <!-- <form method="POST">
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control my-2 my-lg-1 bg-dark" id="inputtext4" placeholder="What area?" disabled>
                                            </div>
                                            
                                            <div class="form-group col-md-7">
                                                <input type="text" class="form-control my-2 my-lg-1" id="inputLocation4" placeholder="Location" name="searchLocation">
                                            </div>
                                            <div class="form-group col-md-2 align-self-center">
                                                <button type="submit" class="btn btn-primary">Search Now</button>
                                            </div>
                                        </div>
                                    </form> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php if (message()) : ?>
    <div class="alert alert-success text-center"><?= message('', true) ?></div>
<?php endif; ?>