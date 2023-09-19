<!DOCTYPE html>
<html lang="en">

<head>
    <title>New Tech | Admins | Manage Products</title>

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
                    <span class="col-12 text-secondary footerfont">Manage All Product</span>
                </div>

                <div class="col-12 mt-3">
                    <div class="row">

                        <div class="offset-lg-2 col-lg-8 mb-3">
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

                        <div class="col-2 col-lg-1 bg-warning py-2 text-end">
                            <span class="fs-4 fw-bold text-white">#</span>
                        </div>

                        <div class="col-2 bg-light py-2 d-none d-lg-block">
                            <span class="fs-4 fw-bold">Product Iamge</span>
                        </div>

                        <div class="col-4 col-lg-2 bg-warning py-2">
                            <span class="fs-4 fw-bold text-white">Title</span>
                        </div>

                        <div class="col-4 col-lg-2 bg-light py-2 d-lg-block">
                            <span class="fs-4 fw-bold ">Price</span>
                        </div>

                        <div class="col-2 bg-warning py-2 d-none d-lg-block">
                            <span class="fs-4 fw-bold text-white">Quantity</span>
                        </div>

                        <div class="col-2 bg-light py-2 d-none d-lg-block">
                            <span class="fs-4 fw-bold">Registered Date</span>
                        </div>

                        <div class="col-2 col-lg-1 bg-white"></div>

                    </div>
                </div>

                <div class="col-12 mb-3">
                    <div class="row">

                        <div class="col-2 col-lg-1 bg-secondary py-2 text-end">
                            <span class="fs-6 fw-bold text-white">1</span>
                        </div>

                        <div class="col-2 bg-light py-2 d-none d-lg-block" onclick="viewProductModal();">
                            <img src='https://picsum.photos/300/200' style="height: 40px; margin-left: 120px;">
                        </div>

                        <div class="col-4 col-lg-2 bg-secondary py-2">
                            <span class="fs-6 fw-bold text-white">title</span>
                        </div>

                        <div class="col-4 col-lg-2 bg-light py-2 d-lg-block">
                            <span class="fs-6 fw-bold ">Rs. 100000 .00</span>
                        </div>

                        <div class="col-2 bg-secondary py-2 d-none d-lg-block">
                            <span class="fs-6 fw-bold text-white">2 Items</span>
                        </div>

                        <div class="col-2 bg-light py-2 d-none d-lg-block">
                            <span class="fs-6 fw-bold">2022-05-30</span>
                        </div>

                        <div class="col-2 col-lg-1 bg-white py-2 d-grid">
                            <button class="btn btn-danger d-none d-lg-block">Block</button>
                            <button class="btn btn-danger d-block d-lg-none"><i class="bi bi-shield-fill-x"></i></button>

                        </div>

                    </div>
                </div>

                <!-- modal-1 -->

                <div class="modal" tabindex="-1" id="viewproductmodal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="offset-lg-4 col-4">
                                    <img src="https://picsum.photos/300/200" style="height: 150px;" class="img-fluid">
                                </div>
                                <div class="col-12">
                                    <span class="fs-5 fw-bold">Price :</span>&nbsp;
                                    <span class="fs-5">Rs. 100000 .00</span><br>
                                    <span class="fs-5 fw-bold">Quantity :</span>&nbsp;
                                    <span class="fs-5 fw-bold">2 Products left</span><br>
                                    <span class="fs-5 fw-bold">Seller :</span>&nbsp;
                                    <span class="fs-5 fw-bold">Thinuka Ravindith</span><br>
                                    <span class="fs-5 fw-bold">Description :</span>&nbsp;
                                    <span class="fs-5 fw-bold">description</span><br>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- modal-1 -->

                <div class="col-12 text-center">
                    <div class="pagination">
                        <a class="active" href="#">&laquo;</a>
                        <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#">4</a>
                        <a href="#">5</a>
                        <a href="#">&raquo;</a>
                    </div>
                </div>

                <hr>

                <div class="col-12 text-center">
                    <h3>Manage Category</h3>
                </div>

                <div class="col-12 mb-3 offset-lg-1">
                    <div class="row g-2">


                        <div class="text-dark mt-4 mx-lg-3 p-1 col-lg-3 text-lg-start text-center col-12 homeCategory">
                            <div class="row">


                                <div class="col-8 mt-2">
                                    <img src="res/mobile (2).png" />
                                    <span class="p-3">Mobile</span>
                                </div>

                                <div class="col-4 text-center mt-2">
                                    <label class="form-label mt-2 mx-4 fs-4"><i class="bi bi-trash-fill"></i></label>
                                </div>

                            </div>
                        </div>

                        <div class="text-dark mt-4 mx-lg-3 p-1 col-lg-3 text-lg-start text-center col-12 homeCategory">
                            <div class="row">


                                <div class="col-8 mt-2">
                                    <img src="res/laptop.png" />
                                    <span class="p-3">Laptop</span>
                                </div>

                                <div class="col-4 text-center mt-2">
                                    <label class="form-label mt-2 mx-4 fs-4"><i class="bi bi-trash-fill"></i></label>
                                </div>

                            </div>
                        </div>

                        <div class="text-dark mt-4 mx-lg-3 p-1 col-lg-3 text-lg-start text-center col-12 homeCategory">
                            <div class="row">


                                <div class="col-8 mt-2">
                                    <img src="res/desktop.png" />
                                    <span class="p-3">Desktop</span>
                                </div>

                                <div class="col-4 text-center mt-2">
                                    <label class="form-label mt-2 mx-4 fs-4"><i class="bi bi-trash-fill"></i></label>
                                </div>

                            </div>
                        </div>

                        <div class="text-dark mt-4 mx-lg-3 p-1 col-lg-3 text-lg-start text-center col-12 homeCategory">
                            <div class="row">


                                <div class="col-8 mt-2">
                                    <img src="res/tablet.png" />
                                    <span class="p-3">Tablet</span>
                                </div>

                                <div class="col-4 text-center mt-2">
                                    <label class="form-label mt-2 mx-4 fs-4"><i class="bi bi-trash-fill"></i></label>
                                </div>

                            </div>
                        </div>

                        <div class="text-dark mt-4 mx-lg-3 p-1 col-lg-3 text-lg-start text-center col-12 homeCategory">
                            <div class="row">


                                <div class="col-8 mt-2">
                                    <img src="res/camera.png" />
                                    <span class="p-3">Camera</span>
                                </div>

                                <div class="col-4 text-center mt-2">
                                    <label class="form-label mt-2 mx-4 fs-4"><i class="bi bi-trash-fill"></i></label>
                                </div>

                            </div>
                        </div>

                        <div class="text-dark bg-success mt-4 mx-lg-3 p-1 col-lg-3 text-lg-start text-center col-12 homeCategory">
                            <div class="row">


                                <div class="col-8 mt-3">
                                    <span class="p-3">Add New Category</span>
                                </div>

                                <div class="col-4 text-center mt-2" onclick="addNewCategoty();">
                                    <label class="form-label mx-4 fs-4"><i class="bi bi-shield-fill-plus"></i></label>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <!-- modal-2 -->

                <div class="modal" tabindex="-1" id="addCategoryModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add New Category</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <div class="col-12">
                                    <label class="form-label">New Category Name : </label>
                                    <input type="text" class="form-control" id="n">
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Your Email Address : </label>
                                    <input type="email" class="form-control" id="e">
                                </div>

                                <div class="modal-footer">
                                    <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button class="btn btn-primary" onclick="categoryVerifyModal();">Add Category</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- modal-2 -->

                <!-- modal-3 -->

                <div class="modal" tabindex="-1" id="addCategoryModalVerification">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Verification</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <div class="col-12">
                                    <label class="form-label">Verification Code : </label>
                                    <input type="text" class="form-control" id="vtxt">
                                </div>

                                <div class="modal-footer">
                                    <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button class="btn btn-primary">Verify & Save</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- modal-3 -->
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