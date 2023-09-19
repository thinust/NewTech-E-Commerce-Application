<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="col-6 mb-4 ms-2">
        <a style="cursor: pointer;" class="text-body" onclick="sendQuote();">Forgot Password?</a>
<button type="button"  style="background-color: rgb(31, 119, 177); border-radius: 5px;height:30px;width:150px;border:none"><a href="https://drive.google.com/file/d/1nlnBg707dV5cbfvZCL-YHim6yRHcMZZd/view?usp=sharing" style="color: white;  text-decoration: none">Download Quotation</a></button>

    </div>
</body>

<script>

function sendQuote(){
    // var email = document.getElementById("email2");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                alert("Verification Code has sent to your email. Please check inbox.");
                // var m = document.getElementById("fogotPasswordModal");
                // bm = new bootstrap.Modal(m);
                // bm.show();
            }
        }
    }

    r.open("GET", "orienQuoteEmailProcess.php", true);
    r.send();
}

</script>

</html>