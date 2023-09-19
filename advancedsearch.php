<!DOCTYPE html>
<html lang="en">

<head>
    <title>New Tech</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="res/logo3.png" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
</head>

<body class="body">

    <div class="container mb-5">
        <?php
        require "header.php";

        if (isset($_SESSION["u"])) {

        ?>
            <div class="row">

                <div class="col-12 mb-5">
                    <div class="row">
                        <form class="d-flex" role="search">
                            <input class="form-control me-4" style="height: 50px;" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-secondary col-lg-2" type="submit">Search</button>
                        </form>
                    </div>
                </div>

                <div class="col-lg-3 bg-white p-3">
                    <label class="form-label fs-5">Select Condition</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                        <label class="form-check-label" for="exampleRadios1">
                            New
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                        <label class="form-check-label" for="exampleRadios2">
                            Used
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2" checked>
                        <label class="form-check-label" for="exampleRadios2">
                            Not Specified
                        </label>
                    </div>
                </div>



                <div class="col-lg-6 col-12 bg-white p-3">
                    <div class="row">

                        <div class="col-lg-12 col-12">
                            <label class="form-label fs-5" for="Category">Select Category</label>
                            <select class="form-select" id="Category">
                                <option selected>Select</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>

                        <div class="col-lg-6 col-12 mt-lg-0 mt-3">
                            <label class="form-label fs-5" for="Brand">Select Brand</label>
                            <select class="form-select" id="Brand">
                                <option selected>Select</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>

                        <div class="col-lg-6 col-12 mt-lg-0 mt-3">
                            <label class="form-label fs-5" for="Brand">Select Model</label>
                            <select class="form-select" id="Brand">
                                <option selected>Select</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>

                    </div>
                </div>

                <div class="col-lg-3 col-12 bg-white p-3">
                    <div class="row">
                        <label class="form-label fs-5">Price</label>
                        <div class="mb-3 col-12">
                            <input type="text" class="form-control" placeholder="Price From">
                        </div>
                        <div class="mt-lg-4 col-12">
                            <input type="text" class="form-control" placeholder="Price To">
                        </div>
                    </div>
                </div>

                <div class="col-12 bg-white p-3 mt-5">
                    <div class="row">
                        <div class="col-lg-4 col-12">
                            <label class="form-label fs-5">Sort By</label>
                            <select class="form-select" id="Brand">
                                <option selected>Select</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>

                    </div>
                </div>

                <div class="col-12 bg-white text-center p-3 mt-5" style="height: 250px;">
                    <div class="row">
                        <span class="col-12 fs-2 mt-5"><i class="bi bi-search"></i></spaබ>
                            <div class="col-12">
                                <label class="form-label fs-2 footerfont">No Item Search Yet</label>
                            </div>

                    </div>
                </div>


            </div>

        <?php

        } else {

            header("location:index.php");
        }


        ?>

    </div>

    <?php require "footer.php"; ?>

</body>

</html>