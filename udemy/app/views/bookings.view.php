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
    =         Search Bar Area         =
    ================================-->

    <?php $this->view('includes/searchbar', $data) ?>


    <!--=====================================================================
    =                            Main Content Area                          =
    =======================================================================-->

    <div class="container rounded shadow-sm mt-3 mb-3">
        <div class="pb-3">

            <form method="POST">
                <legend class="h1 text-center pt-3">Enter Show</legend>
                <div class="row">
                    <div class="col">

                    </div>
                    <div class="col">
                        <label for="">Event</label>
                        <div id="showTitle"><?= $row->showTitle ?></div>
                        <div>Tickets Remaining: <?= $row->entryTicketCount ?></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col"></div>
                </div>
                <h2 class="h2 text-center pt-4">Tickets</h2>
                <div class="row my-3">
                    <div class="col">
                        Entry
                    </div>
                    <div class="col">
                        <div class="row">
                            $<h4 id="first-entry"><?= $row->entryTicketPrice ?></h4>
                        </div>
                    </div>
                    <div class="col">
                        <input type="checkbox" id="entryQty" onchange="subTotalEntry()" required>
                    </div>

                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <label for="entryTotal">Total</label>
                            </div>
                            <div class="col">
                                <h4 id="entryTotal"></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="cat" class="form-label">Select Cat</label>
                        <select name="cat_id" id="firstCat" class="form-select" required>
                            <option value="">Select Cat...</option>
                            <?php if ($rows) : ?>
                                <?php foreach ($rows as $ro) : ?>
                                    <option value="<?= $ro->id ?>"><?= $ro->name ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="col">
                        <label for="firstCageSize">Select Cage Size</label>
                        <select name="firstCageSize" id="firstCageSize" onchange="subTotalEntry()" required>
                            <option value=""> Select... </option>
                            <option value="small">Small $<?= $row->smallCagePrice ?></option>
                            <option value="large">Small $<?= $row->largeCagePrice ?></option>
                        </select>
                    </div>
                </div>

                <div class="row my-3">
                    <div class="col">
                        Second Entry
                    </div>
                    <div class="col">
                        <div class="row">
                            $<h4 id="second-entry"><?= $row->secondEntryTicketPrice ?></h4>
                        </div>
                    </div>
                    <div class="col">
                        <input type="checkbox" id="qty2" name='second_cat' onchange="subTotalSecondEntry(), secondCat()">
                    </div>

                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <label for="subTotal1">Total</label>
                            </div>
                            <div class="col">
                                <h4 id="secondEntryTotal"></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-3 d-none secondCat" id="secondCat">

                    <div class="col">
                        <label for="cat" class="form-label ">Select Cat</label>
                        <select name="second_cat_id" id="extraCat" class="form-select">
                            <option value="">Select Cat...</option>
                            <?php if ($rows) : ?>
                                <?php foreach ($rows as $ro) : ?>
                                    <option value="<?= $ro->id ?>"><?= $ro->name ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>

                    <div class="col">
                        <label for="secondEntryCage">Select Cage Size</label>
                        <select name="secondCageSize" id="secondCageSize" onchange="subTotalSecondEntry()">
                            <option value="">Select...</option>
                            <option value="small">Small $<?= $row->smallCagePrice ?></option>
                            <option value="large">Large $<?= $row->largeCagePrice ?></option>
                        </select>
                    </div>
                </div>
                <!-- <div class="row my-3">
                    <div class="col">
                        Small Cage
                    </div>
                    <div class="col"> -->
                <h4 id="small-cage" hidden><?= $row->smallCagePrice ?></h4>
                <!-- </div>
                    <div class="col">
                        <input type="checkbox" id="smCage" name="smallCage" onchange="subTotalSmCage()">
                    </div>

                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <label for="subTotal1" class="form-label">Total</label>
                            </div>
                            <div class="col">
                                <h4 id="smCageTotal"></h4>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- <div class="row my-3" id="largeCageRow">
                    <div class="col">
                        Large Cage
                    </div>
                    <div class="col"> -->
                <h4 id="large-cage" hidden><?= $row->largeCagePrice ?></h4>
                <!-- </div>
                    <div class="col">
                        <input type="checkbox" id="lrgCage" name="largeCage" onchange="subTotalLargeCage()">
                    </div> -->

                <!-- <div class="col">
                        <div class="row">
                            <div class="col">
                                <label for="subTotal1" class="form-label">Total</label>
                            </div>
                            <div class="col">
                                <h4 id="largeCageTotal"></h4>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="row my-3">
                    <div class="col">
                        Catalogue
                    </div>
                    <div class="col">
                        <div class="row">
                            $<h4 id="catalogue"><?= $row->cataloguePrice ?></h4>
                        </div>
                    </div>
                    <div class="col">
                        <input type="checkbox" id="catalogueCheck" name="catalogue" onchange="subTotalCatalogue()">
                    </div>

                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <label for="subTotal1">Total</label>
                            </div>
                            <div class="col">
                                <h4 id="catalogueTotal"></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col">
                        Raffle Ticket
                    </div>
                    <div class="col">
                        <div class="row">
                            $<h4 id="raffle"><?= $row->rafflePrice ?? 0 ?></h4>
                        </div>
                    </div>
                    <div class="col">
                        <div>Raffle Tickets Remaining: <?= $row->raffleTicketCount ?></div>
                    </div>
                    <div class="col">
                        <label for="qty" class="form-label">Quantity</label>
                        <input type="text" name="raffleQty" id="qtyRaffle" class="form-input" value="<?= set_value('raffleQty') ?>" oninput="subTotalRaffle()">
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <label for="subTotal1">Total</label>
                            </div>
                            <div class="col">
                                <h4 id="raffleTotal">0</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col">
                        <h3></h3>
                    </div>
                    <div class="col">
                        <h3></h3>
                    </div>
                    <div class="col">
                        <h3>Grand Total</h3>
                    </div>
                    <div class="col">
                        $<h4 type="text" id="grandTotal" class="text-right fs-3" readonly></h4>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col">
                        <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="secondCatRequired()">
                            Check Out
                        </button>
                    </div>
                    <div class="col">
                        <a href="<?= ROOT ?>/shows" class="btn btn-outline-primary">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

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

<script>
    function subTotalEntry() {
        let price = document.getElementById('first-entry').innerHTML;
        let qty = document.getElementById('entryQty').checked;
        let total = document.getElementById('entryTotal');
        let cageSize = document.getElementById('firstCageSize').value;
        let smCagePrice = document.getElementById('small-cage').innerHTML;
        let lrgCagePrice = document.getElementById('large-cage').innerHTML;
        if (qty && cageSize == 'small') {
            total.innerHTML = price * qty + smCagePrice * 1;
        } else if (qty && cageSize == 'large') {
            total.innerHTML = price * qty + lrgCagePrice * 1;
        } else {
            total.innerHTML = price * qty
        }
        grandTotal();

    }

    function subTotalSecondEntry() {
        let price = document.getElementById('second-entry').innerHTML;
        let qty = document.getElementById('qty2').checked;
        let total = document.getElementById('secondEntryTotal');
        let cageSize = document.getElementById('secondCageSize').value;
        let smCagePrice = document.getElementById('small-cage').innerHTML;
        let lrgCagePrice = document.getElementById('large-cage').innerHTML;

        if (qty && cageSize == 'small') {
            total.innerHTML = price * qty + smCagePrice * 1;
        } else if (qty && cageSize == 'large') {
            total.innerHTML = price * qty + lrgCagePrice * 1;
        } else {
            total.innerHTML = price * qty
        }
        grandTotal();
    }

    function subTotalCatalogue() {
        let price = document.getElementById('catalogue').innerHTML;
        let qty = document.getElementById('catalogueCheck').checked;
        let total = document.getElementById('catalogueTotal');
        total.innerHTML = price * qty;
        grandTotal();
    }

    function subTotalRaffle() {
        let price = document.getElementById('raffle').innerHTML;
        let qty = document.getElementById('qtyRaffle').value;
        let total = document.getElementById('raffleTotal');
        total.innerHTML = price * qty;
        grandTotal();
    }

    function grandTotal() {

        let entryTotal = document.getElementById('entryTotal').innerHTML;
        let secondEntryTotal = document.getElementById('secondEntryTotal').innerHTML;
        let catalogueTotal = document.getElementById('catalogueTotal').innerHTML;
        let raffleTotal = document.getElementById('raffleTotal').innerHTML;
        let grandTotal = document.getElementById('grandTotal');
        grandTotal.innerHTML = entryTotal*1 + secondEntryTotal*1 + catalogueTotal*1 + raffleTotal*1;
    }

    function secondCat() {
        let on = document.getElementById('qty2').checked;
        if (on) {
            document.getElementById("secondCat").classList.remove('d-none');
            document.getElementById("extraCat").setAttribute("required", "");
            document.getElementById("secondCageSize").setAttribute("required", "");
        } else {
            document.getElementById("secondCat").classList.add('d-none');
        }
    }

    function secondCatRequired() {
        let checked = document.getElementById('qty2').checked;
        let secondCat = document.getElementById('extraCat').value;
        let firstCat = document.getElementById('firstCat').value;
        if (checked && !secondCat) {
            alert('Please select second cat & cage size - The page will now reload for security reasons');
        } else if (firstCat == secondCat) {
            alert('Cannot enter the same cat twice')
        }
    }
</script>