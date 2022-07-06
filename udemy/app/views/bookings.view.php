
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
                        <label for="cat" class="form-label">Select Cat</label>
                        <select name="cat_id" id="cat_list" class="form-select" required>
                            <option value="">Select Cat...</option>
                            <?php if ($rows) : ?>
                                <?php foreach ($rows as $ro) : ?>
                                    <option value="<?= $ro->id ?>"><?= $ro->name ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="col">
                        <label for="">Event</label>
                        <div id="showTitle"><?= $row->showTitle ?></div>
                        <div>Tickets Remaining: <?=$row->entryTicketCount?></div>
                    </div>
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
                        <input type="checkbox" id="entryQty" onchange="subTotalEntry(), grandTotal()" required>
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

                <div class="row my-3">
                    <div class="col">
                        Second Entry
                    </div>
                    <div class="col">
                        $<h4 id="second-entry"><?= $row->secondEntryTicketPrice ?></h4>
                    </div>
                    <div class="col">
                        <input type="checkbox" id="qty2" name='second_cat' onchange="subTotalSecondEntry(), secondCat(), grandTotal()">
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
                <div class="row my-3">
                    <div class="col">
                        Small Cage
                    </div>
                    <div class="col">
                        $<h4 id="small-cage"><?= $row->smallCagePrice ?></h4>
                    </div>
                    <div class="col">
                        <input type="checkbox" id="smCage" name="smallCage" onchange="subTotalSmCage(), grandTotal()">
                    </div>
                    <!-- <div class="col">
                <label for="qty" class="form-label">Quantity</label>
                <input type="text" name="qty" id="qty1" class="form-input">
            </div> -->
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <label for="subTotal1" class="form-label">Total</label>
                            </div>
                            <div class="col">
                                <h4 id="smCageTotal" ></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-3" id="largeCageRow">
                    <div class="col">
                        Large Cage
                    </div>
                    <div class="col">
                        $<h4 id="large-cage"><?= $row->largeCagePrice ?></h4>
                    </div>
                    <div class="col">
                        <input type="checkbox" id="lrgCage" name="largeCage" onchange="subTotalLargeCage(), grandTotal()">
                    </div>
                    <!-- <div class="col">
                <label for="qty" class="form-label">Quantity</label>
                <input type="text" name="qty" id="qty1" class="form-input">
            </div> -->
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <label for="subTotal1" class="form-label">Total</label>
                            </div>
                            <div class="col">
                                <h4 id="largeCageTotal" ></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col">
                        Catalogue
                    </div>
                    <div class="col">
                        $<h4 id="catalogue"><?= $row->cataloguePrice ?></h4>
                    </div>
                    <div class="col">
                        <input type="checkbox" id="catalogueCheck" name="catalogue" onchange="subTotalCatalogue(), grandTotal()">
                    </div>
                    
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <label for="subTotal1">Total</label>
                            </div>
                            <div class="col">
                                <h4 id="catalogueTotal" ></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col">
                        Raffle Ticket
                    </div>
                    <div class="col">
                        $<h4 id="raffle"><?= $row->rafflePrice ?? 0?></h4>
                    </div>
                    <div class="col">
                        <div>Raffle Tickets Remaining: <?=$row->raffleTicketCount?></div>
                    </div>
                    <div class="col">
                        <label for="qty" class="form-label">Quantity</label>
                        <input type="text" name="raffleQty" id="qtyRaffle" class="form-input" oninput="subTotalRaffle(), grandTotal()">
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
        total.innerHTML = price * qty;
    }

    function subTotalSecondEntry() {
        let price = document.getElementById('second-entry').innerHTML;
        let qty = document.getElementById('qty2').checked;
        let total = document.getElementById('secondEntryTotal');
        total.innerHTML = price * qty;
    }

    function subTotalSmCage() {
        let price = document.getElementById('small-cage').innerHTML;
        let qty = document.getElementById('smCage').checked;
        let total = document.getElementById('smCageTotal');
        total.innerHTML = price * qty;
    }

    function subTotalLargeCage() {
        let price = document.getElementById('large-cage').innerHTML;
        let qty = document.getElementById('lrgCage').checked;
        let total = document.getElementById('largeCageTotal');
        total.innerHTML = price * qty;
    }

    function subTotalCatalogue() {
        let price = document.getElementById('catalogue').innerHTML;
        let qty = document.getElementById('catalogueCheck').checked;
        let total = document.getElementById('catalogueTotal');
        total.innerHTML = price * qty;
    }

    function subTotalRaffle() {
        let price = document.getElementById('raffle').innerHTML;
        let qty = document.getElementById('qtyRaffle').value;
        let total = document.getElementById('raffleTotal');
        total.innerHTML = price * qty;
    }

    function grandTotal() {
        let entryTotal = document.getElementById('entryTotal').innerHTML;
        let entryQty = document.getElementById('entryQty').checked;
        let secondEntryTotal = document.getElementById('second-entry').innerHTML;
        let secondEntryQty = document.getElementById('qty2').checked;
        let smCageTotal = document.getElementById('small-cage').innerHTML;
        let smCageQty = document.getElementById('smCage').checked;
        let largeCageTotal = document.getElementById('large-cage').innerHTML;
        let largeCageQty = document.getElementById('lrgCage').checked;
        let catalogueTotal = document.getElementById('catalogueTotal').innerHTML;
        let raffleTotal = document.getElementById('raffleTotal').innerHTML;
        let catalogueQty = document.getElementById('catalogueCheck').checked;  
        let grandTotal = entryTotal*entryQty + secondEntryTotal*secondEntryQty + smCageTotal*smCageQty + largeCageTotal*largeCageQty + catalogueTotal*catalogueQty + parseInt(raffleTotal);
        document.getElementById('grandTotal').innerHTML = grandTotal;
        console.log(document.getElementById('grandTotal').innerHTML)
    }

    function secondCat() {
        let on = document.getElementById('qty2').checked;
        if (on) {
            document.getElementById("secondCat").classList.remove('d-none');
            document.getElementById("secondCat").setAttribute("required", "");
        } else {
            document.getElementById("secondCat").classList.add('d-none');
        }
    }

    function secondCatRequired() {
        let checked = document.getElementById('qty2').checked;
        let secondCat = document.getElementById('extraCat').value;
        if(checked && !secondCat) {
            alert('Please select second cat - The page will now reload for security reasons');
        } 
    }
    
</script>