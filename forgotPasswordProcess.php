<?php

require "connection.php";
require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_GET["e"])) {

    $email = $_GET["e"];

    $resultset = Database::search("SELECT * FROM `user` WHERE `email` = '" . $email . "'");

    $n = $resultset->num_rows;

    if ($n == 1) {

        $code = uniqid();
        Database::iud("UPDATE `user` SET `varification_code` = '".$code."' WHERE `email`='".$email."'" );

        $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'thinuka1@gmail.com'; 
            $mail->Password = 'ucvwpfwrjfmvzhix'; 
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('thinuka1@gmail.com', 'New Tech'); 
            $mail->addReplyTo('thinuka1@gmail.com', 'New Tech'); 
            $mail->addAddress($email); 
            $mail->isHTML(true);
            $mail->Subject = 'New Tech Forget Password verification code.'; 
            $bodyContent = '<h1 style="color:green;">Your Verification code is : '.$code.'</h1>'; 
            $mail->Body    = $bodyContent;

            if (!$mail->send()) {
                echo 'Verification code sending failed';
            } else {
                echo 'Success';
            }


    } else {
        echo "Email Address not found.";
    }
} else {
    echo "Please Enter Your Email Address.";
}
