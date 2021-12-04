<?php

session_start();

if (isset($_SESSION["LAST_ACTIVITY"])) {
    if (time() - $_SESSION["LAST_ACTIVITY"] > 60 * 60) {
        // last request was more than 30 minutes ago
        session_unset();     // unset $_SESSION variable for the run-time 
        session_destroy();   // destroy session data in storage
    } else if (time() - $_SESSION["LAST_ACTIVITY"] > 60) {
        $_SESSION["LAST_ACTIVITY"] = time(); // update last activity time stamp
    }
}

function language()
{
    if (isset($_COOKIE['lang'])) {
        echo $_COOKIE['lang'];
    } else {
        echo "ar";
    }
}
require_once('db.php');
require_once('query_functions.php');
require_once('functions.php');



//echo test();

if (!isset($_SESSION["active"])) {
    session_start();
    session_unset();
    session_destroy();
    header("location: Login.php");
}
?>


<!doctype html>

<html lang=<?php echo language(); ?>>

<head>
    <title>Sales</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/4859d08ded.js"></script>
    <link rel="stylesheet" href="font-awesome.css">
</head>

<body>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="jscript/language.js"></script>
    <script src="jscript/global.js"></script>
    <script src="jscript/trap_focus.js"></script>
    <script src="jscript/qrcode.min.js"></script>
    <script src="jscript/functions.js"></script>
    <script src="jscript/xmlRequets.js"></script>
    <script src="jscript/configuration.js"></script>
    


    <script>
        var time = new Date().getTime();
        $(document.body).bind("mousemove keypress", function(e) {
            time = new Date().getTime();
        });

        function refresh() {
            if (new Date().getTime() - time >= 1000 * 60 * 60)
                window.location.reload(true);
            else
                setTimeout(refresh, 10000);
        }

        setTimeout(refresh, 10000);
        $(document).ready(function() {

            function get_date() {
                var today = new Date();
                var dd = String(today.getDate()).padStart(2, '0');
                var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                var yyyy = today.getFullYear();

                //today = mm + '/' + dd + '/' + yyyy;
                today = yyyy + '-' + mm + '-' + dd;
                return today;
            }

            var dateControl = document.getElementById("input-date");
            dateControl.value = get_date();

            var elem = "#fprice";
            var elem2 = "#fqty";
            var elem3 = "#discount-amt";
            var value = $(elem).val();
            var value2 = $(elem2).val();
            var value3 = $(elem3).val();
            var auto = false;
            var auto2 = false;

            $(".item-buttons").on('click', function() {
                auto = false;
                auto2 = false;
                auto3 = false;
            })

            $(elem2).on('click focusout change', function(e) {

                if (e.type == "click") {
                    value2 = $(elem2).val();
                    $(elem2).val("");
                    auto2 = true;
                }
                if (e.type == "focusout") {
                    if (auto2) {
                        $(elem2).val(value2);
                    }


                }
                if (e.type == "change") {
                    auto2 = true;
                    value2 = $(elem2).val();
                }

            });

            $(elem3).on('click focusout change', function(e) {

                if (e.type == "click") {
                    value3 = $(elem3).val();
                    $(elem3).val("");
                    auto3 = true;
                }
                if (e.type == "focusout") {
                    if (auto3) {
                        $(elem3).val(value3);
                    }


                }
                if (e.type == "change") {
                    auto3 = true;
                    value3 = $(elem3).val();
                }

            });



            $(elem).on('click focusout change', function(e) {

                if (e.type == "click") {

                    value = $(elem).val();
                    $(elem).val("");
                    auto = true;
                }
                if (e.type == "focusout") {
                    if (auto) {
                        $(elem).val(value);
                    }


                }
                if (e.type == "change") {
                    auto = true;
                    value = $(elem).val();
                }

            });

        })



        function focusout(elem) {

            var val = elem.value
            var val2 = parseFloat(val).toFixed(2);
            elem.value = val2;

        }

        function switch_cash() {
            $("#received").val("0.00");
            var checked = $("#checkbox").prop("checked");

            if (checked) {
                $("#received").prop("disabled", true);

            } else if (!checked) {
                $("#received").prop("disabled", false);
            }
        }
    </script>

    <style>
        .displayNone {
            display: none !important;
        }

        .item-name {
            color: white
        }

        .list-group-item {
            /* padding: .5rem 0.5rem; */
            background: white;
        }

        .yesprint {
            display: none;
        }

        @media print {
            .noprint {
                display: none;
            }

            .print {
                display: block;
            }
        }
    </style>

    <div class="main container-fluid noprint vh-100" style="background:#204b6d">
        <div class="search-modal" id="overlay">
            <button class="btn btn-primary spinner" type="button" disabled>
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                <span class="visually-hidden">Loading...</span>
            </button>
        </div>
        <div class="modal" id="itemsModal">
            <div class="modal-dialog modal-dialog-centered" aria-modal="true">
                <div class="modal-content">
                    <div class="modal-header text-light" style="background:#204b6d">
                        <h3 class="modal-title">item description</h3>
                        <button type="button" data-dismiss="modal" class="close text-white"><span>&times;</span></button>
                    </div>
                    <!--modal-header-->
                    <div class="row modal-body justify-content-center">
                        <div class="col-3">
                            <div><label for="fprice" data-key="lng-price">Price:</label><input id="fprice" type="number" class="w-100" step="1" autofocus></input></div>

                        </div>
                        <div class="col-3">
                            <div><label for="fqty" data-key="lng-qty">Qty:</label><input id="fqty" type="number" value=1 class="w-100 fqty" step="1"></input></div>

                        </div>
                        <div class="col-1 pt-4">
                            <span id="fuom" class="modal-uom" data-key="lng-kilo"></span>
                        </div>

                        <div class="row col-5 form-check item-sizes pl-5">

                        </div>
                    </div>
                    <!--modal-body-->
                    <div class="modal-footer">
                        <button class="btn-confirm btn text-light" style="background:#204b6d" data-key="lng-add">
                            Confirm
                        </button>
                    </div>
                    <!--modal-footer-->
                </div>
                <!--modal-content-->
            </div>
            <!--modal-dialog-->
        </div>
        <!--modal-->


        <div class="modal fade" id="cash-collect">
            <div class="modal-dialog modal-dialog-centered" aria-modal="true">
                <div class="modal-content">
                    <div class="modal-header bg-white text-dark">
                        <h2 class="modal-title" data-key="lng-cr">
                        </h2>

                    </div>
                    <div class="row modal-body justify-content-center">
                        <div><input id="received" onfocusout="focusout(received)" type="number" class="w-100" step="0.01" autofocus value=0></input></div>
                        <div class="px-5 d-sm-none">
                            <label for="checkbox" class="px-2" data-key="lng-atm">Atm</label><input type="checkbox" id="checkbox" onchange="switch_cash()" unchecked></input>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn-cancel btn text-light btn-secondary" id="btn-cancel" data-key="lng-cancel">
                            Close
                        </button>
                        <button class="btn-add btn text-light btn-primary" id="btn-add" data-key="lng-enter">
                            Save changes
                        </button>
                    </div>


                </div>
            </div>
        </div>
        <div class="modal fade" id="discount-modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background:#204b6d">
                        <div class="modal-title text-light">
                            <h3 data-key="lng-disc">Discount</h3>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex justify-content-between p-1 border">
                            <label for="amt-before-total" data-key="lng-twd"></label>
                            <span class="font-weight-bold" id="amt-before-total">0.00</span>
                        </div>
                        <div class="d-flex justify-content-between p-1 border">
                            <label for="discount-total" data-key="lng-td"></label>
                            <span class="invoice-tv font-weight-bold" id="discount-total-inv">0.00</span>
                        </div>
                        <div class="pt-3">
                            <label for="discount-amt" data-key="lng-disc"></label>
                            <input type="number" class="discount-amt" id="discount-amt">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn text-light btn-primary" id="btn-discount" data-key="lng-disc2">
                            Apply Discount
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="expenses">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header text-white" style="background:#204b6d">
                        <h4 class="modal-title" data-key="lng-exp">Expenses</h4>
                        <button type="button" data-dismiss="modal" class="close text-white"><span>&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row align-items-end justify-content-center">
                            <div class="col-10 col-md-5">
                                <label for="input-date" data-key="lng-date">Date</label><br>
                                <input class="w-100" id="input-date" type="date" min="2018-01-01" max="2030-12-31" readonly>
                            </div>
                            <div class="col-10 col-md-5 pl-md-5">
                                <label for="expense" data-key="lng-cat">Category</label><br>
                                <select class="w-100" name="expenses" id="expense">

                                </select>
                            </div>

                            <div class="col-10 pt-3 justify-content-center">
                                <label for="exp-amount" data-key="lng-amt">Total</label><br>
                                <input id="exp-amount" type="number" class="w-100" step="1" autofocus></input>
                            </div>
                            <div class="col-10">
                                <label for="remarks" data-key="lng-rmk"></label><br>
                                <textarea class="w-100 p-2" type="textarea" id="remarks" style="resize:none"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">

                        <span class="valid-data" style="visibility:hidden;color:red" data-key="lng-valid"></span>
                        <button class="btn-add-exp btn text-light btn-primary" id="btn-add-exp" data-key="lng-add">
                            Add
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-md navbar-dark p-0" style="background:#204b6d">

            <a class="navbar-brand" href="#" style="color:orange">AS |</a>
            <span class="navbar-text text-white user-select-none d-none d-sm-inline" data-key="lng-logo"><strong>Meat Management |</strong> </span>
            <div class="ml-auto mr-5 dropdown">
                <span class="navbar-text dropdown-toggle" type="button" data-toggle="dropdown"><?php echo ("<p class='d-inline text-white m-0 font-weight-bold' style = 'text-transform:uppercase;' id='user-data' 
                            data-username='" . $_SESSION["name"] . "' data-uid='" . $_SESSION["uid"] . "' data-branch='" . $_SESSION["branch"] . "'>" . $_SESSION["name"] . "</p>"); ?></span>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="background:lightgray">

                    <li class="dropdown-item text-center exp-btn">
                        <i class="fa fa-cart-plus p-2"></i>
                        <span class="pl-2" data-key="lng-exp" style="user-select:none">
                            Expenses
                        </span>
                        <br>
                        <a href="./purchase.php">
                            Purchase
                        </a>

                    </li>
                    <br>
                    <li class="dropdown-item text-center p-0" style="background-color:white;cursor:default">
                        <i class="fa fa-user-times"></i>
                        <a class="text-center" href="includes/logout.inc.php" data-key="lng-log">Log out</a>
                    </li>
                </ul>
            </div>
            <button class="btn btn-primary d-md-none d-block bg-white text-dark ml-5" data-toggle="collapse" data-target="#menu" data-key="lng-item"></button>


        </nav>

        <div class="notification" style="width:250px;position:absolute;z-index:100;right:10px;bottom:30px;display:none">
            <div class="bg-success text-light">
                <h6 class="p-1">Notification</h6>
            </div>
            <div>
                <p class="notification-msg p-1 bg-white text-dark" data-key=""></p>
            </div>
        </div>

        <div class="row sales-section bg-light justify-content-around" style="height:90vh; margin:auto;background:aliceblue;">

            <div class="row col col-sm-3 d-md-flex pr-0 collapse justify-content-center justify-content-xl-around items-section" id="menu" style="overflow-x:auto;border-right:10px solid;background:aliceblue; border-color:#204b6d;min-width:200px; max-height:90vh">

                <div class="col-12 row justify-content-around" style="margin-top:5px">

                    <div class="dropdown col-12 col-xl-6 pr-1 p-0 mb-1">
                        <button class="item-dropdown  top-btns btn dropdown-toggle w-100 text-light" data-toggle="dropdown" style="background:#204b6d"><span><i class="fa fa-anchor m-icons d-none d-lg-inline"></i></span><span data-key="lng-more">More</span></button>
                        <ul class="dropdown-menu pl-2 overflow-auto w-100" role="menu" aria-labelledby="dLabel" style="max-height:80vh">

                            <?php
                            // arguements category(general or special), optional limit, optional offset, optional grid column
                            create_buttons(1, 50, 15, 11, "white", "text-black");

                            ?>

                        </ul>
                    </div>

                    <div class="dropdown col-12 col-xl-6 p-0">
                        <button class="item-dropdown top-btns btn dropdown-toggle w-100 text-light" data-toggle="dropdown" style="background:#204b6d"><span><i class="fa fa-star m-icons d-none d-lg-inline"></i></span><span data-key="lng-special">Special</span></button>
                        <ul class="dropdown-menu pl-2 overflow-auto w-100" role="menu" aria-labelledby="dLabel" style="max-height:80vh">
                            <?php
                            // arguements category(general or special), optional limit, optional offset, optional grid column
                            create_buttons(2, 50, 0, 11, "white", "text-black");
                            ?>

                        </ul>
                    </div>

                </div>


                <?php
                // arguements category(general or special), optional limit, optional offset, optional grid column
                create_buttons(1, 15, 0, 5, "white", "text-black");

                ?>


            </div>
            <!--item-section-->



            <div class="col  order-section">

                <div class="row col-12 order-buttons justify-content-center justify-content-md-between btn-group btn-group-sm bg-light w-100 mx-0" role="group" aria-label="Basic example" style="margin-top:10px">

                    <button type="button" class="top-btns new btn  col-md-2   col-3 text-light" style="background:#204b6d"><span><i class="fa fa-cart-plus m-icons"></i></span><span data-key="btn-new" class="d-none d-sm-inline">NEW</span></button>
                    <button type="button" class="top-btns clear btn col-md-2  col-3 text-light" style="background:#204b6d"><span><i class="fa fa-times m-icons"></i></span><span data-key="btn-clear" class="d-none d-sm-inline">CLEAR</span></button>
                    <button type="button" class="top-btns btn  col-md-2 save  col-3 text-light" style="background:#204b6d"><span><i class="fa fa-save m-icons"></i></span><span data-key="btn-save" class="d-none d-sm-inline">SAVE</span></button>
                    <button type="button" class="top-btns print btn  col-md-2 col-3 text-light" style="background:#204b6d"><span><i class="fa fa-print m-icons"></i></span><span data-key="btn-print" class="d-none d-sm-inline">PRINT</span></button>
                    <!-- <button type="button" class="save-print btn col-2" data-key="btn-sp"  >SAVE & PRINT</button> -->

                </div>
                <!--order-buttons-->


                <div class="row invoice noprint" style="margin-top:10px;">



                    <div class="col  items-table table-responsive" style="max-height:80vh">

                        <div class="p-2 ml-1 mb-2 items-container" style="background:#204b6d">
                            <input type="text" autocomplete="off" id="search" onkeypress="handleKey(event)" name="search" placeholder="Barcode here..">
                            <button class="ml-4" onclick="fetch_item()">Add item</button>
                            <span class="item-name ml-3 p-2" id="item-name">Item description</span>
                        </div>

                        <table id="tbody" class="noprint table  table-light table-striped table-bordered table-hover" style="visibility:hidden;">

                            <thead class="text-light noprint" style="background:#204b6d">
                                <tr>
                                    <th scope="col"><button class="btn bg-white text-dark btn-disc" data-toggle="modal" data-target="#discount-modal"><i class="fa fa-tags pr-md-2"></i><span class="d-none d-md-inline-block" data-key="lng-disc"></span></button></th>
                                    <th scope="col" class=" d-none d-lg-table-cell" data-key="lng-code">ITEM CODE</th>
                                    <th scope="col" data-key="lng-desc">ITEM DESCRIPTION</th>
                                    <th scope="col" data-key="lng-qty">QTY</th>
                                    <th scope="col" class="d-none d-xl-table-cell" data-key="lng-uom">UOM</th>
                                    <th scope="col" class="d-none d-lg-table-cell" data-key="lng-size">SIZE</th>
                                    <th scope="col" class="d-none d-sm-table-cell" data-key="lng-price">PRICE</th>
                                    <th scope="col" class="vat-display" data-key="lng-vat">VAT</th>
                                    <th scope="col" class="vat-display" data-key="lng-wvat">TOTAL(V)</th>
                                    <th scope="col" data-key="lng-total">TOTAL</th>
                                </tr>
                            </thead>
                            <tbody class="noprint">

                            </tbody>
                        </table>

                    </div>
                    <!--items-table-->

                    <div class="col-3 d-none d-md-block invoice-header overflow-auto" id="invoice-header" style="display:none;  border-left:10px solid; border-color:#204b6d;height:80vh;min-width:200px;">
                        <ul class='list-group list-group'>
                            <li class='order-user list-group-item text-light d-none d-lg-block' style="background:#204b6d" data-key="lng-orderdetails">
                                <h4>Order details</h4>
                            </li>

                            <li class='order-no list-group-item d-none' style='display:none'><b></b></li>
                            <li class='order-branch list-group-item d-none' style='display:none'>id<b><?php echo $_SESSION['branch'] ?></b></li>
                            <li class='order-branch-name list-group-item d-none d-lg-block'><span data-key="lng-branch">Branch</span><br><span id="branch-name"><b><?php echo (mysqli_fetch_all(get_branch_name($_SESSION['branch']), MYSQLI_ASSOC))[0]['name']; ?></b></span></li>
                            <li class='order-user-name list-group-item d-none d-lg-block'><span data-key="lng-user">USER:</span><br><b><?php echo $_SESSION['name'] ?></b></li>
                            <li class='order-user list-group-item d-none' style='display:none'>USER ID: <b><?php echo $_SESSION['uid'] ?></b></li>
                            <li class='order-user list-group-item active text-light' style="background:#204b6d" data-key="lng-invoicedetails">
                                <h4>Invoice details</h4>
                            </li>
                            <li class='list-group-item'><span data-key="lng-invoice"></span><br><span class="invoice-number"></span></li>
                            <li class='invoice-status list-group-item text-danger d-none'><b></b></li>
                            <li class='inv-wt list-group-item  vat-display'><span data-key="lng-wvat">TOTAL(Without VAT)</span>&#58;&nbsp;<br><span class='invoice-twv font-weight-bold'></span></li>
                            <li class='invvat list-group-item'><span data-key="lng-vat">VAT</span><br><span class='invoice-v font-weight-bold'></span></li>
                            <li class='inv-total list-group-item'><span data-key="lng-total">TOTAL</span><br /><span class='invoice-tv font-weight-bold' id="total-inv"></span></li>

                            <li class='list-group-item' style="background:#204b6d">
                                <div class='form-check-inline text-light'><input class='form-check-input text-light' type='radio' name='payment-opt' value='cash' checked><span data-key="lng-cash">cash</span></input>
                                </div>

                                <div class='form-check-inline text-light'><input class='form-check-input' type='radio' name='payment-opt' value='atm'><span data-key="lng-atm">atm</span></input>
                                </div>
                            </li>
                        </ul>
                        <div class="balance-data">
                            <br>
                            <li class='list-group-item' style="background:#204b6d"><span><span data-key="lng-cr" class="text-light">Cash Received</span><span><span class="text-light"> : </span></span><span class="invoice-cr text-light">0.00</span></span></li>
                            <li class='list-group-item' style="background:#204b6d"><span><span data-key="lng-bal" class="text-light">Balance</span><span><span class="text-light"> : </span></span><span class="invoice-balance text-light">0.00</span></span></li>
                        </div class="balance-data">
                    </div>
                    <!--invoice-header-->


                </div>
                <!--invoice-->
            </div>
            <!--order-section-->


        </div>
        <!--sales-section-->

        <footer class="text-center text-lg-start fixed-bottom" style="background:#204b6d">

            <div class="text-center text-light noprint " style="background-color: rgba(0, 0, 0, 0.2)">
                <span class="internet-status d-none d-sm-inline-block"></span>
                <span class="language ml-3 d-none d-sm-inline-block" style="float:left">
                    <a href="" class="en lang-selected pr-2" onclick="lang_change('en')">EN</a>
                    |<a href="" class="ar pl-2" onclick="lang_change('ar')">AR</a></span>
                <span class="ml-sm-5 d-none" style="float:left">
                    <span>Discount</span>
                    <span id="discount-given">0.00</span>
                </span>
                <span class="float-right pr-5 d-md-none">
                    <span data-key="lng-invoice"></span>
                    <span class="invoice-number" id="mb-invoice"></span>
                    <span>-</span>
                    <span data-key="lng-total">Total</span>
                    <span class='invoice-tv font-weight-bold'></span>
                </span>
            </div>
        </footer>
    </div>
    <!--main-->

    <div class="ticket print yesprint" id="print-div">

        <script>


        </script>
        <p class="centered">
            <b> <span style="font-size: 28px;"> مؤسسة صفاء سعيد عويضة </span> </b> <br /><br />

            <span> فرع - </span> <span class="print-branch-name"></span> <!-- - <span class="print-branch-number"></span> --> <br /> <br />

        </p>

        <!--
                      <span> 0504675794 </span> -  <span> رقم الجوال </span> <br/><br/> 
                     <span> 0505157232  </span> -  <span> رقم الجوال </span> <br/><br/> 
                   -->

        <center>

            <table cellpadding="5" id="totalAmountTable">

                <tbody>
                    <tr>
                        <td style="border:1px solid black;"> <span> 0504675794 </span> </td>
                        <td rowspan="2" style="font-size:20px"> <b> <span> <i class="fa fa-phone" style="font-size:36px"></i> <br /> رقم الجوال </span> </b> </td>
                    </tr>

                    <tr>
                        <td style="border:1px solid black;"> <span> 0505157232 </span> </td>

                    </tr>


                </tbody>

            </table>

        </center>

        <br />
        <p class="centered">
            <span> (30030208860003) - الرقم الضريبي </span> <br /><br />

            <b> <span style="font-size: 28px; border:2px solid black; padding:5px;">
                    <span> رقم الفاتورة </span><span class="print-invoice-number"></span>
                </span> </b> <br /><br />
            <span> أمين الصندوق : </span><span class="print-username"></span> <br /><br />
            <span class="print-date"></span><span> : تاريخ </span>

        </p> <br /><br />

        <table id="itemsTables">
            <thead>
                <tr>
                    <th class="serial">#</th>
                    <th class="description">الصنف</th>
                    <th class="quantity">الكمية</th>
                    <th class="price">السعر</th>
                </tr>
            </thead>
            <tbody id="tbody-print">

            </tbody>
        </table>


        <br /><br />

        <center>

            <table id="totalAmountTable">

                <tbody>
                    <tr>
                        <td> <span> ريال </span><span class="print-twv"></span> </td>
                        <td> <b> <span> المجموع </span> </b> </td>
                    </tr>
                    <tr>
                        <td> <span> ريال </span><span class="print-vat"></span> </td>
                        <td> <b> <span>%</span><span><?php echo ((mysqli_fetch_all(get_vat(), MYSQLI_ASSOC))[0]['tax_value']) * 100; ?></span><span> ضريبة</span> </b> </td>
                    </tr>
                    <tr>
                        <td> <span> ريال </span><span class="print-before-total"></span> </td>
                        <td> <b> <span> مجموع </span> </b> </td>
                    </tr>
                    <tr>
                        <td> <span> ريال </span><span class="" id="print-discount-given"></span> </td>
                        <td> <b> <span> خصم </span> </b> </td>
                    </tr>
                    <tr>
                        <td> <span> ريال </span><span class="print-invoice-total"></span> </td>
                        <td> <b> <span> المجموع بعد الخصم </span> </b> </td>
                    </tr>
                    <tr>
                        <td> <span> ريال </span><span class="print-cash-received"></span> </td>
                        <td> <b> <span> المبلغ المستلم </span> </b> </td>
                    </tr>

                    <tr>

                        <td> <span> ريال </span><span class="print-cash-balance"></span> </td>
                        <td> <b> <span> المتبقي </span> </b> </td>
                    </tr>
                </tbody>

            </table>

        </center>

        <br /><br />

        <p class="centered">

            <span style="font-size: 28px;"> شامل القيمة المضافة </span> <br /><br />
            <span style="font-size: 24px;"> شكرلك على زيارتنا </span> <br /><br />
            <span style="font-size: 22px;"> قيم تجربتك معنا اليوم </span> <br /><br />


        </p>
        <br>
        <div class="centered" id="qrcode">


        </div>

        <br /><br /><br /><br />
        <button id="btnPrint" class="hidden-print">Print</button>

    </div>
    <script>
       
    </script>
</body>

</html>