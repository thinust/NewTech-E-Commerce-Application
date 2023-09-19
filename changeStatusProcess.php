<?php

require "connection.php";

$id = $_GET["id"];

$status_rs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $id . "'");
$status_data = $status_rs->fetch_assoc();

// echo $status_data["status_id"];

if ($status_data["status_id"] == 1) {

    Database::iud("UPDATE `product` SET `status_id`='2' WHERE `id`='" . $id . "'");
} elseif ($status_data["status_id"] == 2) {
    Database::iud("UPDATE `product` SET `status_id`='1' WHERE `id`='" . $id . "'");
}
