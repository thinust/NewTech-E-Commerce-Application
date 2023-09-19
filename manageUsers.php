<?php
require "connection.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>New Tech | Admins | Manage Users</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="res/logo3.png" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
</head>

<body style="background-color:#74EBD5; background-image: linear-gradient(90deg,#74EBD5 0%,#9FACE6 100%); min-height: 100vh ;">

    <?php

    // require "header.php";

    session_start();

    if (isset($_SESSION["a"])) {

    ?>

        <div class="container-fluid">
            <div class="row">

                <div class="col-12 p-3 fs-1 bg-white">
                    <span class="col-12 text-secondary footerfont">Manage All Users</span>
                </div>

                <div class="col-12 mt-3">
                    <div class="row">

                        <div class="offset-lg-2 col-12 col-lg-8 mb-3">
                            <div class="row">

                                <div class="col-8 col-lg-9">
                                    <input type="text" class="form-control">
                                </div>

                                <div class="col-4 col-lg-3 d-grid">
                                    <button class="btn btn-secondary">Search</button>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-12 mb-3">
                    <div class="row">

                        <div class="col-1 bg-warning py-2 text-end">
                            <span class="fs-4 fw-bold text-white">#</span>
                        </div>

                        <div class="col-2 bg-light py-2 d-none d-lg-block">
                            <span class="fs-4 fw-bold">Profile Iamge</span>
                        </div>

                        <div class="col-3 col-lg-2 bg-warning py-2">
                            <span class="fs-4 fw-bold text-white">User Name</span>
                        </div>

                        <div class="col-6 col-lg-2 bg-light py-2 d-lg-block">
                            <span class="fs-4 fw-bold ">Email</span>
                        </div>

                        <div class="col-2 bg-warning py-2 d-none d-lg-block">
                            <span class="fs-4 fw-bold text-white">Mobile</span>
                        </div>

                        <div class="col-2 bg-light py-2 d-none d-lg-block">
                            <span class="fs-4 fw-bold">Registered Date</span>
                        </div>

                        <div class="col-2 col-lg-1 bg-white">
                            <span class="fs-4 fw-bold">Registered Date</span>
                        </div>

                    </div>
                </div>

                <?php

                $user_rs = Database::search("SELECT * FROM `user`");
                $user_num = $user_rs->num_rows;


                for ($i = 0; $i < $user_num; $i++) {

                    $user_data = $user_rs->fetch_assoc();

                    $img_rs = Database::search("SELECT * FROM `profile_img` WHERE `user_email`='" . $user_data["email"] . "'");
                    $img_data = $img_rs->fetch_assoc();


                ?>
                    <div class="col-12 mb-3">
                        <div class="row">

                            <div class="col-1 bg-secondary py-2 text-end">
                                <span class="fs-6 fw-bold text-white"><?php echo $i + 1; ?></span>
                            </div>

                            <div class="col-2 bg-light py-2 d-none d-lg-block" onclick="viewmsgmodal();">
                                <img src='<?php echo $img_data["path"]; ?>' style="height: 40px; margin-left: 120px;">
                            </div>

                            <div class="col-3 col-lg-2 bg-secondary py-2">
                                <span class="fs-6 fw-bold text-white"><?php echo $user_data["first_name"]; ?></span>
                            </div>

                            <div class="col-6 col-lg-2 bg-light py-2 d-lg-block">
                                <span class="fs-6 fw-bold "><?php echo $user_data["email"]; ?></span>
                            </div>

                            <div class="col-2 bg-secondary py-2 d-none d-lg-block">
                                <span class="fs-6 fw-bold text-white"><?php echo $user_data["mobile"]; ?></span>
                            </div>

                            <div class="col-2 bg-light py-2 d-none d-lg-block">
                                <span class="fs-6 fw-bold"><?php echo $user_data["joined_date"]; ?></span>
                            </div>

                            <div class="col-2 col-lg-1 bg-white py-2 d-grid">
                                <button class="btn btn-danger d-none d-lg-block">Block</button>
                                <button class="btn btn-danger d-block d-lg-none"><i class="bi bi-shield-fill-x"></i></button>
                            </div>

                        </div>
                    </div>
                <?php
                }
                ?>


                <div class="col-12 text-center">
                    <div class="pagination">
                        <a href="#">&laquo;</a>
                        <a href="#">1</a>
                        <a href="#" class="active">2</a>
                        <a href="#">3</a>
                        <a href="#">4</a>
                        <a href="#">5</a>
                        <a href="#">&raquo;</a>
                    </div>
                </div>

                <!-- modal -->

                <div class="modal" tabindex="1" id="viewMsgModal">
                    <div class="modal-dialog">

                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title">My Messages</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">

                                <!-- receved -->
                                <div class="col-12 mt-2">
                                    <div class="row">

                                        <div class="col-8 bg-success rounded">
                                            <div class="row">

                                                <div class="col-12 pt-2">
                                                    <span class="text-white fs-4">Hello there!!!</span>
                                                </div>

                                                <div class="col-12 text-end pb-2">
                                                    <span class="text-white fs-6">2022-06-11 | 08:00:00</span>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- receved -->

                                <!-- send -->
                                <div class="col-12 mt-2">
                                    <div class="row">

                                        <div class="offset-4 col-8 bg-success rounded">
                                            <div class="row">

                                                <div class="col-12 pt-2">
                                                    <span class="text-white fs-4">Hello there!!!</span>
                                                </div>

                                                <div class="col-12 text-end pb-2">
                                                    <span class="text-white fs-6">2022-06-11 | 08:05:00</span>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- send -->

                            </div>

                            <div class="modal-footer">
                                <div class="col-12">
                                    <div class="row">

                                        <div class="col-8">
                                            <input type="text" class="form-control">
                                        </div>

                                        <div class="col-4 d-grid">
                                            <button class="btn btn-primary">Send</button>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                <!-- modal -->

                <?php require "footer.php"; ?>
            </div>

        <?php
    } else {
        header("location:adminsignin.php");
    }
        ?>

        </div>

        <script src="script.js"></script>
        <script src="bootstrap.bundle.js"></script>
        <script src="bootstrap.js"></script>

</body>

</html>