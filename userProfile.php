<!DOCTYPE html>



<html>

<head>
    <title>New Tech</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" href="res/logo3.png" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body class="body">

    <div class="container-fluid">
        <div class="row g-2">

            <?php require "header.php"; ?>

            <?php

            // session_start();

            require "connection.php";

            if (isset($_SESSION["u"]["email"])) {

                $email = $_SESSION["u"]["email"];

                $resultset = Database::search("SELECT * FROM user  INNER JOIN user_has_address ON user_has_address.users_email=user.email
                INNER JOIN city ON city.id=user_has_address.city_id INNER JOIN district ON district.id=city.district_id INNER JOIN province ON province.id=district.province_id
                INNER JOIN gender ON gender.id=user.gender_id
                WHERE user.email = 'thinuka1@gmail.com'");

                $n = $resultset->num_rows;

                $d = $resultset->fetch_assoc();

            ?>

                <div class="offset-3 col-6 text-center p-3 mb-3">
                    <span class="col-12 addprohead fs-1">My Profile</span>
                </div>
                <div class="col-lg-8 bg-body offset-lg-2 rounded mt-4 mb-4">
                    <div class="row">

                        <div class="col-12 ">
                            <div class="d-flex flex-column align-items-center text-center p-3 py-5">



                                <img id="viewImage" src="profileImage.png" class="rounded mt-5" style="width: 150px;">



                                <span class="fw-bold"><?php echo $d["first_name"] . " " . $d["last_name"]; ?></span>
                                <span class="text-black-50"><?php echo $d["email"]; ?></span>
                                <input class="d-none" type="file" accept="$img/*" id="profileimg">
                                <label class="btn btn-warning mt-5" for="profileimg" onclick="changeImage();">Update Profile Image</label>

                            </div>
                        </div>

                        <div class="col-lg-8 offset-lg-2 ">
                            <div class="p-3 py-5 ">

                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="fw-bold">Profile Setting</h4>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control addprofield" id="fn" value="<?php echo $d["first_name"]; ?>">
                                        <label class="form-label mx-3 fw-bold">First Name</label>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control addprofield" id="ln" value="<?php echo $d["last_name"]; ?>">
                                        <label class="form-label mx-3 fw-bold">Last Name</label>
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <input type="email" class="form-control addprofield" value="<?php echo $d["email"]; ?>" readonly>
                                        <label class="form-label mx-3 fw-bold">Email</label>
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <div class="input-group ">
                                            <input type="password" class="form-control addprofield" aria-describedby="viewPassword3" id="psw3" value=" <?php echo $d["password"]; ?>" readonly>
                                            <button class="btn btn-outline-warning" id="viewPassword3" onclick="viewPassword3();"><i class="bi bi-eye-fill"></i></button>
                                        </div>
                                        <label class="form-label mx-3 fw-bold">Password</label>
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <input type="text" class="form-control addprofield" id="mo" value="<?php echo $d["mobile"]; ?>">
                                        <label class="form-label mx-3 fw-bold">Mobile</label>
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <input type="text" class="form-control addprofield" value="<?php echo $d["joined_date"]; ?>" readonly>
                                        <label class="form-label mx-3 fw-bold">Registered Date</label>
                                    </div>

                                    <?php

                                    if (!empty($d["line_1"])) {

                                    ?>

                                        <div class="col-md-12 mb-3">
                                            <input type="text" class="form-control addprofield" id="ln_1" value=" <?php echo $d['line_1']; ?>">
                                            <label class="form-label mx-3 fw-bold">Address Line 01</label>
                                        </div>

                                    <?php

                                    } else {
                                    ?>

                                        <div class="col-md-12 mb-3">
                                            <input type="text" class="form-control addprofield" id="ln_1" placeholder="Address Line 01">
                                            <label class="form-label mx-3 fw-bold">Address Line 01</label>
                                        </div>

                                    <?php
                                    }

                                    if (!empty($d["line_2"])) {

                                    ?>

                                        <div class="col-md-12 mb-3">
                                            <input type="text" class="form-control addprofield" id="ln_2" value="<?php echo $d["line_2"]; ?>">
                                            <label class="form-label mx-3 fw-bold">Address Line 02</label>
                                        </div>
                                    <?php

                                    } else {
                                    ?>

                                        <div class="col-md-12 mb-3">
                                            <input type="text" class="form-control addprofield" id="ln_2" placeholder="Address Line 02">
                                            <label class="form-label mx-3 fw-bold">Address Line 02</label>
                                        </div>

                                    <?php
                                    }
                                    ?>

                                    <div class="col-md-6 mb-3">
                                        <select class="form-select addprofield" id="pr">
                                            <option value="0">Select Province</option>
                                            <?php

                                            $provincers = Database::search("SELECT * FROM `province`");
                                            $pn = $provincers->num_rows;

                                            for ($x = 0; $x < $pn; $x++) {

                                                $pd = $provincers->fetch_assoc();

                                            ?>

                                                <option value="<?php echo $pd["id"]; ?>" <?php
                                                                                            if ($pd["id"] == $d["province_id"]) {
                                                                                            ?> selected <?php
                                                                                                    }
                                                                                                        ?>><?php echo $pd["name"]; ?>&nbsp;Province</option>

                                            <?php

                                            }

                                            ?>
                                        </select>
                                        <label class="form-label mx-3 fw-bold">Province</label>

                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <select class="form-select addprofield" id="dr">
                                            <option value="0">Select District</option>

                                            <?php

                                            $districtrs = Database::search("SELECT * FROM `district`");
                                            $dn = $districtrs->num_rows;

                                            for ($x = 0; $x < $dn; $x++) {

                                                $dd = $districtrs->fetch_assoc();

                                            ?>

                                                <option value="<?php echo $dd["id"]; ?>" <?php
                                                                                            if ($dd["id"] == $d["district_id"]) {
                                                                                            ?> selected <?php
                                                                                                    }
                                                                                                        ?>><?php echo $dd["name"]; ?></option>

                                            <?php

                                            }

                                            ?>

                                        </select>
                                        <label class="form-label mx-3 fw-bold">District</label>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <select class="form-select addprofield" id="ci">
                                            <option value="0">Select City</option>
                                            <?php

                                            $cityrs = Database::search("SELECT * FROM `city`");
                                            $cn = $cityrs->num_rows;

                                            for ($x = 0; $x < $cn; $x++) {

                                                $cd = $cityrs->fetch_assoc();

                                            ?>

                                                <option value="<?php echo $cd["id"]; ?>" <?php
                                                                                            if ($cd["id"] == $d["city_id"]) {
                                                                                            ?> selected <?php
                                                                                                    }
                                                                                                        ?>><?php echo $cd["name"]; ?></option>

                                            <?php

                                            }

                                            ?>
                                        </select>
                                        <label class="form-label  mx-3 fw-bold">City</label>
                                    </div>

                                    <?php

                                    if (!empty($d["postal_code"])) {

                                    ?>

                                        <div class="col-md-6 mb-3">
                                            <input type="text" class="form-control addprofield" id="pc" value="<?php echo $d["postal_code"]; ?>">
                                            <label class="form-label mx-3 fw-bold">Postal Code</label>
                                        </div>

                                    <?php

                                    } else {
                                    ?>

                                        <div class="col-md-12 mb-3">
                                            <input type="text" class="form-control addprofield" placeholder="Postal Code">
                                            <label class="form-label mx-3 fw-bold">Postal Code</label>
                                        </div>

                                    <?php
                                    }

                                    ?>

                                    <div class="col-md-12 mb-3">
                                        <input type="text" class="form-control addprofield" value="<?php echo $d["name"]; ?>" readonly>
                                        <label class="form-label mx-3 fw-bold">Gender</label>
                                    </div>


                                    <div class="col-md-12 d-grid mt-5 mb-3">
                                        <button class="btn btn-warning" onclick="update_profile();">Update My Profile</button>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>
                </div>


        </div>
    </div>
    <?php require "footer.php"; ?>

    <script src="script.js"></script>
</body>

</html>

<?php

            } else {

?>

    <script>
        window.location = "index.php";
    </script>

<?php

            }

?>