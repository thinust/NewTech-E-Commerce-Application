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

<body>

    <div class="col-12">
        <div class="row mt-1 mb-1">
            <nav class="navbar bg-white fixed-top">
                <div class="container-fluid">
                    <div class="col-5 offset-1 align-self-start" style="cursor: pointer;">
                        <span class="text-lg-start title01">
                            <img src="res/logo2.gif" style="height: 80px; cursor: pointer;" onclick="himg();">
                        </span>

                        <?php session_start(); ?>

                    </div>
                    <a class="text-end col-lg-4 col-1 text-dark" href="cart.php"><i class="bi bi-cart2 fs-5" style="cursor: pointer;"></i></a>
                    <button class="navbar-toggler border-0 placeholder-wave bg-warning mx-2 mx-lg-5" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">New Tech</h5>
                            <button type="button" class="btn-close btn btn-outline-danger" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                                    <a class="nav-link active" aria-current="page" href="cart.php">Cart</a>
                                    <a class="nav-link active" aria-current="page" href="watchlist.php">Watchlist</a>
                                    <a class="nav-link active" aria-current="page" href="purchasehistory.php">My Purchase History</a>
                                    <a class="nav-link active" aria-current="page" href="userProfile.php">User Profile</a>
                                </li>
                                <li class="nav-item mb-2">
                                    <a class="btn btn-outline-dark" aria-current="page" href="#" onclick="signOut()">Sign Out</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            <div style="margin-top: 120px;"></div>
        </div>
    </div>

    <script src="script.js"></script>
    <script src="bootstrap.js"></script>

</body>

</html>