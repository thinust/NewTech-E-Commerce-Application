<?php
include("./config.php");

require "connection.php";

session_start();

$uemail = $_SESSION["u"]["email"];

$pid = $_GET["id"];

$product_rs = Database::search("SELECT product.id,product.category_id,product.model_has_brand_id,product.title,product.price,product.qty,product.description,
    product.condition_id,product.status_id,product.users_email,model.name AS mname, brand.name AS bname FROM product INNER JOIN model_has_model ON model_has_model.id=product.model_has_brand_id
    INNER JOIN brand ON brand.id=model_has_model.brand_id  INNER JOIN model ON model.id=model_has_model.model_id WHERE product.id='" . $pid . "'");

$product_num = $product_rs->num_rows;

$product_data = $product_rs->fetch_assoc();

$productqty = $product_data["qty"];
// $productnewqty = $productqty - '1';

// Database::iud("UPDATE `product` SET `qty`='" . $productnewqty . "' WHERE `id`='" . $pid . "'");

$token = $_POST["stripeToken"];
// $contact_name = $_POST["c_name"];
$token_card_type = $_POST["stripeTokenType"];
// $phone           = $_POST["phone"];
$email           = $_POST["stripeEmail"];
// $address         = $_POST["address"];
$amount          =  $product_data["price"];
$desc            = $product_data["title"];
$charge = \Stripe\Charge::create([
  "amount" => str_replace(",", "", $amount) * 100,
  "currency" => 'lkr',
  "description" => $desc,
  "source" => $token,
]);

if ($charge) {
?>
  <script>
    var orderId = 'id' + (new Date()).getTime();
    var id = <?php echo $pid; ?>;
    var mail = "<?php echo $uemail; ?>";
    var amount = "<?php echo $amount; ?>";

    invoice(orderId, id, mail, "1", amount);

    function invoice(orderId, id, mail, qty, amount) {

      // alert(amount);
      var f = new FormData();
      f.append("o", orderId);
      f.append("i", id);
      f.append("m", mail);
      f.append("a", amount);
      f.append("q", qty);

      var r = new XMLHttpRequest();

      r.onreadystatechange = function() {
        if (r.readyState == 4) {
          var t = r.responseText;
          if (t == "1") {
            window.location = "invoice.php?id=" + orderId;
          } else {
            alert(t);
          }
        }
      }

      r.open("POST", "saveInvoice.php", true);
      r.send(f);
    }
  </script>
<?php

  // header("Location:success.php?amount=$amount");
}
