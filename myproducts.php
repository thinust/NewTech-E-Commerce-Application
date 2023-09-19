<?php
require "connection.php";

session_start();
?>

<!DOCTYPE html>

<head>
    <title>New Tech | My Product</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="res/logo3.png" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="body">

    <?php

    

    if (isset($_SESSION["a"])) {

    ?>

        <div class="container-fluid">
            <div class="row vw">

                <!-- header -->

                <div class="col-12">
                    <div class="row">

                        <div class="col-lg-9 col-12 text-center">
                            <div class="row">
                                <div class="offset-lg-4 offset-2 col-8 text-center p-3 mb-3">
                                    <span class="col-12 addprohead">Update Product</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-12 mt-lg-4 text-center">
                            <button class="btn fw-bold fs-4" onclick="myProductAddproduct();" style="background:  #C4B119;">Add Product</button>
                        </div>
                    </div>
                </div>

                <!-- header -->

                <!-- body -->

                <div class="col-12">
                    <div class="row">

                        <div class="col-12 offset-lg-1 col-lg-10 mt-3 mb-3 ">
                            <div class="row">

                                <div class="col-12">
                                    <div class="row row-cols-1 row-cols-md-4" id="viewarea">


                                        <?php


                                        $product_rs = Database::search("SELECT * FROM `product`");
                                        $product_num = $product_rs->num_rows;

                                        for ($x = 0; $x < $product_num; $x++) {

                                            $product_data = $product_rs->fetch_assoc();

                                            $img_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $product_data["id"] . "'");
                                            $img_data = $img_rs->fetch_assoc();

                                        ?>

                                            <div class="col-12 mt-3">
                                                <div class="card itemcard" aria-hidden="true">
                                                    <img src="<?php echo $img_data["name"]; ?>" class="card-img-top img primg mt-4" alt="..." style="cursor: pointer;">
                                                    <div class="card-body">
                                                        <div class="col-10 offset-1">
                                                            <h5 class="card-title col-12">
                                                                <div class="row">
                                                                    <div class="col-12 ovf1">
                                                                        <span><?php echo $product_data["title"]; ?></span>
                                                                    </div>
                                                                </div>
                                                            </h5>
                                                            <span class="col-12">Rs. <?php echo $product_data["price"]; ?> .00</span><br>
                                                            <div class="row mb-2">
                                                                <span class="col-9"><?php echo $product_data["qty"]; ?> Items Available</span><br>
                                                            </div>
                                                            <div class="form-check form-switch col-10 ">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault<?php echo $product_data["id"]; ?>" <?php if ($product_data["status_id"] == 2) {
                                                                                                                                                                                                echo "checked";
                                                                                                                                                                                            } ?> onclick="changeStatus(<?php echo $product_data['id']; ?>);">
                                                                <label class="form-check-label text-secondary fw-bold" for="flexSwitchCheckDefault<?php echo $product_data["id"]; ?>">
                                                                    <?php

                                                                    if ($product_data["status_id"] == 2) {
                                                                        echo "Active Product";
                                                                    } else {
                                                                        echo "Deactive Product";
                                                                    }

                                                                    ?>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 text-center">
                                                            <div class="row">
                                                                <a tabindex="-1" class="btn col-7 mx-3 fw-bold homeaddcartbtn mt-3" href="updateProduct.php?id=<?php echo $product_data["id"]; ?>">Update</a>
                                                                <a tabindex="-1" class="btn mx-2 col-3 fw-bold updateprodltbtn mt-3" onclick="deletemyPrd(<?php echo $product_data['id']; ?>)"><i class="bi bi-trash3-fill"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>




                                            <!-- card -->

                                        <?php

                                        }

                                        ?>
                                    </div>
                                </div>

                                <!-- card -->



                            </div>
                        </div>

                        <div class="col-12 text-center mb-3">

                            <div class="pagination">
                                <a href="#">&laquo;</a>
                                <a class="active" href="#">1</a>
                                <a href="#">2</a>
                                <a href="#">3</a>
                                <a href="#">4</a>
                                <a href="#">5</a>
                                <a href="#">&raquo;</a>
                            </div>

                        </div>

                        <!-- products -->

                    </div>
                </div>

                <!-- body -->


            </div>
        </div>
    <?php

        require "footer.php";
    } else {


        header("location:adminsignin.php");
    }
    ?>


    <script src="script.js"></script>
</body>

</html>