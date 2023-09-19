<?php
    require_once "stripe-php-master/init.php";

    $stripeDetails = array(
        "secretKey" => "sk_test_51MMyUbArcnel3bxZvw9QIPbFP6L4isT7YblevAx4o3kUGVuZFpU7TIHtXtE3CMdX0vbGzeo2f2tZlL718qTlaRgv006OI5nNrT",
        "publishableKey" => "pk_test_51MMyUbArcnel3bxZGUuIzEP3b8uS5WG845UqcRXC3oDD5nfuVgJGU1KC1eqxFS0N3RHPbZVkMol0V7svqOfyyhXN005oRH6t3W"
    );

    \Stripe\Stripe::setApiKey($stripeDetails["secretKey"]);
?>