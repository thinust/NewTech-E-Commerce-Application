<?php

require "connection.php";

$category_id = $_POST["cid"];

// echo $category_id;

$product_rs = Database::search("SELECT * FROM `product` WHERE `category_id`='" . $category_id . "' AND `qty` >= '1' and `status_id`='1'");
$product_num = $product_rs->num_rows;

for ($i = 0; $i < $product_num; $i++) {

    $product_data = $product_rs->fetch_assoc();

    $img_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $product_data["id"] . "'");
    $img_data = $img_rs->fetch_assoc();
?>

    <div class="col-12 g-4">
        <!-- <div class="card itemcard" aria-hidden="true">
            <img src="<?php echo $img_data["name"]; ?>" class="card-img-top img-fluid mt-4" alt="..." onclick="singleProductView();" style="cursor: pointer; " title="Buy Now">
            <div class="card-body">
                <div>
                    <h5 class="card-title col-12">
                        <div class="row">
                            <span class="col-9"><?php echo $product_data["title"]; ?></span>
                            <span class="col-3 text-end text-danger" onclick="addwatchl();" title="Add to Watch List"><i class="bi bi-heart-fill"></i></span>
                        </div>
                    </h5>
                    <p class="card-text placeholder-glow">
                        <span class="col-12"><?php echo $product_data["description"]; ?></span><br>
                        <!-- <span class="placeholder col-4"></span><br> -->
        <!-- <span class="col-12">Rs. <?php echo $product_data["price"]; ?> .00</span><br> -->
        <!-- <span class="placeholder col-5"></span><br> -->
        <!-- <span class="col-8"><?php echo $product_data["qty"]; ?> Items Available</span><br>
                    </p>
                </div>
                <a tabindex="-1" class="btn btn-warning col-12" onclick="wlAddtocart(<?php echo $product_data['id']; ?>);">Add To Cart</a>
            </div>
        </div>
</div> -->

        <div class="card itemcard" aria-hidden="true">
            <img src="<?php echo $img_data["name"]; ?>" class="card-img-top img-fluid primg mt-4" alt="..." onclick="singleProductView(<?php echo $product_data['id']; ?>);" style="cursor: pointer;" title="Buy Now">
            <div class="card-body">
                <div>
                    <h5 class="card-title col-12">
                        <div class="row">
                            <div class="col-12 ovf1">
                                <span><?php echo $product_data["title"]; ?></span>
                            </div>
                        </div>
                    </h5>
                    <p class="card-text placeholder-glow">
                        <!-- <div class="ovf1">
                                                <span class="col-12"><?php echo $product_data["description"]; ?></span><br>
                                            </div> -->
                    </p>
                    <span class="col-12">Rs. <?php echo $product_data["price"]; ?> .00</span><br>
                    <div class="row mb-4">
                        <span class="col-9"><?php echo $product_data["qty"]; ?> Items Available</span><br>
                        <div class="col-3 text-end">
                            <span class=" text-end text-danger fs-4" onclick="addwatchl();" title="Add to Watch List"><i class="bi bi-heart-fill wlheart" style="cursor: pointer;"></i></span>
                        </div>
                    </div>
                </div>
                <a tabindex="-1" class="btn btn-warning col-12 fw-bold homeaddcartbtn" onclick="wlAddtocart(<?php echo $product_data['id']; ?>);">Add To Cart</a>
            </div>
        </div>
    </div>

    <?php
}
