<?php

session_start();

require "connection.php";


$seller_email = $_SESSION["a"]["email"];

$category = $_POST["c"];
$brand = $_POST["b"];
$model = $_POST["m"];
$title = $_POST["t"];
$condition = $_POST["co"];
$qty = $_POST["qty"];
$color = $_POST["col"];
$description = $_POST["desc"];
$price = $_POST["p"];
$doc = $_POST["doc"];
$dwc = $_POST["dwc"];

$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date = $d->format("Y-m-d H:i:s");

$status = 1;

if ($category == "0") {
    echo "Please Select the Category";
} elseif ($brand == "0") {
    echo "Please Select the Brand";
} elseif ($model == "0") {
    echo "Please Select the Model";
} elseif (empty($title)) {
    echo "Please enter the Title of yor product";
} elseif (strlen($title < 100)) {
    echo "Your Title should have 100 or less characters length.";
} elseif ($condition == "0") {
    echo "Please Select the Product Condition";
} elseif (empty($qty)) {
    echo "Please add a quantity";
} elseif ($qty == "0" || $qty == "e" || $qty < 0) {
    echo "Please enter a valid quantity";
} elseif (empty($color)) {
    echo "Please enter the Color";
} elseif (empty($price)) {
    echo "Please enter the unit price of your Product";
} elseif (!is_numeric($price)) {
    echo "Please enter the price";
} elseif (empty($dwc)) {
    echo "Please enter the delivery price in colombo";
} elseif (!is_numeric($dwc)) {
    echo "Please enter the valid delivery price";
} elseif (empty($doc)) {
    echo "Please enter the delivery price out of colombo";
} elseif (!is_numeric($doc)) {
    echo "Please enter the valid delivery price";
} else {
    if (isset($_FILES["img"])) {
        $mhb_rs = Database::search("SELECT * FROM `model_has_model` WHERE `model_id`='" . $model . "' && `brand_id`='" . $brand . "' ");

        $model_has_brand_id;

        if ($mhb_rs->num_rows == 1) {

            $mhb_data = $mhb_rs->fetch_assoc();
            $model_has_brand_id = $mhb_data["id"];
        } else {

            Database::iud("INSERT INTO `model_has_model` (`model_id`,`brand_id`) VALUES ('" . $model . "','" . $brand . "')");

            // echo Database::$connection->insert_id;
            $model_has_brand_id = Database::$connection->insert_id;
        }

        Database::iud("INSERT INTO `product` (`price`,`qty`,`description`,`title`,`datetime_added`,`deliver_fee_colombo`,`deliver_fee_other`
        ,`category_id`,`model_has_brand_id`,`color`,`status_id`,`condition_id`,`users_email`) VALUES ('" . $price . "','" . $qty . "','" . $description . "'
        ,'" . $title . "','" . $date . "','" . $dwc . "','" . $doc . "','" . $category . "','" . $model_has_brand_id . "','" . $color . "','" . $status . "'
        ,'" . $condition . "','" . $seller_email . "')");



        $product_id = Database::$connection->insert_id;

        $allowed_image_extentions = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml");


        $imagefile = $_FILES["img"];

        $file_extention = $imagefile["type"];

        if (in_array($file_extention, $allowed_image_extentions)) {

            $new_img_extention;

            if ($file_extention == "image/jpg") {
                $new_img_extention = ".jpg";
            } elseif ($file_extention == "image/jpeg") {
                $new_img_extention = ".jpeg";
            } elseif ($file_extention == "image/png") {
                $new_img_extention = ".png";
            } elseif ($file_extention == "image/svg+xml") {
                $new_img_extention = ".svg";
            }

            $file_name = "res//" . uniqid() . $new_img_extention;
            move_uploaded_file($imagefile["tmp_name"], $file_name);

            Database::iud("INSERT INTO `images` (`name`,`product_id`) VALUES ('" . $file_name . "','" . $product_id . "')");
        } else {

            echo "Invalid image type.";
        }
    } else {
        echo "Please add an image.";
    }
    echo "Product added successfully";
}
