<?php
session_start();
if (!isset($_SESSION['date'])) {
    echo "<script> alert('Select Date First'); </script>";
    echo "<script> location.href='index.php'; </script>";
} else {

?>

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
    <title>Available Cars</title>
</head>

<body>
    <?php
    
   

    include("run.php");
    header1("");
    $var2 = "";
    include('dbcon.php');
    $sql2 = "SELECT * from carinfo_tb";
    $result2 = $conn->query($sql2);

    $num = $result2->num_rows;

    if (isset($_REQUEST['select'])) {
        $select = $_REQUEST['carm'];
        $sql3 = "SELECT car_model from carinfo_tb where car_model='$select'";
        $result3 = $conn->query($sql3);

        if ($result3 == true) {
            $var1 = $result3->fetch_assoc();
            $var2 = $var2 . $var1['car_model'];
            // var_dump($var1);
            $_SESSION['var2'] = $var2;
            // var_dump($_SESSION);
            echo "<script> location.href='login.php'; </script>";
        }
    }
    ?>
    <div class="text-gray-500 bg-gray-900 body-font relative">

        <div class="row ml-4 bg-gray-900 rounded-lg p-8 py-10">
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

                <div class="col-sm-2 ml-3 mt-5 py-4 bg-gray-900 rounded-lg p-8 py-10">


                    <div class="card d-inline-block  w-100 ">
                        <div class="inner bg-gray-900 rounded-lg">
                            <img class="card-img-top" src="<?php echo $carimage ?>" alt="Card image cap">
                        </div>
                        <div class="card-body  bg-gray-900 rounded-lg p-8 py-10 ">
                            <button type="button" class="btn btn-dark card-title w-100"><?php echo $carname; ?></button>
                            <p class="card-text">
                                <b>Model No :<?php echo $carmodel; ?></b>
                                <br>
                                <b>Mileage :<?php echo $carmileage; ?></b>
                                <br>
                                <b>Seater :<?php echo $carseat; ?></b>
                                <br>
                                <b>Price/day :<?php echo $carprice; ?></b>
                                <br>
                                <?php
                                for ($i = 0; $i < $_SESSION['count']; $i++) {
                                    if ($_SESSION['md' . $i] == $carmodel) { ?>

                                        <form action="#cf" method="POST">

                                            <input type="submit" class="btn btn-lg ml-4 mt-3 disabled" style="background-color: burlywood;color:black;font-weight:bold;" value="Select">
                                            <p class="text-teal-500 text-center text-gray-500 tracking-widest font-medium title-font mb-1 mt-3 " style="font-weight: bold;">Not Available</p>


                                        </form>

                                    <?php
                                        $dekho = 1;
                                        break;
                                    }
                                }
                                // else{
                                if ($dekho == 0) {
                                    ?>
                                    <form action="#cf" method="POST">
                                        <input type="hidden" name="carm" value="<?php echo $carmodel; ?>">
                                        <input type="submit" class="btn btn-lg ml-4 mt-3" name="select" style="background-color: burlywood;color:black;font-weight:bold;" value="Select">
                                    </form>
                                <?php
                                    // break;
                                }

                                ?>
                            </p>
                        </div>
                    </div>

                </div>

            <?php
                $a += 1;
            }

            ?>
        </div>
    </div>


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

<?php
    }
    ?>