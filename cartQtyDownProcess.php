<?php

require "connection.php";

$qty = $_GET["qty"];
$id = $_GET["id"];

$aQty = $qty - 1;

if ($qty == 1) {

    echo "Quantity must be atleast One";

} else {


    Database::iud("UPDATE `cart` SET `qty`='" . $aQty . "' WHERE `id`='" . $id . "'");

    echo "Success";
    
}
