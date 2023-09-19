<?php

require "connection.php";

session_start();

$u = $_SESSION["u"]["email"];


$id = $_GET["id"];

if (isset($id)) {

    $wachl_rs = Database::search("SELECT * FROM `watchlist` WHERE `product_id`='" . $id . "' AND `user_email`='" . $u . "'");
    $wachl_num = $wachl_rs->num_rows;

    if ($wachl_num == 1) {
        echo "Item Already Added";
    } else {
        Database::iud("INSERT INTO `watchlist` (`product_id`,`user_email`) VALUES ('" . $id . "','" . $u . "')");
        echo "Item Added";
    }
}
