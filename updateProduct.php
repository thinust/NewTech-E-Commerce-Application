<!DOCTYPE html>

<html>

<head>
    <title>New Tech | Update Product</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="res/logo3.png" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">

</head>

<body class="body">

    <div class="container offset-lg-2">
        <div class="row gy-3">

            <?php

            require "connection.php";

            session_start();

            $id = $_GET["id"];

            if (isset($_SESSION["a"])) {

                $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $id . "'");
                $product_data = $product_rs->fetch_assoc();

            ?>

                <div class="col-12">
                    <div class="row">

                        <div class="offset-2 col-6 text-center p-3 mb-3">
                            <span class="col-12 addprohead">Update Product</span>
                        </div>

                        <div class="col-lg-12">
                            <div class="row">

                                <div class="col-12 offset-lg-2">
                                    <div class="row">
                                        <div class=" col-lg-6 col-12 mb-3">
                                            <select class="form-select addprofield" id="pc" disabled>
                                                <?php

                                                $category_rs = Database::search("SELECT * FROM `category` WHERE `id`='" . $product_data["category_id"] . "'");
                                                $category_data = $category_rs->fetch_assoc();
                                                ?>
                                                <option><?php echo $category_data["name"] ?></option>
                                            </select>
                                            <label class="form-label fw-bold lbl1 mx-3">Product Category</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 offset-lg-2 mt-3">
                                    <div class="row">
                                        <div class="col-lg-6 col-12 mb-3">
                                            <select class="form-select addprofield" id="pb" disabled>
                                                <?php

                                                $brand_rs = Database::search("SELECT * FROM `brand` WHERE `id` IN (SELECT `brand_id` FROM `model_has_model` WHERE `id`='" . $product_data["model_has_brand_id"] . "')");

                                                $brand_data = $brand_rs->fetch_assoc();
                                                ?>
                                                <option><?php echo $brand_data["name"] ?></option>
                                            </select>
                                            <label class="form-label fw-bold lbl1 mx-3">Product Brand</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 offset-lg-2 mt-3">
                                    <div class="row">
                                        <div class="col-lg-6 col-12 mb-3">
                                            <select class="form-select addprofield" id="pm" disabled>
                                                <?php
                                                $model_rs = Database::search("SELECT * FROM `model` WHERE `id` IN
                                                (SELECT `model_id` FROM `model_has_model` WHERE `id`='" . $product_data["model_has_brand_id"] . "')");

                                                $model_data = $model_rs->fetch_assoc();

                                                ?>
                                                <option><?php echo $model_data["name"]; ?></option>
                                            </select>
                                            <label class="form-label fw-bold lbl1 mx-3">Product Model</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 offset-lg-2 mb-3 mt-3">
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <input type="text" class="form-control addprofield" value="<?php echo $product_data["title"] ?>" placeholder="Enter Product Title" id="ti">
                                        </div>
                                        <label class="form-label fw-bold lbl1 mx-3 col-10">
                                            Product Title
                                        </label>
                                    </div>
                                </div>

                                <div class="col-12 offset-lg-2 mt-3">
                                    <div class="row">
                                        <div class="col-lg-6 col-12 mb-3">
                                            <select class="form-select addprofield" id="pm" disabled>
                                                <?php
                                                $conditions_rs = Database::search("SELECT * FROM `condition` WHERE `id`= '" . $product_data["condition_id"] . "'");

                                                $conditions_data = $conditions_rs->fetch_assoc();

                                                ?>
                                                <option><?php echo $conditions_data["name"]; ?></option>
                                            </select>
                                            <label class="form-label fw-bold lbl1 mx-3">Product Condition</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 offset-lg-2  mt-3">
                                    <div class="row">
                                        <div class="col-lg-6">

                                            <input type="number" class="form-control addprofield" value="<?php echo $product_data["qty"] ?>" min="0" id="qty">
                                            <label class="form-label fw-bold lbl1 mx-3">Product Quantity</label>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-12 offset-lg-2 mt-5 mb-3">
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <input type="text" class="form-control addprofield" id="pcolor" value="<?php echo $product_data["color"] ?>" disabled>
                                        </div>
                                        <label class="form-label fw-bold lbl1 mx-3 col-10">
                                            Product Color
                                        </label>
                                    </div>
                                </div>

                                <div class="col-12 offset-lg-2 mt-5">

                                    <div class="col-lg-6">
                                        <label class="form-label fw-bold lbl1 mx-3">Product Description</label>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea class="form-control" cols="30" rows="10" id="desc"><?php echo $product_data["description"]; ?></textarea>
                                    </div>

                                </div>

                                <div class="col-12 offset-lg-2 mt-5">
                                    <div class="row">

                                        <div class="col-lg-6 ">
                                            <div class="input-group">
                                                <span class="input-group-text ">Rs.</span>
                                                <input type="text" class="form-control addprofield" aria-label="Amount (to the nearest rupee)" id="cost" value="<?php echo $product_data["price"] ?>" disabled>
                                                <span class="input-group-text">.00</span>
                                            </div>
                                            <label class="form-label fw-bold lbl1 mx-3">Cost Per Item</label>
                                        </div>
                                    </div>
                                </div>



                                <div class="col-12 offset-lg-2 mt-5">
                                    <div class="row">

                                        <div class="col-12">
                                            <label class="form-label fw-bold lbl1 mx-3">Delivery Cost</label>
                                        </div>

                                        <div class="col-lg-7">
                                            <div class="row">

                                                <div class="col-10 offset-1">
                                                    <div class="input-group">
                                                        <span class="input-group-text ">Rs.</span>
                                                        <input type="text" class="form-control addprofield" aria-label="Amount (to the nearest rupee)" id="dwc" value="<?php echo $product_data["deliver_fee_colombo"] ?>">
                                                        <span class="input-group-text">.00</span>
                                                    </div>
                                                    <label class="form-label  lbl1 mx-3">Delivery Cost Within Colombo</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-7">
                                            <div class="row">

                                                <div class="col-10 offset-1">
                                                    <div class="input-group">
                                                        <span class="input-group-text ">Rs.</span>
                                                        <input type="text" class="form-control addprofield" aria-label="Amount (to the nearest rupee)" id="doc" value="<?php echo $product_data["deliver_fee_other"] ?>">
                                                        <span class="input-group-text">.00</span>
                                                    </div>
                                                    <label class="form-label lbl1 mx-3">Delivery Cost out of Colombo</label>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12 offset-lg-2 mt-5">

                                    <?php

                                    $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id` IN (SELECT `id` FROM `product` WHERE `id` = '" . $product_data["id"] . "')");

                                    $image_data = $image_rs->fetch_assoc();

                                    ?>

                                    <div class="col-6">
                                        <label class="form-label fw-bold lbl1 mx-3">Add Product Image</label>
                                    </div>
                                    <input type="file" accept="img/*" class="d-none" id="imageuploder" multiple disabled>
                                    <label for="imageuploder" class="col-6" title="Click Here To Upload Images." style="cursor: pointer;" onclick="changeProductImage();">
                                        <div class="col-12 text-center mx-3">
                                            <div class="row">

                                                <div class="col-lg-3 offset-5 offset-lg-0 col-12 border border-warning rounded">
                                                    <img class="img-fluid" src="<?php echo $image_data["name"] ?>" id="preview0" style="width: 250px; background-position: center;">
                                                </div>

                                            </div>
                                        </div>
                                    </label>
                                    <div class="col-6 col-lg-4 offset-3 offset-lg-1 d-grid mt-3">



                                    </div>


                                </div>

                                <div class="offset-lg-1 col-lg-8 col-12 d-grid mb-3 mt-5">
                                    <button class="btn fw-bold fs-4" style="background:  #C4B119;" onclick="updateProduct(<?php echo $id; ?>);">Update Product</button>
                                </div>



                            </div>
                        </div>

                    </div>
                </div>


        </div>
    </div>

<?php
            } else {

                header("location:adminsignin.php");
            }
            require "footer.php";

?>

<script src="script.js"></script>
</body>

</html>