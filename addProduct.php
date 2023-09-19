<?php
require "connection.php";
?>

<!DOCTYPE html>

<html>

<head>
    <title>New Tech | Add Product</title>

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

            session_start();
            if (isset($_SESSION["a"])) {

            ?>

                <div class="col-12">
                    <div class="row">



                        <div class="offset-2 col-6 text-center p-3 mb-3">
                            <span class="col-12 addprohead fs-1">Add new Product</span>
                        </div>

                        <div class="col-12">
                            <div class="row">

                                <div class="col-12 offset-lg-2">
                                    <div class="row">
                                        <div class=" col-lg-6 col-12 mb-3">
                                            <select class="form-select addprofield" id="pc">
                                                <option value="0">Select Category</option>

                                                <?php

                                                $categoryrs = Database::search("SELECT * FROM `category`");
                                                $category_num = $categoryrs->num_rows;

                                                for ($x = 0; $x < $category_num; $x++) {
                                                    $category_data = $categoryrs->fetch_assoc();

                                                ?>

                                                    <option value="<?php echo $category_data["id"]; ?>"><?php echo $category_data["name"]; ?></option>

                                                <?php

                                                }

                                                ?>


                                            </select>
                                            <label class="form-label fw-bold lbl1 mx-3">Product Category</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 offset-lg-2 mt-3">
                                    <div class="row">
                                        <div class="col-lg-6 col-12 mb-3">
                                            <select class="form-select addprofield" id="pb">
                                                <option value="0">Select Brand</option>

                                                <?php

                                                $brandrs = Database::search("SELECT * FROM `brand` ORDER BY `name` ASC");
                                                $brand_num = $brandrs->num_rows;

                                                for ($y = 0; $y < $brand_num; $y++) {
                                                    $brand_data = $brandrs->fetch_assoc();

                                                ?>

                                                    <option value="<?php echo $brand_data["id"] ?>"><?php echo $brand_data["name"] ?></option>

                                                <?php
                                                }

                                                ?>

                                            </select>
                                            <label class="form-label fw-bold lbl1 mx-3">Product Brand</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 offset-lg-2 mt-3">
                                    <div class="row">
                                        <div class="col-lg-6 col-12 mb-3">
                                            <select class="form-select addprofield" id="pm">
                                                <option value="0">Select Model</option>

                                                <?php

                                                $modelrs = Database::search("SELECT * FROM `model` ORDER BY `name` ASC");
                                                $model_num = $modelrs->num_rows;

                                                for ($z = 0; $z < $model_num; $z++) {
                                                    $model_data = $modelrs->fetch_assoc();

                                                ?>

                                                    <option value="<?php echo $model_data["id"]; ?>"><?php echo $model_data["name"]; ?></option>

                                                <?php
                                                }

                                                ?>

                                            </select>
                                            <label class="form-label fw-bold lbl1 mx-3">Product Model</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 offset-lg-2 mb-3 mt-3">
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <input type="text" class="form-control addprofield" placeholder="Enter Product Title" id="title">
                                        </div>
                                        <label class="form-label fw-bold lbl1 mx-3 col-10">
                                            Product Title
                                        </label>
                                    </div>
                                </div>

                                <div class="col-12 offset-lg-2 mt-3">
                                    <div class="row">
                                        <div class="col-lg-6 col-12 mb-3">
                                            <select class="form-select addprofield" id="pcon">
                                                <option value="0">Select Product Condition</option>

                                                <?php

                                                $conditionrs = Database::search("SELECT * FROM `condition`");
                                                $condition_num = $conditionrs->num_rows;

                                                for ($z = 0; $z < $condition_num; $z++) {
                                                    $condition_data = $conditionrs->fetch_assoc();

                                                ?>

                                                    <option value="<?php echo $condition_data["id"]; ?>"><?php echo $condition_data["name"]; ?></option>

                                                <?php
                                                }

                                                ?>

                                            </select>
                                            <label class="form-label fw-bold lbl1 mx-3">Product Condition</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 offset-lg-2  mt-3">
                                    <div class="row">
                                        <div class="col-lg-6">

                                            <input type="number" class="form-control addprofield" value="0" min="0" id="qty">
                                            <label class="form-label fw-bold lbl1 mx-3">Product Quantity</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 offset-lg-2 mt-5 mb-3">
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <input type="text" class="form-control addprofield" id="pcolor" placeholder="Enter Product Color">
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
                                        <textarea class="form-control" cols="30" rows="10" id="pdesc"></textarea>
                                    </div>

                                </div>



                                <div class="col-12 offset-lg-2 mt-5">
                                    <div class="row">

                                        <div class="col-lg-6 ">
                                            <div class="input-group">
                                                <span class="input-group-text ">Rs.</span>
                                                <input type="text" class="form-control addprofield" aria-label="Amount (to the nearest rupee)" id="cost">
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
                                                        <input type="text" class="form-control addprofield" aria-label="Amount (to the nearest rupee)" id="dwc">
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
                                                        <input type="text" class="form-control addprofield" aria-label="Amount (to the nearest rupee)" id="doc">
                                                        <span class="input-group-text">.00</span>
                                                    </div>
                                                    <label class="form-label lbl1 mx-3">Delivery Cost out of Colombo</label>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>



                                <div class="col-12 offset-lg-2 mt-5">


                                    <div class="col-6">
                                        <label class="form-label fw-bold lbl1 mx-3">Add Product Image</label>
                                    </div>
                                    <input type="file" accept="img/*" class="d-none" id="imageuploder" multiple>
                                    <label for="imageuploder" class="col-6" title="Click Here To Upload Images." style="cursor: pointer;" onclick="changeProductImage();">
                                        <div class="col-12 text-center mx-3">
                                            <div class="row">

                                                <div class="col-lg-3 offset-5 offset-lg-0 col-12 border border-warning rounded">
                                                    <img class="img-fluid" src="res/thumbnail.png" id="preview0" style="width: 250px; background-position: center;">
                                                </div>


                                            </div>
                                        </div>
                                    </label>
                                    <div class="col-6 col-lg-4 offset-3 offset-lg-1 d-grid mt-3">



                                    </div>


                                </div>

                                <div class="offset-lg-1 col-lg-8 col-12 d-grid mb-3 mt-5">
                                    <button class="btn fw-bold fs-4" onclick="addproduct();" style="background:  #C4B119;">Add Product</button>
                                </div>


                            </div>
                        </div>

                    </div>

                </div>
            <?php
            } else {
                header("location:adminsignin.php");
            }
            ?>
        </div>
    </div>

    <?php

    require "footer.php";

    ?>

    <script src="script.js"></script>
</body>

</html>