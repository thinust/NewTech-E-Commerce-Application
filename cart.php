<?php require "connection.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>New Tech</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="res/logo3.png" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
</head>


<body class="body">


    <div class="container">
        <?php require "header.php";

        if (isset($_SESSION["u"])) {

            $uemail = $_SESSION["u"]["email"];

            $total = 0;
            $subtotal = 0;
            $shipping  = 0;

        ?>

            <div class="col-12 p-3 fs-3">
                <span class="col-12 text-secondary footerfont">Shopping Cart</span>
            </div>
            <div class="row">
                <div class="col-12 col-lg-8">

                    <?php

                    // $product_rs = Database::search("SELECT * FROM `product` WHERE `qty` >= '1' ");

                    $cart_rs = Database::search("SELECT * FROM `cart` WHERE `cart`.`users_email`='" . $uemail . "'  ");
                    $cart_rs1 = Database::search("SELECT * FROM `cart` JOIN `product` ON cart.product_id = product.id WHERE `cart`.`users_email`='" . $uemail . "' And `product`.`qty` >= '1' AND `product`.`status_id`='1' ");
                    $cart_num = $cart_rs->num_rows;
                    $cart_num1 = $cart_rs1->num_rows;

                    if ($cart_num == 0) {

                    ?>

                        <!-- empty -->
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 emptycart"></div>

                                <div class="col-12 text-center mb-2">
                                    <img src="res/emptycart.svg" class="img-fluid" style="height: 400px;">
                                </div>

                                <div class="col-12 text-center mb-2">
                                    <label class="form-label fs-1">You have no items in your basket.</label>
                                </div>

                                <div class="col-12 col-lg-4 offset-0 offset-lg-4 d-grid mb-4">
                                    <a href="home.php" class="btn btn-primary fs-5">Start Shopping</a>
                                </div>

                            </div>
                        </div>
                        <!-- empty -->

                    <?php

                    } else {



                    ?>

                        <div class="card mb-4 border-0" style="max-width: 750px;">
                            <div class="row g-0">
                                <div class="col-md-10 col-8 p-3">
                                    <div class="form-check">
                                        <input class="form-check-input border-secondary bg-warning" type="checkbox" id="mCheckBox" onclick="cartSAll(<?php echo $cart_num; ?>);">
                                        <label class="form-check-label text-secondary" for="mCheckBox">
                                            SELECT ALL
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-2 col-4 p-3 text-end text-danger" onclick="cartAllDelete();">
                                    <i class="bi bi-trash" style="cursor: pointer;"></i>
                                    <label class="form-check-label" style="cursor: pointer;">
                                        DELETE
                                    </label>
                                </div>
                            </div>
                        </div>



                        <?php



                        for ($i = 0; $i < $cart_num1; $i++) {

                            $cart_data = $cart_rs1->fetch_assoc();
                            $cart_data1 = $cart_rs->fetch_assoc();

                            $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $cart_data["product_id"] . "' And `qty` >= '1' ");

                            $product_data = $product_rs->fetch_assoc();

                            $discount_price =  ($product_data["price"] * 5) / 100;

                            $total = $total + (($product_data["price"] - $discount_price) * $cart_data1["qty"]);

                            $address_rs = Database::search("SELECT * FROM `user_has_address` WHERE `users_email`='" . $uemail . "'");
                            $address_data = $address_rs->fetch_assoc();

                            $city_id = $address_data["city_id"];

                            $district_rs = Database::search("SELECT * FROM `city` WHERE `id`='" . $city_id . "'");
                            $district_data = $district_rs->fetch_assoc();
                            $district_id = $district_data["district_id"];

                            $ship = 0;

                            if ($district_id == 1) {

                                $ship = $product_data["deliver_fee_colombo"];
                                $shipping = $shipping + $ship;
                            } else {
                                $ship = $product_data["deliver_fee_other"];
                                $shipping = $shipping + $ship;
                            }

                            $user_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $product_data["users_email"] . "'");
                            $user_data = $user_rs->fetch_assoc();

                        ?>

                            <div class="card mb-4 border-0" style="max-width: 750px;">
                                <div class="row g-0">
                                    <div class="col-8 p-3 ">
                                        <div class="form-check">
                                            <input class="form-check-input border-secondary bg-warning" type="checkbox" id="checkBox<?php echo $i; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-4 p-3 text-end text-danger" onclick="cartDelete(<?php echo $cart_data['id']; ?>);">
                                        <i class="bi bi-trash" style="cursor: pointer;"></i>
                                        <label class="form-check-label" style="cursor: pointer;">
                                            DELETE
                                        </label>
                                    </div>

                                    <?php

                                    $img_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $product_data["id"] . "'");
                                    $img_data = $img_rs->fetch_assoc();

                                    ?>

                                    <div class="col-md-4 col-4 mt-lg-4">
                                        <img src="<?php echo $img_data["name"] ?>" class="primg card-img-top" style="cursor: pointer;">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-body">
                                            <div class="row">
                                                <h5 class="card-title">
                                                    <span class="col-6"><?php echo $product_data["title"] ?></span>
                                                </h5>
                                                <!-- <p class="col-12 card-text">
                                                    <span class="col-7"><?php echo $product_data["description"] ?></span>
                                                </p> -->
                                                <p class="col-12 card-text text-end">

                                                    <span class="col-6 text-primary fs-4 ">Rs. <?php echo $product_data["price"] - $discount_price; ?> .00</span><br>
                                                    <span class="col-6 text-secondary fs-5 text-decoration-line-through">Rs. <?php echo $product_data["price"] ?> .00</span>
                                                </p>
                                                <div class="col-4 input-group text-center">
                                                    <button type="button" title="Down" class="btn btn-primary fs-4 col-2 input-group-text" onclick="down(<?php echo $cart_data1['id']; ?>);">-</button>
                                                    <input class="form-control btn btn-outline-primary disabled fs-4" min="1" value="<?php echo $cart_data1["qty"]; ?>" type="text" name="quantity" id="qtyCartItem<?php echo $cart_data1["id"]; ?>">
                                                    <?php
                                                    if ($product_data["qty"] <= $cart_data1["qty"]) {
                                                    } else {
                                                    ?>
                                                        <button type="button" title="Up" class="btn btn-primary fs-4 col-2 input-group-text" onclick="up(<?php echo $cart_data1['id']; ?>);">+</button>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                                <p class="col-12 text-end mt-3">
                                                    <span class="col-6 text-secondary">Delivery Fee :</span>
                                                    <span class="col-6 text-danger">Rs. <?php echo $ship; ?> .00</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    <?php
                        }
                    }

                    ?>




                </div>

                <div class="col-12 col-lg-4">
                    <div class="card mb-4 border-0" style="max-width: 750px;">
                        <div class="row g-0">
                            <div class="col-12 p-3 text-center">
                                <label class="form-label col-12 fs-4 text-info text-start">
                                    Order Summery
                                </label>
                                <label class="form-label col-4 fs-5 text-secondary text-start">
                                    Subtotal
                                </label>
                                <label class="form-label col-7 text-end fs-5">
                                    Rs. <?php echo $total; ?> .00
                                </label>
                                <label class="form-label col-4 fs-5 text-secondary text-start">
                                    Shipping Total
                                </label>
                                <label class="form-label col-7 text-end fs-5">
                                    Rs. <?php echo $shipping; ?> .00
                                </label>
                                <!-- <div class="col-12">
                                    <input class="col-8 form-label border border-2 border-warning p-1" placeholder="Voucher Code" type="text" title="Enter Your Voucher Code">
                                    <button class="col-3 btn btn-warning ">Apply</button>
                                </div> -->
                                <label class="form-label col-3 fs-5 text-start">
                                    Total
                                </label>
                                <label class="form-label text-danger col-8 text-end fs-5">
                                    Rs. <?php echo $total + $shipping; ?> .00
                                </label>
                                <!-- <button class=""></button> -->
                                <form autocomplete="off" action="checkout-charge-cart.php?price=<?php echo $total + $shipping; ?>" method="POST">
                                    <button class="stripe-button btn btn-success col-12" data-key="pk_test_51MMyUbArcnel3bxZGUuIzEP3b8uS5WG845UqcRXC3oDD5nfuVgJGU1KC1eqxFS0N3RHPbZVkMol0V7svqOfyyhXN005oRH6t3W" data-amount=<?php echo str_replace(",", "", $total + $shipping) * 100 ?> data-name="Cart" data-description="Multy Product" data-image="res\emptycart.svg" data-currency="lkr" data-locale="auto">CHECKOUT</button>
                                    <div class="d-none">

                                        <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="pk_test_51MMyUbArcnel3bxZGUuIzEP3b8uS5WG845UqcRXC3oDD5nfuVgJGU1KC1eqxFS0N3RHPbZVkMol0V7svqOfyyhXN005oRH6t3W" data-amount=<?php echo str_replace(",", "", $total + $shipping) * 100 ?> data-name="Cart" data-description="Multy Product" data-image="res\emptycart.svg" data-currency="lkr" data-locale="auto">
                                        </script>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php
        } else {
            header("location:index.php");
        }
        ?>

    </div>

    <?php require "footer.php"; ?>



    <script src="script.js"></script>
</body>

</html>