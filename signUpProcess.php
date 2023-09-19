<?php

require "connection.php";

$fn = $_POST["fn"];
$ln = $_POST["ln"];
$em = $_POST["em"];
$pw = $_POST["pw"];
$mb = $_POST["mb"];
$gd = $_POST["gd"];


if (empty($fn)) {
    echo "Please enter your First Name";
} elseif (strlen($fn) > 50) {
    echo "First Name must be less than 50 characters";
} elseif (empty($ln)) {
    echo "Please enter your Last Name";
} elseif (strlen($ln) > 50) {
    echo "Last Name must be less than 50 characters";
} elseif (empty($em)) {
    echo "Please enter your Email";
} elseif (strlen($em) > 100) {
    echo "Email must be less than 100 characters";
} elseif (!filter_var($em, FILTER_VALIDATE_EMAIL)) {
    echo "Please enter valid Email";
} elseif (empty($pw)) {
    echo "Please enter Password";
} elseif (strlen($pw) < 5 || strlen($pw) > 20) {
    echo "Password lenght should be between 05 and 20";
} elseif (empty($mb)) {
    echo "Please Enter Your Mobile Number";
} elseif (strlen($mb) != 10) {
    echo "Mobile Number should contain 10 characters";
} elseif (!preg_match("/07[0,1,2,4,5,6,7,8][0-9]/", $mb)) {
    echo "Please enter valid Mobile Number";
} else {

    $r = Database::search("SELECT * FROM `user` where `email` = '" . $em . "' OR `mobile` = '" . $mb . "'");
    $n = $r->num_rows;

    if ($n > 0) {
        echo "User with the same Email Address or Mobile Number already exists.";
    } else {

        $d = new DateTime();
        $dtz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($dtz);
        $date = $d->format("y-m-d H:i:s");

        Database::iud("INSERT INTO `user` (`first_name`,`last_name`,`email`,`password`,`mobile`,`joined_date`,`status`,`gender_id`) VALUES 
        ('" . $fn . "','" . $ln . "','" . $em . "','" . $pw . "','" . $mb . "','" . $date . "','1','".$gd."')");

        echo "Success";
    }
}
