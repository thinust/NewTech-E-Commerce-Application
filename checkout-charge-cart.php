<?php
include("./config.php");

require "connection.php";

session_start();

$uemail = $_SESSION["u"]["email"];

$token = $_POST["stripeToken"];
// $contact_name = $_POST["c_name"];
$token_card_type = $_POST["stripeTokenType"];
// $phone           = $_POST["phone"];
$email           = $_POST["stripeEmail"];
// $address         = $_POST["address"];
$amount          =  $_GET["price"];
$desc            = "Cart Checkout";
$charge = \Stripe\Charge::create([
  "amount" => str_replace(",", "", $amount) * 100,
  "currency" => 'lkr',
  "description" => $desc,
  "source" => $token,
]);

if ($charge) {
  // header("Location:success.php?amount=$amount");

?>

  <script>
    var orderId = 'id' + (new Date()).getTime();
    var id = "00000";
    var mail = "<?php echo $uemail; ?>";
    var amount = "<?php echo $amount; ?>";


    function cartinvoice(orderId, id, mail, qty, amount) {

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
}
