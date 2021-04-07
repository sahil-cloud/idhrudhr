<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/talewind.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome\css\all.css">
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style23.css">
    <title>Gallery</title>

</head>

<body>
    <?php
    include("dbcon.php");
    session_start();

    include("run.php");
    header1();

    $sql2 = "SELECT * from carinfo_tb";
    $result2 = $conn->query($sql2);

    $num = $result2->num_rows;
    ?>
    <section class="text-gray-500 bg-gray-900 body-font">
        <div class="container px-5 py-15 mx-auto">
            <div class="flex flex-col text-center w-full mb-10">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-white">Our Gallery</h1>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Choose From a wide variety of Cars <br> Click over to see details.</p>
            </div>

            <div class="flex flex-wrap -m-4">

                 <?php
            $a = 1;
            while ($num != 0) {
                $row = $result2->fetch_assoc();
                $num -= 1;
                $dekho = 0;

                $carname = $row['car_name'];
                $carmodel = $row['car_model'];
                $carmileage = $row['car_mileage'];
                $carseat = $row['car_seat'];
                $carprice = $row['car_price'];
                $carimage = $row['car_image'];

            ?>
                <div class="lg:w-1/3 sm:w-1/2 p-4">
                    <div class="flex relative">
                        <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center" src="<?php echo $carimage ?>">
                        <div class="px-8 py-10 relative z-10 w-full border-4 border-gray-800 bg-gray-900 opacity-0 hover:opacity-100">
                            <h2 class="tracking-widest text-sm title-font font-medium text-blue-500 mb-1" style="font-weight: bold;"><?php echo $carname; ?></h2>
                            <!-- <h1 class="title-font text-lg font-medium text-white mb-3">Model No :<?php echo $carmodel; ?></h1> -->
                            <hr>
                            <p class="leading-relaxed">
                            <b>Model No :<?php echo $carmodel; ?></b>
                                <br>
                                <b>Mileage :<?php echo $carmileage; ?></b>
                                <br>
                                <b>Seater :<?php echo $carseat; ?></b>
                                <br>
                                <b>Price/day :<?php echo $carprice; ?></b>
                                <br>    
                            </p>
                        </div>
                    </div>
                </div>
            <?php
            } 
            ?>
            </div>
        </div>
    </section>


    <!-- footer -->

    <footer class="text-gray-500 bg-gray-900 body-font">
        <div class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col">
            <a class="flex title-font font-medium items-center md:justify-start justify-center text-white">
                <!-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-teal-500 rounded-full" viewBox="0 0 24 24">
                            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                        </svg> -->
                <span class="ml-3 text-xl">IdhrUdhr</span>
            </a>
            <p class="text-sm text-gray-600 sm:ml-6 sm:mt-0 mt-4">© 2020 IdhrUdhr —
                <a href="https://gmail.com/idhrudhr.carrental" class="text-gray-500 ml-1" target="_blank" rel="noopener noreferrer">idhrudhr.carrental</a>
            </p>
            <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
                <p class="text-sm text-gray-600 sm:ml-6 sm:mt-0 mt-4">
                    <strong style="color: black; font-size:15px">Developed By: SAHIL JASUJA</strong>
                </p>

            </span>
        </div>
    </footer>


    <script src="bootstrap/js/jquery-3.2.1.slim.min.js"></script>
    <script src="bootstrap/js/jquery.vide.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>