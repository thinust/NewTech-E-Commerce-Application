   <?php
   session_start();
   ?>
   
   <!DOCTYPE html>
   <html lang="en">

   <head>
       <title>New Tech | Admins Panel</title>
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1" />
       <link rel="icon" href="res/logo3.png" />

       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
       <link rel="stylesheet" href="bootstrap.css">
       <link rel="stylesheet" href="style.css">
   </head>

   <body class="body">

       <?php

        if (isset($_SESSION["a"])) {

        ?>

           <div class="container-fluid">
               <div class="row">

                   <div class="col-12 col-lg-2">
                       <div class="row">

                           <div class="align-items-start bg-white col-12">
                               <div class="row g-1 text-center">

                                   <div class="col-12 mt-5">
                                       <h4 class="text-dark"><?php echo "Thinuka Ravindith" ?></h4>
                                       <hr class="border border-1 border-white">
                                   </div>

                                   <div class="nav flex-column nav-pills me-3 mt-3">
                                       <nav class="nav flex-column">
                                           <a class="nav-link fs-5 active">Dashboard</a>
                                           <a href="manageUsers.php" class="nav-link fs-5">Manage User</a>
                                           <a href="myproducts.php" class="nav-link fs-5">Manage Product</a>
                                       </nav>
                                   </div>




                               </div>
                           </div>

                       </div>
                   </div>

                   <div class="col-12 col-lg-10 mb-5">
                       <div class="row">

                           <div class="col-12 p-3 fs-1 bg-white">
                               <span class="col-12 text-secondary footerfont">Dashboard</span>
                           </div>


                           <div class="col-12 mb-0">
                               <div class="row">

                                   <div class="col-6 col-lg-4 px-1">
                                       <div class="row g-1">

                                           <div class="col-12 bg-primary text-white text-center rounded" style="height: 100px;">
                                               <br>
                                               <span class="fs-4 fw-bold">Daily Earning</span>
                                               <br>
                                               <span class="fs-5">Rs. 1200000 .00</span>
                                           </div>

                                       </div>
                                   </div>

                                   <div class="col-6 col-lg-4 px-1">
                                       <div class="row g-1">
                                           <div class="col-12 bg-warning text-dark text-center rounded" style=" height: 100px;">
                                               <br>
                                               <span class="fs-4 fw-bold">Monthly Earning</span>
                                               <br>
                                               <span class="fs-5">Rs. 90000 .00</span>
                                           </div>
                                       </div>
                                   </div>

                                   <div class="col-6 col-lg-4 px-1 mt-1 mt-lg-0">
                                       <div class="row g-1">
                                           <div class="col-12 bg-primary text-white text-center rounded " style=" height: 100px;">
                                               <br>
                                               <span class="fs-4 fw-bold">Today Selling</span>
                                               <br>
                                               <span class="fs-5">2 Items</span>
                                           </div>
                                       </div>
                                   </div>

                                   <div class="col-6 col-lg-4 px-1 mt-1">
                                       <div class="row g-1">
                                           <div class="col-12 bg-warning text-white text-center rounded " style=" height: 100px;">
                                               <br>
                                               <span class="fs-4 fw-bold">Monthly Selling</span>
                                               <br>
                                               <span class="fs-5">20 Items</span>
                                           </div>
                                       </div>
                                   </div>

                                   <div class="col-6 col-lg-4 px-1 mt-1">
                                       <div class="row g-1">
                                           <div class="col-12 bg-primary text-white text-center rounded " style=" height: 100px;">
                                               <br>
                                               <span class="fs-4 fw-bold">Total Selling</span>
                                               <br>
                                               <span class="fs-5">3 Items</span>
                                           </div>
                                       </div>
                                   </div>

                                   <div class="col-6 col-lg-4 px-1 mt-1">
                                       <div class="row g-1">
                                           <div class="col-12 bg-warning text-white text-center rounded " style=" height: 100px;">
                                               <br>
                                               <span class="fs-4 fw-bold">Total Engagements</span>
                                               <br>
                                               <span class="fs-5">2 Members</span>
                                           </div>
                                       </div>
                                   </div>

                               </div>
                           </div>

                           <div class="col-12">
                               <hr>
                           </div>

                           <div class="col-12 bg-dark mb-5">
                               <div class="row">

                                   <div class="col-12 col-lg-2 text-center mt-3 mb-5 ">
                                       <label class="form-label fs-4 fw-bold text-white">Total Activity Time</label>
                                   </div>

                                   <?php

                                    $start_date = new DateTime("2022-10-20 00:00:00");

                                    $tdate = new DateTime();
                                    $tz = new DateTimeZone("Asia/Colombo");
                                    $tdate->setTimezone($tz);

                                    $end_date = new DateTime($tdate->format("Y-m-d H:i:s"));

                                    $difference = $end_date->diff($start_date);

                                    ?>

                                   <div class="col-12 col-lg-10 text-end mt-3 mb-3 text-lg-end text-center">
                                       <label class="form-label fs-4 fw-bold text-white">
                                           <?php

                                            echo $difference->format('%Y') . "Years " . $difference->format('%m') . "Months " .
                                                $difference->format('%d') . "Days " . $difference->format('%H') . "Hours " .
                                                $difference->format('%i') . "Minutes " . $difference->format('%s') . "Seconds ";

                                            ?>
                                       </label>
                                   </div>

                               </div>
                           </div>

                          

                           


                       </div>
                   </div>
                   <div class="col-12 g-0 mt-5">

                       <?php require "footer.php"; ?>
                   </div>
               </div>
           </div>

       <?php
        } else {


            header("location:adminsignin.php");
        }
        ?>

   </body>

   </html>