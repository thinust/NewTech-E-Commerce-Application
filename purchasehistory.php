<!DOCTYPE html>
<html lang="en">

<head>
    <title>New Tech | Purchase History</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="res/logo3.png" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <?php require "header.php";

            if (isset($_SESSION["u"])) {

            ?>

                <div class="col-12 p-3 fs-3 mb-3">
                    <span class="col-12 text-secondary footerfont">Transaction History</span>
                </div>

                <div class="col-12">
                    <div class="row">

                        <div class="col-12 d-none d-lg-block">
                            <div class="row">

                                <div class="col-1 bg-light">
                                    <label class="form-label fw-bold">#</label>
                                </div>

                                <div class="col-3 bg-light">
                                    <label class="form-label fw-bold">Order Details</label>
                                </div>

                                <div class="col-1 bg-light">
                                    <label class="form-label fw-bold">Quantity</label>
                                </div>

                                <div class="col-2 bg-light">
                                    <label class="form-label fw-bold">Price</label>
                                </div>

                                <div class="col-2 bg-light">
                                    <label class="form-label fw-bold">Date</label>
                                </div>

                                <div class="col-3 bg-light"></div>

                                <div class="col-12">
                                    <hr>
                                </div>

                            </div>
                        </div>

                        <div class="col-12">
                            <div class="row g-2">

                                <div class="col-12 col-lg-1 bg-info text-center text-lg-start mt-0">
                                    <label class="form-label text-white fs-6 py-5">1111111111111</label>
                                </div>

                                <div class="col-12 col-lg-3">
                                    <div class="row g-2">

                                        <div class="card mx-0 my-0" style="width: 500px;">
                                            <div class="row g-0">
                                                <div class="col-md-4 text-center">
                                                    <img src="https://picsum.photos/300/300" class="img-thumbnail rounded-start mt-3">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body">
                                                        <h5 class="card-title">iPhone 12</h5>
                                                        <p class="card-text"><b>Seller : </b>Thinuka Ravindith</p>
                                                        <p class="card-text"><b>Price : </b>Rs. 100000 .00</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                                <div class="col-12 col-lg-1 text-center text-lg-end bg-light">
                                    <label class="form-label fs-4 pt-5">1 Items</label>
                                </div>

                                <div class="col-12 col-lg-2 text-center text-lg-end bg-info mt-0">
                                    <label class="form-label fs-4 pt-5 text-white fw-bold">Rs. 100000 .00</label>
                                </div>

                                <div class="col-12 col-lg-2 text-center text-lg-end bg-light">
                                    <label class="form-label fs-5 pt-5 px-3 fw-bold">2022-08-09 21:55:47</label>
                                </div>

                                <div class="col-12 col-lg-3">
                                    <div class="row">

                                        <div class="col-6 d-grid">
                                            <button class="btn btn-secondary rounded mt-5 fs-5">
                                                <i class="bi bi-info-circle-fill"></i> Feedback
                                            </button>
                                        </div>

                                        <div class="col-6 d-grid">
                                            <button class="btn btn-danger rounded mt-5 fs-5">
                                                <i class="bi bi-trash-fill"></i> Delete
                                            </button>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-12">
                    <hr>
                </div>

                <div class="col-12 mb-3">
                    <div class="row">

                        <div class="col-lg-10 d-none d-lg-block"></div>
                        <div class="col-12 col-lg-2 d-grid">
                            <button class="btn btn-danger rounded fs-6">
                                <i class="bi bi-trash-fill"></i> Clear All Records
                            </button>
                        </div>

                    </div>
                </div>

            <?php require "footer.php";
            } else {

                header("location:index.php");
            }

            ?>

        </div>
    </div>

    <script src="script.js"></script>

</body>

</html>