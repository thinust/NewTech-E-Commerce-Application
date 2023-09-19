<?php
require "connection.php";


?>

<!DOCTYPE html>

<head>
    <title>New Tech | Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="res/logo3.png" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
</head>

<body class="body">

    <main class="my-5">
        <div class="container">
            <?php require "header.php";

            if (isset($_SESSION["u"])) {
                $pageno;

            ?>
                <div class="col-12 mb-5">
                    <div class="row">
                        <div class="col-lg-10 col-12 d-flex">
                            <!-- <form class="d-flex" role="search"> -->
                                <input class="form-control mx-3" style="height: 50px;" type="search" placeholder="Search" aria-label="Search"  id="basic_search_text">
                                <button class="btn btn-outline-secondary col-lg-2 col-3"  onclick="basicSearch(0);">Search</button>
                            <!-- </form> -->
                        </div>
                        <div class="col-lg-1 col-12 text-end mt-3"><a href="advancedsearch.php" class="link-secondary" style="text-decoration: none; font-weight: bold;">Advanced</a></div>
                    </div>
                </div>


                <div class="col-12 mb-5">
                    <div class="row">
                        <div class="col-lg-4 col-12 text-center fs-5">


                            <div class=" text-dark mb-2 p-1 col-12 homeCategory" onclick="all_category();">
                                <img src="res\all_icon.png" />
                                <span class="p-3">&nbsp; All</span>
                            </div>

                            <?php

                            $category_rs = Database::search("SELECT * FROM `category`");

                            $category_num = $category_rs->num_rows;
                            // $category_num["id"];

                            for ($i = 0; $i < $category_num; $i++) {

                                if (isset($_GET["page"])) {

                                    $pageno = $_GET["page"];
                                } else {

                                    $pageno = 1;
                                }

                                $category_data = $category_rs->fetch_assoc();
                            ?>

                                <div class=" text-dark mb-2 p-1 col-12 homeCategory" onclick="hCategory(<?php echo $category_data['id']; ?>);">
                                    <img src="<?php echo $category_data["path"]; ?>" />
                                    <span class="p-3"><?php echo $category_data["name"]; ?></span>
                                </div>

                            <?php
                            }

                            ?>

                        </div>

                        <div class="col-8 d-none d-lg-block">
                            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="res\bg6.jpg" class="d-block w-100 poster-img-1" alt="...">
                                    </div>
                                    <!-- <div class="carousel-item">
                                        <img src="res\bg4.jpg" class="d-block w-100 poster-img-1" alt="...">
                                    </div> -->
                                    <div class="carousel-item">
                                        <img src="res/bg7.jpg" class="d-block w-100 poster-img-1" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="res\bg8.jpg" class="d-block w-100 poster-img-1" alt="...">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-12">
                    <div class="row row-cols-1 row-cols-md-4 mb" id="viewarea" >
                        <?php


                        $product_rs = Database::search("SELECT * FROM `product` WHERE `qty` >= '1' and `status_id`='1'");
                        $product_num = $product_rs->num_rows;


                        $result_per_page = 16;
                        $number_of_pages = ceil($product_num / $result_per_page);

                        $page_result = ($pageno - 1) * $result_per_page;

                        $selected_rs = Database::search("SELECT * FROM `product` WHERE `qty` >= '1' and `status_id`='1' 
                        LIMIT " . $result_per_page . " OFFSET " . $page_result . "");

                        $selected_num = $selected_rs->num_rows;

                        for ($i = 0; $i < $selected_num; $i++) {



                            $product_data = $selected_rs->fetch_assoc();

                            $img_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $product_data["id"] . "'");
                            $img_data = $img_rs->fetch_assoc();
                        ?>

                            <div class="col-12 g-4" >
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
                                            </p>
                                            <span class="col-12">Rs. <?php echo $product_data["price"]; ?> .00</span><br>
                                            <div class="row mb-4">
                                                <span class="col-9"><?php echo $product_data["qty"]; ?> Items Available</span><br>
                                                <div class="col-3 text-end">
                                                    <span class=" text-end text-danger fs-4" onclick="addwatchl(<?php echo $product_data['id']; ?>);" title="Add to Watch List"><i class="bi bi-heart-fill wlheart" style="cursor: pointer;"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <a tabindex="-1" class="btn btn-warning col-12 fw-bold homeaddcartbtn" onclick="wlAddtocart(<?php echo $product_data['id']; ?>);">Add To Cart</a>
                                    </div>
                                </div>


                            </div>



                        <?php
                        }

                        ?>
                    </div>
                    <div class="col-12 text-center mt-3 mb-3">

                        <div class="pagination">
                            <a href="
    <?php

                if ($pageno <= 1) {

                    echo "#";
                } else {

                    echo  "?page=" . ($pageno - 1);
                }


    ?>">&laquo;</a>
                            <?php

                            for ($page = 1; $page <= $number_of_pages; $page++) {

                                if ($page == $pageno) {

                            ?>
                                    <a href=" <?php echo  "?page=" . ($page); ?>" class="active"><?php echo $page; ?> </a>
                                <?php
                                } else {

                                ?>

                                    <a href=" <?php echo  "?page=" . ($page); ?>" class="active"><?php echo $page; ?></a>

                            <?php

                                }
                            }

                            ?>

                            <a href="
    <?php

                if ($pageno >= $number_of_pages) {

                    echo "#";
                } else {

                    echo  "?page=" . ($pageno + 1);
                }

    ?>
    ">&raquo;</a>
                        </div>

                    </div>

                </div>

        </div>
    </main>
    <?php require "footer.php"; ?>
</body>

</html>

<?php

            } else {
                header("location:index.php");
            }

?>