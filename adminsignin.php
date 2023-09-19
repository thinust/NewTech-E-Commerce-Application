<!DOCTYPE html>

<html>

<head>
    <title>New Tech</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="res/logo3.png" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
</head>

<body style="background-image: url('res/bg2.jpg');" class="imageBg">

    <!-- content-2 -->

    <section class=" bg-image mt-5 mb-5">
        <div class=" d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12 logo"></div>
                                        <div class="col-12">
                                            <p class="text-center title01">New Tech Admin</p>
                                        </div>
                                    </div>
                                </div>
                                <h2 class="text-uppercase text-center mb-5">Sign in to your Account</h2>


                                <div class="row g-2">
                                    <div class="col-12 mb-4">
                                        <label class="form-label">Email</label>
                                        <input type="email" id="email2" class="form-control" placeholder="abc@email.com" />
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button onclick="spinner3();" type="button" class="btn btn-dark btn-block btn-lg gradient-custom-4 text-light button1" id="signInBTN">Log In</button>
                                    </div>

                                    <p class="text-center text-muted mt-5 mb-0 ">Sign in or |&nbsp;<a href="index.php" class="fw-bold text-body"><u>Customer Login</u></a></p>



                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal" tabindex="-1" id="verificationModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Admin Verification</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <label class="form-label">Enter the Verification code you got by an email</label>
                                    <input type="text" class="form-control" id="vcode">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" onclick="verify();">Verify</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- content-2 -->



    <!-- </div> -->

    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>