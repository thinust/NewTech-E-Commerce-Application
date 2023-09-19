<?php

require "connection.php";

$qty = $_GET["qty"];
$id = $_GET["id"];

$aQty = $qty + 1;

Database::iud("UPDATE `cart` SET `qty`='" . $aQty . "' WHERE `id`='" . $id . "'");

echo "Success";