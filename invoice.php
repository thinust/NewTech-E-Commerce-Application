<!DOCTYPE html>
<html lang="en">

<head>
    <title>New Tech | Invoice</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="res/logo3.png" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />

</head>

<body class="mt-2" style="background-color: #f7f7ff;">

    <div class="container-fluid">
        <div class="row">

            <?php include "header.php";

            require "connection.php";

            // if (isset($_SESSION["u"])) {


                $umail = $_SESSION["u"]["email"];

                $user_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $umail . "'");
                $user_data = $user_rs->fetch_assoc();

                $oid = $_GET["id"];

            ?>

                <div class="col-12">
                    <hr>
                </div>

                <div class="col-12 btn-toolbar justify-content-end">
                    <button class="btn btn-dark me-2" onclick="printInvoice()"><i class="bi bi-printer-fill"></i> Print</button>
                </div>

                <div class="col-12">
                    <hr>
                </div>

                <div class="col-12" id="page">
                    <div class="row">

                        <div class="col-6">
                            <div class="ms-5 invoiceHeaderImage"></div>
                        </div>

                        <div class="col-6">
                            <div class="row">

                                <div class="col-12 text-primary text-decoration-underline text-end">
                                    <span class="text-lg-start title01">
                                        <img src="res/logo2.png" style="height: 80px; cursor: pointer;" onclick="himg();">
                                    </span>
                                </div>

                                <div class="col-12 fw-bold text-end">
                                    <span>94,Kesbewa,piliyandala</span><br>
                                    <span>+94 112 234567</span><br>
                                    <span>newtech@gmail.com</span>
                                </div>

                            </div>
                        </div>

                        <div class="col-12">
                            <hr class="border border-1 border-primary">
                        </div>

                        <div class="col-12 mb-4">
                            <div class="row">

                                <div class="col-6">
                                    <h5>INVOICE TO : </h5>
                                    <?php

                                    $address_rs = Database::search("SELECT * FROM `user_has_address` WHERE `users_email`='" . $umail . "'");
                                    $address_data = $address_rs->fetch_assoc();


                                    $city_rs = Database::search("SELECT * FROM `city` WHERE `id`='" . $address_data["city_id"] . "'");
                                    $city_data = $city_rs->fetch_assoc();

                                    ?>
                                    <h2><?php echo $user_data["first_name"] . " " . $user_data["last_name"]; ?></h2>
                                    <span><?php echo $address_data["line_1"] . ", " . $address_data["line_2"] . ", " . $city_data["name"]; ?></span><br>
                                    <span><?php echo $umail; ?></span>
                                </div>

                                <?php

                                $invoice_rs = Database::search("SELECT * FROM `invoice` WHERE `order_id`='" . $oid . "'");
                                $invoice_data = $invoice_rs->fetch_assoc();

                                ?>

                                <div class="col-6 text-end mt-4">
                                    <h1 class="text-primary">INVOICE 0<?php echo $invoice_data["id"]; ?></h1>
                                    <span class="fw-bold">Date & Time of Invoice : </span>&nbsp;
                                    <span class="fw-bold"><?php echo $invoice_data["date"]; ?></span>
                                </div>

                            </div>
                        </div>

                        <div class="col-12">
                            <table class="table">
                                <thead>

                                    <tr class="border border-1 border-white">
                                        <th>#</th>
                                        <th>Order ID & Product</th>
                                        <th class="text-end">Unit Price</th>
                                        <th class="text-end">Quantity</th>
                                        <th class="text-end">Total</th>
                                    </tr>

                                </thead>

                                <?php
                                
                                // for ($i=0; $i < ; $i++) { 
                                //     # code...
                                // }

                                ?>

                                <tbody>
                                    <tr style="height: 72px;">
                                        <td class="bg-warning text-white fs-3 "><?php echo $invoice_data["id"]; ?></td>
                                        <td>
                                            <span class="fw-bold text-primary text-decoration-underline p-2"><?php echo $oid; ?></span><br>
                                            <?php

                                            $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $invoice_data["product_id"] . "'");
                                            $product_data = $product_rs->fetch_assoc();

                                            ?>
                                            <span class="fw-bold fs-3 text-primary  p-2"><?php echo $product_data["title"]; ?></span>
                                        </td>
                                        <td class="fw-bold fs-6 text-end pt-3 bg-secondary text-white">Rs. <?php echo $product_data["price"]; ?> .00</td>
                                        <td class="fw-bold fs-6 text-end pt-3"><?php echo $invoice_data["qty"]; ?></td>
                                        <td class="fw-bold fs-6 text-end pt-3 bg-warning text-white">Rs. <?php echo $invoice_data["total"]; ?> .00</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <?php


                                    $delivery = 0;
                                    if ($city_data["district_id"] == 1) {
                                        $delivery = $product_data["deliver_fee_colombo"];
                                    } else {
                                        $delivery = $product_data["deliver_fee_other"];
                                    }

                                    $t = $invoice_data["total"];
                                    $g = $t - $delivery;

                                    ?>
                                    <tr>
                                        <td colspan="3" class="border-0"></td>
                                        <td class="fs-5 text-end">SUBTOTAL</td>
                                        <td class="text-end">Rs. <?php echo $g; ?> .00</td>
                                    </tr>


                                    <tr>
                                        <td colspan="3" class="border-0"></td>
                                        <td class="fs-5 text-end border-primary">Delivery Fee</td>
                                        <td class="text-end border-primary">Rs. <?php echo $delivery; ?> .00</td>
                                    </tr>

                                    <tr>
                                        <td colspan="3" class="border-0"></td>
                                        <td class="fs-5 text-end border-primary text-primary fw-bold">Grand Total</td>
                                        <td class="fs-5  text-end border-primary text-primary fw-bold">Rs. <?php echo $t; ?> .00</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <div class="col-4 text-center" style="margin-top: -100px;">
                            <span class="fs-1 fw-bold text-success">Thank You!</span>
                        </div>

                        <div class="col-12 mt-3 mb-3 border-0 border-start border-5 border-primary rounded" style="background-color: #e7f2ff;">

                            <div class="row">
                                <div class="col-12 mt-3 mb-3">
                                    <label class="form-label fw-bold fs-5">NOTICE : </label>
                                    <label class="form-label fs-6">Purchsed items can return befor 7 days of Delivery. </label>
                                </div>
                            </div>

                        </div>

                        <div class="col-12">
                            <hr class="border border-1 border-primary">
                        </div>

                        <div class="col-12 text-center mb-3">
                            <label class="form-label fs-5 text-black-50 fw-bold">Invoice was created on a computer and is valid without the Signature and Seal.</label>
                        </div>

                    </div>
                </div>
            <?php
            // }
            ?>
        </div>
    </div>

    <Script src="script.js"></Script>
</body>

</html>