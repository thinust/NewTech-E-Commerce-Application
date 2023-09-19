<?php

require "connection.php";

if (isset($_GET["id"])) {

    $pid = $_GET["id"];

    $product_rs = Database::search("SELECT product.id,product.category_id,product.model_has_brand_id,product.title,product.color_id,product.price,product.qty,product.description,
    product.condition_id,product.status_id,product.users_email,model.name AS mname, brand.name AS bname FROM product INNER JOIN model_has_model ON model_has_model.id=product.model_has_brand_id
    INNER JOIN brand ON brand.id=model_has_model.brand_id  INNER JOIN model ON model.id=model_has_model.model_id WHERE product.id='" . $pid . "'");

    $product_num = $product_rs->num_rows;

    if ($product_num == 1) {

        $product_data = $product_rs->fetch_assoc();


?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <title>New Tech | Single Product</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1" />
            <link rel="icon" href="res/logo3.png" />

            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
            <link rel="stylesheet" href="bootstrap.css">
            <link rel="stylesheet" href="style.css">
        </head>

        <body class="body">
            <?php require "header.php"; ?>
            <div class="p-5">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="product-images">
                            <?php

                            $product_img_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $pid . "'");

                            $product_img_num = $product_img_rs->num_rows;

                            $product_img_data = $product_img_rs->fetch_assoc();

                            ?>
                            <div class="bg-white text-center"><img src="<?php echo $product_img_data['name']; ?>" name="image_src" class="product-main-img img-thumbnail"></div>

                        </div>
                    </div>


                    <div class="col-sm-6">
                        <div class="product-inner">
                            <div class="row">
                                <form autocomplete="off" action="checkout-charge.php?id=<?php echo $_GET["id"]; ?>" method="POST">
                                    <h2 class="product-name" name="product_name"><?php echo $product_data["title"]; ?></h2>
                                    <div class="product-inner-price">
                                        <ins class="fs-4" name="amount">Rs. <?php echo $product_data["price"]; ?> .00</ins><br>
                                        <span class="fs-4 fw-bold"> Save - </span> <span class="text-danger fs-3"> 5%</span><br>
                                        <span class="text-secondary fs-5">In Stock : <?php echo $product_data["qty"]; ?> Items</span>
                                    </div>

                                    <?php

                                    if ($product_data["qty"] <= 0) {
                                    ?>

                                        <button class="buynowbtn col-5 fw-bold " disabled>Buy Now</button>
                                        <a tabindex="-1" class="btn btn-warning col-5 addtocartbtn fw-bold ">Add To Cart</a>

                                    <?php
                                    } else {
                                    ?>
                                        <div class="col-12 mt-4 text-lg-start text-center">

                                            <button class="buynowbtn stripe-button col-5 fw-bold" data-key="pk_test_51MMyUbArcnel3bxZGUuIzEP3b8uS5WG845UqcRXC3oDD5nfuVgJGU1KC1eqxFS0N3RHPbZVkMol0V7svqOfyyhXN005oRH6t3W" data-amount=<?php echo str_replace(",", "", $product_data["price"]) * 100 ?> data-name="<?php echo $product_data["title"] ?>" data-description="<?php echo $product_data["mname"] ?>" data-image="<?php echo $product_img_data['name'] ?>" data-currency="lkr" data-locale="auto">Buy Now</button>
                                            <div class="d-none">

                                                <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="pk_test_51MMyUbArcnel3bxZGUuIzEP3b8uS5WG845UqcRXC3oDD5nfuVgJGU1KC1eqxFS0N3RHPbZVkMol0V7svqOfyyhXN005oRH6t3W" data-amount=<?php echo str_replace(",", "", $product_data["price"]) * 100 ?> data-name="<?php echo $product_data["title"] ?>" data-description="<?php echo $product_data["mname"] ?>" data-image="<?php echo $product_img_data['name'] ?>" data-currency="lkr" data-locale="auto">
                                                </script>
                                            </div>
                                </form>


                                <a tabindex="-1" class="btn btn-warning col-5 addtocartbtn fw-bold " onclick="wlAddtocart(<?php echo $product_data['id']; ?>);">Add To Cart</a>
                            </div>
                        <?php
                                    }

                        ?>

                        <div class="text-center">

                        </div>

                        <div>
                            <ul class="product-tab mt-5 text-lg-start">
                                <li class="active"><a>Description</a></li>
                            </ul>
                            <div class="tab-content">
                                <div role="" class="tab-pane  active">
                                    <h2>Product Brand</h2>
                                    <p class="ms-3"><?php echo $product_data["bname"]; ?></p>
                                </div>
                                <div role="" class="tab-pane  active">
                                    <h2>Product Model</h2>
                                    <p class="ms-3"><?php echo $product_data["mname"]; ?></p>
                                </div>

                                <?php

                                $color_rs = Database::search("SELECT `color`.`name` FROM `color` WHERE `id`='" . $product_data["color_id"] . "'");


                                $color_data = $color_rs->fetch_assoc();

                                ?>

                                <div role="" class="tab-pane  active">
                                    <h2>Product Color</h2>
                                    <p class="ms-3"><?php echo $color_data["name"]; ?></p>
                                </div>
                                <div role="" class="tab-pane  active">
                                    <h2>Product Other Details</h2>
                                    <p class="ms-3"><?php echo $product_data["description"]; ?></p>
                                </div>
                            </div>
                        </div>
                        </div>

                    </div>
                </div>
            </div>

            <?php

            $related_rs = Database::search("SELECT * FROM `product` WHERE `model_has_brand_id` = '" . $product_data["model_has_brand_id"] . "' AND `product`.`id` != '" . $product_data["id"] . "'  AND `qty` >= '1' AND `status_id`='1' LIMIT 6");
            $related_num = $related_rs->num_rows;

            if ($related_num == 0) {
            } else {
            ?>

                <div class="col-12 ">
                    <div class="row d-block me-0 mt-4 mb-3 border-bottom border-1 border-dark">
                        <div class="col-12">
                            <span class="fs-3 fw-bold ">Realated Items</span>
                        </div>
                    </div>
                </div>




                <div class="col-12">
                    <div class="row row-cols-1 row-cols-md-4 g-5 " id="viewarea">

                        <?php






                        for ($y = 0; $y < $related_num; $y++) {

                            $related_data = $related_rs->fetch_assoc();

                        ?>
                            <div class="col-12">
                                <div class="card itemcard" aria-hidden="true">

                                    <?php

                                    $product_img_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $related_data['id'] . "'");

                                    $product_img_num = $product_img_rs->num_rows;

                                    $product_img_data = $product_img_rs->fetch_assoc();

                                    ?>

                                    <img src="<?php echo $product_img_data["name"]; ?>" class="card-img-top img-fluid primg mt-4 " alt="..." onclick="singleProductView(<?php echo $related_data['id']; ?>);" style="cursor: pointer;" title="Buy Now">
                                    <div class="card-body">
                                        <div>
                                            <h5 class="card-title col-12">
                                                <div class="row">
                                                    <div class="col-12 ovf1">
                                                        <span><?php echo $related_data["title"]; ?></span>
                                                    </div>
                                                </div>
                                            </h5>
                                            <p class="card-text placeholder-glow">
                                            </p>
                                            <span class="col-12">Rs. <?php echo $related_data["price"]; ?> .00</span><br>
                                            <div class="row mb-4">
                                                <span class="col-9"><?php echo $related_data["qty"]; ?> Items Available</span><br>
                                                <div class="col-3 text-end">
                                                    <span class=" text-end text-danger fs-4" onclick="addwatchl(<?php echo $related_data['id']; ?>);" title="Add to Watch List"><i class="bi bi-heart-fill wlheart" style="cursor: pointer;"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <a tabindex="-1" class="btn btn-warning col-12 fw-bold" onclick="wlAddtocart(<?php echo $related_data['id']; ?>);">Add To Cart</a>
                                    </div>
                                </div>
                            </div>

                    <?php
                        }
                    }

                    ?>


                    </div>
                </div>
                </div>

                <?php require "footer.php"; ?>

                <script src="script.js"></script>
        </body>

        </html>

<?php
    } else {

        echo "Something Went Wrong....";
    }
} else {
    echo "Something Went Wrong....";
}
?>