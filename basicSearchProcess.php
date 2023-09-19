<?php

require "connection.php";

$search_txt = $_POST["t"];
// $search_select = $_POST["s"];

$query = "SELECT * FROM `product` WHERE `qty` >= '1' and `status_id`='1'";

if (!empty($search_txt)) {

    $query .= "AND `title` LIKE '%" . $search_txt . "%'";
}

?>


<!-- <div class="row">

    <div class="offset-lg-1 col-12 col-lg-10 text-center">
        <div class="row"> -->

            <?php

            if ($_POST["page"] != 0) {

                $pageno = $_POST["page"];
            } else {
                $pageno = 1;
            }

            $product_rs = Database::search($query);
            $product_num = $product_rs->num_rows;

            $result_per_page = 6;
            $number_of_page = ceil($product_num / $result_per_page);

            $viewed_results = ((int)$pageno - 1) * $result_per_page;
            $query .= " LIMIT " . $result_per_page . " OFFSET " . $viewed_results;
            $result_rs = Database::search($query);
            $result_num = $result_rs->num_rows;

            while ($product_data = $result_rs->fetch_assoc()) {

                // $product_data = $product_rs->fetch_assoc();

                $img_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $product_data["id"] . "'");
                $img_data = $img_rs->fetch_assoc();
            ?>

                <div class="col-12 g-4 ">
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

        <!-- </div>
    </div>

</div> -->

