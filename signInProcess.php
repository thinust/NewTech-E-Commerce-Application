<?php

session_start();

require "connection.php";

$em = $_POST["em"];
$psw = $_POST["psw"];
$reme = $_POST["reme"];

if (empty($em)) {
    echo "Please enter your Email Address.";
} elseif (strlen($em) > 100) {
    echo "Email Address should contain less than 100 characters.";
} elseif (!filter_var($em, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid Email Address.";
} else if (empty($psw)) {
    echo "Please enter your password";
} elseif (strlen($psw) < 5 || strlen($psw) > 20) {
    echo "Invalid Password.";
} else {

    $user_rs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $em . "' AND `password` = '" . $psw . "'");

    $user_num = $user_rs->num_rows;

    if ($user_num == 1) {

        echo "Success";

        $user_data = $user_rs->fetch_assoc();

        $_SESSION["u"] = $user_data;

        if ($reme == "true") {

            setcookie("email", $em, time() + (60 * 60 * 24 * 365));
            setcookie("password", $psw, time() + (60 * 60 * 24 * 365));
        } else {

            setcookie("email", "", -1);
            setcookie("password", "", -1);
        }
    } else {
        echo "Invalid Email & Password";
    }
}
