<?php require "connection.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>New Tech | Watchlist</title>
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

            $u = $_SESSION["u"]["email"];
        ?>
            <div class="row">
                <div class="col-12">

                    <div class="col-12 p-3 fs-3">
                        <span class="col-12 text-secondary footerfont">My Watchlist</span>
                    </div>

                    <?php

                    $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE `user_email`='" . $u . "'");
                    $watchlist_num = $watchlist_rs->num_rows;
                    if ($watchlist_num == 0) {

                    ?>

                        <!-- No Items -->
                        <div class="col-12 mt-5 mb-5">
                            <div class="row">
                                <div class="col-12 emptyView"></div>
                                <div class="col-12 text-center">
                                    <label class="form-label fs-1 fw-bold">You have no items in your watchlist yet.</label>
                                </div>
                                <div class="offset-lg-4 col-12 col-lg-4 d-grid mb-3">
                                    <a href="home.php" class="btn btn-warning fs-3 fw-bold">Start Shoping</a>
                                </div>
                            </div>
                        </div>
                        <!-- No Items -->

                    <?php
                    } else {

                    ?>


                        


                        <?php

                        for ($i = 0; $i < $watchlist_num; $i++) {

                            $watchlist_data = $watchlist_rs->fetch_assoc();
                            $product_id = $watchlist_data["product_id"];
                            $product_rs = Database::search("SELECT * FROM `product` WHERE `product`.`id`='" . $product_id . "'");
                            $product_data = $product_rs->fetch_assoc();

                            $address_rs = Database::search("SELECT * FROM `user_has_address` WHERE `users_email`='" . $u . "'");
                            $address_data = $address_rs->fetch_assoc();

                            $city_id = $address_data["city_id"];

                            $district_rs = Database::search("SELECT * FROM `city` WHERE `id`='" . $city_id . "'");
                            $district_data = $district_rs->fetch_assoc();
                            $district_id = $district_data["district_id"];

                            $ship = 0;


                            if ($district_id == 1) {

                                $ship = $product_data["deliver_fee_colombo"];
                            } else {
                                $ship = $product_data["deliver_fee_other"];
                            }

                        ?>

                            <div class="card mb-4 border-0 col-12 p-3">
                                <div class="row">
                                    <div class="col-md-1 p-3 ">
                                        <div class="form-check">
                                            <input class="form-check-input border-secondary" type="checkbox" id="checkBox">
                                        </div>
                                    </div>

                                    <?php

                                    $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $product_id . "'");
                                    $image_data = $image_rs->fetch_assoc();



                                    ?>

                                    <div class="col-md-3 mt-5 col-4">
                                        <img src="<?php echo $image_data["name"]; ?>" class="card-img-top" style="cursor: pointer; width: 150px;">
                                    </div>
                                    <div class="col-md-5">
                                        <div class="card-body">
                                            <div class="row">
                                                <h5 class="card-title"><span class="col-6"><?php echo $product_data["title"]; ?></span></h5>
                                                <p class="col-6 card-text">
                                                    <span class="col-7">Color : </span>

                                                    <?php

                                                    $color_rs = Database::search("SELECT `color`.`name` FROM `color` WHERE `id`='" . $product_data["color_id"] . "'");
                                                    $color_data = $color_rs->fetch_assoc();

                                              

                               

                                ?>

                                              

                                                    <span class="col-5 text-secondary"><?php echo $color_data["name"]; ?></span>
                                                </p>
                                                <p class="col-6 card-text text-end">
                                                    <span class="col-5 ">Condition : </span>

                                                    <?php

                                                    $condition_rs = Database::search("SELECT * FROM `condition` WHERE `id`='" . $product_data["condition_id"] . "'");
                                                    $condition_data = $condition_rs->fetch_assoc();

                                                    ?>

                                                    <span class="col-6 text-secondary"><?php echo $condition_data["name"] ?></span><br>
                                                </p>
                                                <p class="col-12 card-text">
                                                    <span class="col-5 ">Qty : </span>
                                                    <span class="col-6 text-secondary"><?php echo $product_data["qty"] ?> Items</span><br>
                                                </p>
                                                <p class="col-7 card-text  fs-5">
                                                    <span class="col-5 ">Item Price : </span>
                                                    <span class="col-6 text-secondary">Rs. <?php echo $product_data["price"] ?> .00</span><br>
                                                </p>
                                                <p class="col-5 card-text text-danger text-end">
                                                    <span class="col-5 ">Shipping : </span>
                                                    <span class="col-6 ">Rs. <?php echo $ship; ?> .00</span>
                                                </p>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 p-3 text-center">
                                        <button class="btn btn-warning col-lg-12 col-5 mt-lg-3" onclick="wlAddtocart(<?php echo $product_id; ?>);">Add to Cart</button>
                                        <button class="btn btn-outline-danger col-lg-12 col-3 mt-lg-3" onclick="removeWl(<?php echo $watchlist_data['id']; ?>);"><i class="bi bi-trash" style="cursor: pointer;"></i></button>
                                    </div>
                                </div>
                            </div>

                    <?php
                        }
                    }
                    ?>

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