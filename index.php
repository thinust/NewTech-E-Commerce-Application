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

<body style="background-image: url('res/bg3.png');" class="imageBg">



    <!-- header -->
    <!-- header -->

    <!-- content-1 -->

    <?php

    session_start();

    if (isset($_SESSION["u"])) {
        header("location:home.php");
    } else {


    ?>
        <section class=" mt-5 mb-5 d-none" id="signUpBox">
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
                                                <p class="text-center title01">Hi, Welcome to New Tech</p>
                                            </div>
                                        </div>
                                    </div>
                                    <h2 class="text-uppercase text-center mb-5">Create an account</h2>


                                    <div class="row g-2">
                                        <div class="col-12 col-lg-6 mb-4">
                                            <input type="text" id="fname" class="form-control" />
                                            <label class="form-label">First Name</label>
                                        </div>

                                        <div class="col-12 col-lg-6 mb-4">
                                            <input type="text" id="lname" class="form-control" />
                                            <label class="form-label" for="">Last Name</label>
                                        </div>

                                        <div class="col-12 mb-4">
                                            <input type="email" id="email" class="form-control" placeholder="abc@email.com" />
                                            <label class="form-label">Email</label>
                                        </div>

                                        <div class="col-12 mb-4">
                                            <div class="input-group ">
                                                <input type="password" id="psw" class="form-control" aria-describedby="viewPassword1">
                                                <button class="btn btn-outline-dark" id="viewPassword1" onclick="viewPassword1();"><i class="bi bi-eye-slash-fill"></i></button>
                                            </div>
                                            <label class="form-label">Password</label>
                                        </div>

                                        <div class="col-12 mb-4">
                                            <input type="text" id="mobile" class="form-control" />
                                            <label class="form-label">Mobile</label>
                                        </div>

                                        <div class="col-12 mb-4">
                                            <select class="form-select" id="gender">
                                                <?php

                                                require "connection.php";

                                                $rs = Database::search("SELECT * FROM `gender`");
                                                $n = $rs->num_rows;

                                                for ($i = 0; $i < $n; $i++) {
                                                    $f = $rs->fetch_assoc();

                                                ?>

                                                    <option value="<?php echo $f["id"]; ?>"><?php echo $f["name"]; ?></option>

                                                <?php

                                                }

                                                ?>

                                            </select>
                                            <label class="form-label">Gender</label>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button id="signUpBTN" onclick="spinner1();" type="button" class="btn btn-dark btn-block btn-lg gradient-custom-4 text-light align-content-center button1">Register</button>
                                    </div>

                                    <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="#" onclick="changeView();" class="fw-bold text-body"><u>Login here</u></a></p>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- content-1 -->


        <!-- content-2 -->

        <section class=" bg-image mt-5 mb-5" id="signInBox">
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
                                                <p class="text-center title01">Hi, Welcome to New Tech</p>
                                            </div>
                                        </div>
                                    </div>
                                    <h2 class="text-uppercase text-center mb-5">Sign in to your Account</h2>

                                    <?php

                                    $email = "";
                                    $password = "";

                                    if (isset($_COOKIE["email"])) {
                                        $email = $_COOKIE["email"];
                                    }

                                    if (isset($_COOKIE["password"])) {
                                        $password = $_COOKIE["password"];
                                    }

                                    ?>

                                    <div class="row g-2">
                                        <div class="col-12 mb-4">
                                            <input type="email" id="email2" class="form-control" placeholder="abc@email.com" value="<?php echo $email; ?>" />
                                            <label class="form-label">Email</label>
                                        </div>

                                        <div class="col-12 mb-1">
                                            <div class="input-group ">
                                                <input type="password" id="psw2" class="form-control " placeholder="*********" aria-describedby="viewPassword2" value="<?php echo $password; ?>" />
                                                <button class="btn btn-outline-dark" id="viewPassword2" onclick="viewPassword2();"><i class="bi bi-eye-slash-fill"></i></button>
                                            </div>

                                            <label class="form-label">Password</label>
                                        </div>

                                        <div class="col-6 mb-4">
                                            <div class="form-check">

                                                <?php

                                                if (isset($_COOKIE["email"])) {

                                                ?>

                                                    <input class="form-check-input" type="checkbox" value="1" id="rememberMe" style="cursor: pointer;" checked>

                                                <?php

                                                } else {
                                                ?>

                                                    <input class="form-check-input" type="checkbox" value="1" id="rememberMe" style="cursor: pointer;">

                                                <?php
                                                }

                                                ?>
                                                <label class="form-check-label" for="rememberMe" style="cursor: pointer;">
                                                    Remember Me
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-6 mb-4 ms-2">
                                            <a style="cursor: pointer;" class="text-body" onclick="forgotPassword();">Forgot Password?</a>
                                        </div>

                                        <div class="d-flex justify-content-center">
                                            <button onclick="spinner2();" type="button" class="btn btn-dark btn-block btn-lg gradient-custom-4 text-light button1" id="signInBTN">Sign In</button>
                                        </div>

                                        <p class="text-center text-muted mt-5 mb-0 ">Sign in or |&nbsp;<a href="#" onclick="changeView();" class="fw-bold text-body"><u>create an account</u></a></p>



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    <?php

    }
    ?>
    <!-- content-2 -->
    <!-- model -->
    <div class="modal" tabindex="-1" id="fogotPasswordModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Reset Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="col-6">
                    <label class="form-label">New Password</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="np">
                        <button class="btn btn-secondary" type="button" id="npb" onclick="showpassword1();"><i class="bi bi-eye-slash-fill"></i></button>
                    </div>

                </div>
                <div class="col-6">
                    <label class="form-label">Re-type Password</label>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" id="rnp">
                        <button class="btn btn-secondary" type="button" id="rnpb" onclick="showpassword2();"><i class="bi bi-eye-slash-fill"></i></button>
                    </div>

                </div>
                <div class="col-6">
                    <label class="form-label">Verification code</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="vc">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="resetpassword();">Reset</button>
                </div>
            </div>
        </div>
    </div>
    <!-- model -->


    <!-- </div> -->

    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>