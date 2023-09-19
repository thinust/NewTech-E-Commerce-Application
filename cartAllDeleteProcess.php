<?php

require "connection.php";

session_start();

$u = $_SESSION["u"]["email"];

Database::iud("DELETE FROM `cart` WHERE `users_email`='" . $u . "'");

echo "Success";
