<?php

require "connection.php";

session_start();

$u = $_SESSION["u"]["email"];


$id = $_GET["id"];

if (isset($id)) {

    Database::iud("DELETE FROM `cart` WHERE `product_id`='" . $id . "'");

    echo "Success";
}
