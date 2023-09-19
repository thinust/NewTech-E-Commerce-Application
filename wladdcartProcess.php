<?php

require "connection.php";

session_start();

$u = $_SESSION["u"]["email"];


$id = $_GET["id"];

if (isset($id)) {

    $cart_rs = Database::search("SELECT * FROM `cart` WHERE `product_id`='" . $id . "' AND `users_email`='" . $u . "'");
    $cart_num = $cart_rs->num_rows;

    if ($cart_num == 1) {
        echo "Item Already Added";
    } else {
        Database::iud("INSERT INTO `cart` (`product_id`,`users_email`,`qty`) VALUES ('" . $id . "','" . $u . "','1')");
        echo "Item Added";
    }
}
