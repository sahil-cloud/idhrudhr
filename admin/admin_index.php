<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/talewind.min.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome\css\all.css">
    <title>Admin</title>
</head>

<body>
    <?php
    include("../dbcon.php");

    session_start();

    if (!isset($_SESSION['admin_email'])) {
        echo "<script> alert('Log in first'); </script>";
        echo "<script> location.href = 'admin_login.php' ; </script>";
    } else {
        include("base.php");
        header2();
        

        // logic for retreiving data

        $sql1 = "SELECT * FROM booklist_tb";
        $result = $conn->query($sql1);
        $totalbooking = $result->num_rows;
        $now = date("Y-m-d");
        // echo $now;

        $sql2 = "SELECT COUNT(*) as 'count' FROM booklist_tb where pick_d >= '$now'";
        $result2 = $conn->query($sql2);
        $activebooking = $result2->fetch_assoc();
        // var_dump($activebooking);
        $activebooking1 = $activebooking['count'];

        $sql21 = "SELECT car_model, COUNT(*) as 'max' FROM booklist_tb GROUP BY car_model;";
        $result21 = $conn->query($sql21);
        $max = 0;
        // $maxcar = "";
        while($activebooking11 = $result21->fetch_assoc()){
            // var_dump($activebooking11);
            
            if((int)$activebooking11['max'] > $max){
                $max = (int) $activebooking11['max'];
            }
            if ((int) $activebooking11['max'] === $max) {
                $maxcar = $activebooking11['car_model'];
            }

        }

        $sql4 = "SELECT car_name FROM `carinfo_tb` where car_model = '$maxcar'";
        $result4 = $conn->query($sql4);
        $car = $result4->fetch_assoc();
        $mcar = $car['car_name'];

        $sql3 = "SELECT * FROM `requesterlogin_tb`";
        $result3 = $conn->query($sql3);
        $totalusers = $result3->num_rows;


        // logic for retreiving data ends here


    ?>
        <!-- dashboard -->

        <section class="text-gray-500 bg-gray-900 body-font">
            <div class="container px-5 py-15 mx-auto">
                <div class="flex flex-col text-center w-full mb-20">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font  mt-4 text-green-500">Dashboard</h1>
                    <hr class="bg-blue-800">
                    <!-- <p class="lg:w-2/3 mx-auto leading-relaxed text-base"></p> -->
                </div>
                <div class="flex flex-wrap -m-2 text-center">
                    <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                        <div class="border-2 border-gray-800 px-4 py-6 rounded-lg">

                            <h2 class="title-font font-medium text-2xl text-white"><?php echo $totalbooking; ?></h2>
                            <p class="leading-relaxed">Total Bookings</p>
                        </div>
                    </div>
                    <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                        <div class="border-2 border-gray-800 px-4 py-6 rounded-lg">

                            <h2 class="title-font font-medium text-2xl text-white"><?php echo $activebooking1; ?></h2>
                            <p class="leading-relaxed">Active booking</p>
                        </div>
                    </div>
                    <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                        <div class="border-2 border-gray-800 px-4 py-6 rounded-lg">

                            <a href="booking_details.php">
                                <h2 class="title-font font-medium text-2xl text-indigo">Check</h2>

                            </a>
                            <p class="leading-relaxed">Booking Details</p>
                        </div>
                    </div>
                    <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                        <div class="border-2 border-gray-800 px-4 py-6 rounded-lg">

                            <h2 class="title-font font-medium text-2xl text-white"><?php echo $totalusers; ?></h2>
                            <p class="leading-relaxed">Total Users</p>
                        </div>
                    </div>
                    <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                        <div class="border-2 border-gray-800 px-4 py-6 rounded-lg">

                            <h2 class="title-font font-medium text-2xl text-white"><?php echo $mcar; ?></h2>
                            <p class="leading-relaxed">Most Demanded vehicle</p>
                        </div>
                    </div>
                    <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                        <div class="border-2 border-gray-800 px-4 py-6 rounded-lg">

                            <a href="edit_cars.php">
                                <h2 class="title-font font-medium text-2xl text-indigo">Add</h2>

                            </a>
                            <p class="leading-relaxed">Add/Edit Cars</p>
                        </div>
                    </div>
                    <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                        <div class="border-2 border-gray-800 px-4 py-6 rounded-lg">

                            <h2 class="title-font font-medium text-2xl text-white">74</h2>
                            <p class="leading-relaxed">Dues</p>
                        </div>
                    </div>
                    <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                        <div class="border-2 border-gray-800 px-4 py-6 rounded-lg">

                            <h2 class="title-font font-medium text-2xl text-white">46</h2>
                            <p class="leading-relaxed">other</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- dashboard ends -->

        <?php
        foot();
        ?>

        <script src="../bootstrap/js/jquery-3.2.1.slim.min.js"></script>
        <script src="../bootstrap/js/jquery.vide.js"></script>
        <script src="../bootstrap/js/popper.min.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>

<?php
    }
?>