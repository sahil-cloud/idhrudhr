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
    <title>Booking</title>

</head>

<body>
    <?php
    session_start();
    if (!isset($_SESSION['email'])) {
        echo "<script> alert('Login in Again'); </script>";
        echo "<script> location.href='login.php'; </script>";
    }

    use PHPMailer\PHPMailer\PHPMailer;

    include("dbcon.php");
    include("run.php");
    header1();


    if (isset($_REQUEST['book'])) {
        if (($_REQUEST['rName'] == "") || ($_REQUEST['rEmail'] == "") || ($_REQUEST['rPhone'] == "")) {
            echo "<script> alert('All Field Are Required'); </script>";
        } else {

            $email = $_REQUEST['rEmail'];
            $contact = $_REQUEST['rPhone'];
            $date = $_SESSION['date'];
            $edate = $_SESSION['edate'];
            $city = $_SESSION['city'];
            $time = $_SESSION['time'];
            $car_model = $_SESSION['var2'];

            $sql00 = "SELECT car_name,car_seat from carinfo_tb where car_model='$car_model'";
            $result00 = $conn->query($sql00);
            $value = $result00->fetch_assoc();
            $carname = $value['car_name'];
            $carseat = $value['car_seat'];

            // findind the cars avaialble
            $sql = "SELECT  * from booklist_tb where ( (pick_d = '$date' and end_d = '$edate')
    )";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<script>alert('Already booked');</script>";
                echo "<script> location.href='index.php'; </script>";
            } else {

                $sql = "INSERT INTO booklist_tb (email,phone,pick_d,end_d,city,pick_t,car_model)
                values ('$email','$contact','$date','$edate','$city','$time','$car_model')";

                if ($conn->query($sql) == TRUE) {
                    $msg = '<div class="alert alert-success mt-2" role="alert">Data inserted succesfully</div>';

    ?>
                    <script>
                        alert("Booking suceessfully. Press ok to continue");
                    </script>
        <?php
                    $mailto = $email;
                    $mailsub = "BOOKING CONFIRMATION";
                    $mailmsg = "your booking for $carname $carseat has been confirmed for the date $date we wil be there at $time. Thank you for booking.Have a nice day";
                    include('PHPMailer/src/PHPMailer.php');
                    include('PHPMailer/src/Exception.php');
                    include('PHPMailer/src/SMTP.php');
                    $mail = new PHPMailer();
                    $mail->isSMTP();
                    $mail->SMTPDebug = 1;
                    $mail->SMTPAuth = true;
                    $mail->SMTPSecure = 'tls';
                    $mail->Host = 'smtp.gmail.com';
                    $mail->Port = 587;
                    $mail->isHTML(true);
                    $mail->Username = "idhrudhr.carrental@gmail.com";
                    $mail->Password = "IdhrUdhr@hack_1";
                    $mail->setFrom("idhrudhr.carrental@gmail.com");
                    $mail->Subject = $mailsub;
                    $mail->Body = $mailmsg;
                    $mail->addAddress($mailto);

                    if ($mail->send()) {
                        echo "<script>alert('confirmation mail has been sent');</script>";

                        echo "<script> location.href='index.php'; </script>";
                    } else {
                        echo "<script>alert('mail not sent');</script>";

                        echo "<script> location.href='index.php'; </script>";
                    }
                } else {
                    echo "<script>alert('Cannot Book Cab');</script>";
                }
            }
        }
    }

    function car_detail()
    {
        ?>
        <section class="text-gray-500 body-font bg-gray-900">
            <div class="container px-5 py-15 mx-auto">
                <div class="flex flex-wrap w-full mb-20 flex-col items-center text-center">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-teal-500">CONFIRM BOOKING</h1>
                    <p class="lg:w-1/2 w-full leading-relaxed text-base">You can change Name , Email or Phone for the booking.<br> Our Driver will call you and you can change Address and Time of pickup According to your Convenience</p>
                    <p class="lg:w-1/2 w-full leading-relaxed text-base">
                        <a href="profile.php" class="lg:w-1/2 w-full leading-relaxed text-base mr-5 ">
                            <i class="fas fa-user" style="color: black"></i>
                            <button class="btn font-weight-bold" style="color:darkgray;">Profile</button>
                        </a>
                        <a href="logout.php" class="lg:w-1/2 w-full leading-relaxed text-base">
                            <i class="fas fa-sign-out-alt" style="color: black"></i>
                            <button class="btn font-weight-bold" style="color:darkgray;">Logout</button>
                        </a>
                    </p>
                </div>
                <form class="flex flex-wrap -m-4" method="POST">
                    <div class="xl:w-1/3 md:w-1/2 p-4">
                        <div class="border border-gray-800 p-6 rounded-lg">

                            <h2 class="text-lg text-teal-500 text-center font-medium title-font mb-4">NAME</h2>
                            <input class="bg-gray-800 text-white rounded border border-gray-700 focus:outline-none  text-base px-4 py-2 mb-4 resize-none" placeholder="Name" name="rName" value="<?php echo $_SESSION['name']; ?>">

                        </div>
                    </div>
                    <div class="xl:w-1/3 md:w-1/2 p-4">
                        <div class="border border-gray-800 p-6 rounded-lg">

                            <h2 class="text-lg text-teal-500 text-center font-medium title-font mb-4">EMAIL</h2>
                            <input class="bg-gray-800 text-white rounded border border-gray-700 focus:outline-none focus:border-teal-500 text-base px-4 py-2 mb-4" placeholder="Email" type="email" name="rEmail" value="<?php echo $_SESSION['email']; ?>">

                        </div>
                    </div>
                    <div class="xl:w-1/3 md:w-1/2 p-4">
                        <div class="border border-gray-800 p-6 rounded-lg">

                            <h2 class="text-lg text-teal-500 text-center font-medium title-font mb-4">CONTACT</h2>
                            <input class="bg-gray-800 text-white rounded border border-gray-700 focus:outline-none  text-base px-4 py-2 mb-4 resize-none" placeholder="Phone" name="rPhone" value="<?php echo $_SESSION['phone']; ?>">

                        </div>
                    </div>
                    <div class="xl:w-1/3 md:w-1/2 p-4">
                        <div class="border border-gray-800 p-6 rounded-lg">

                            <h2 class="text-lg text-teal-500 text-center font-medium title-font mb-2">FROM</h2>
                            <p class="leading-relaxed text-base text-center"><?php echo $_SESSION['date']; ?></p>
                        </div>
                    </div>
                    <div class="xl:w-1/3 md:w-1/2 p-4">
                        <div class="border border-gray-800 p-6 rounded-lg">

                            <h2 class="text-lg text-teal-500 text-center font-medium title-font mb-2">TO</h2>
                            <p class="leading-relaxed text-base text-center"><?php echo $_SESSION['edate']; ?></p>
                        </div>
                    </div>
                    <div class="xl:w-1/3 md:w-1/2 p-4">
                        <div class="border border-gray-800 p-6 rounded-lg">

                            <h2 class="text-lg text-teal-500 text-center font-medium title-font mb-2">TIME</h2>
                            <p class="leading-relaxed text-base text-center"><?php echo $_SESSION['time']; ?></p>
                        </div>
                    </div>
                    <button type="submit" name="book" class="flex mx-auto mt-16 text-white bg-teal-500 border-0 py-2 px-8 focus:outline-none hover:bg-teal-600 rounded text-lg">BOOK</button>

                </form>
                <p class="leading-relaxed text-base text-center mt-4    ">Read the payment and cancellation details before Booking</p>

            </div>
            <!-- <h2 class="text-xs text-gray-500 tracking-widest font-medium title-font mb-1" style="font-weight: bold;">Read the payment and cancellation details before Booking </h2> -->

        </section>
    <?php

    }


    function payment_details()
    {
    ?>
        <section class="text-gray-500 bg-gray-900 body-font">
            <div class="container px-5 py-15 mx-auto flex flex-wrap">
                <div class="flex flex-col text-center w-full mb-20">
                    <h2 class="text-xs text-gray-500 tracking-widest font-medium title-font mb-1" style="font-weight: bold;">IDHR UDHR</h2>
                    <h1 class="sm:text-3xl text-2xl font-medium title-font text-teal-500">PAYMENT DETAILS:</h1>
                    <h2 class="text-xs text-gray-500 tracking-widest font-medium title-font mb-1" style="font-weight: bold;">Payment Will be taken through Any of the described Method</h2>

                </div>
                <div class="flex flex-wrap -m-4">
                    <div class="p-4 md:w-1/3">
                        <div class="flex rounded-lg h-full bg-gray-800 p-8 flex-col">
                            <div class="flex items-center mb-3">
                                <div class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-teal-500 text-white flex-shrink-0">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                        <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                                    </svg>
                                </div>
                                <button class="text-black bg-teal-500 border-0 py-2 px-8 focus:outline-none hover:bg-teal-600 rounded text-lg" style="font-weight: bold;">via CARD</button>

                            </div>
                            <div class="flex-grow">
                                <p class="leading-relaxed text-base">We Accept all the cards.So making your Payment Mode easier</p>

                            </div>
                        </div>
                    </div>
                    <div class="p-4 md:w-1/3">
                        <div class="flex rounded-lg h-full bg-gray-800 p-8 flex-col">
                            <div class="flex items-center mb-3">
                                <div class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-teal-500 text-white flex-shrink-0">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                        <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                </div>
                                <button class="text-black bg-teal-500 border-0 py-2 px-8 focus:outline-none hover:bg-teal-600 rounded text-lg" style="font-weight: bold;">via CASH</button>

                            </div>
                            <div class="flex-grow">
                                <p class="leading-relaxed text-base">We also Provide the advantage of paying through Cash.</p>

                            </div>
                        </div>
                    </div>
                    <div class="p-4 md:w-1/3">
                        <div class="flex rounded-lg h-full bg-gray-800 p-8 flex-col">
                            <div class="flex items-center mb-3">
                                <div class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-teal-500 text-white flex-shrink-0">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                        <circle cx="6" cy="6" r="3"></circle>
                                        <circle cx="6" cy="18" r="3"></circle>
                                        <path d="M20 4L8.12 15.88M14.47 14.48L20 20M8.12 8.12L12 12"></path>
                                    </svg>
                                </div>
                                <button class="text-black bg-teal-500 border-0 py-2 px-8 focus:outline-none hover:bg-teal-600 rounded text-lg" style="font-weight: bold;">via E-Wallets</button>

                            </div>
                            <div class="flex-grow">
                                <p class="leading-relaxed text-base">E-Wallets have ended the need of carrying cash.So we also provide the facility of paying through E-Wallets</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- cancelation details -->
            <div class="container px-5 py-20 mx-auto flex flex-wrap">
                <div class="flex flex-col text-center w-full mb-20">
                    <h2 class="text-xs text-gray-500 tracking-widest font-medium title-font mb-1" style="font-weight: bold;">IDHR UDHR</h2>
                    <h1 class="sm:text-3xl text-2xl font-medium title-font text-teal-500">CANCELLATION DETAILS:</h1>
                    <h2 class="text-xs text-gray-500 tracking-widest font-medium title-font mb-1" style="font-weight: bold;">Cancellation charges will have to paid by E-wallets or Card only</h2>
                </div>
                <div class="flex flex-wrap -m-4">
                    <div class="p-4 md:w-1/4">
                        <div class="flex rounded-lg  bg-gray-800 p-8 flex-col">
                            <div class="flex items-center mb-3">

                                <button class="text-black bg-teal-500 border-0 py-2 px-8 focus:outline-none hover:bg-teal-600 rounded text-lg" style="font-weight: bold;">Before 3 Days</button>

                            </div>
                            <div class="flex-grow">
                                <p class="leading-relaxed text-base">You will be fined with 0% of Booking charges.</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 md:w-1/4">
                        <div class="flex rounded-lg bg-gray-800 p-8 flex-col">
                            <div class="flex items-center mb-3">

                                <button class="text-black bg-teal-500 border-0 py-2 px-8 focus:outline-none hover:bg-teal-600 rounded text-lg" style="font-weight: bold;">Before  24 Hours</button>

                            </div>
                            <div class="flex-grow">
                                <p class="leading-relaxed text-base">You will be fined with 25% of Booking charges.</p>

                            </div>
                        </div>
                    </div>
                    <div class="p-4 md:w-1/4">
                        <div class="flex rounded-lg bg-gray-800 p-8 flex-col">
                            <div class="flex items-center mb-3">

                                <button class="text-black bg-teal-500 border-0 py-2 px-8 focus:outline-none hover:bg-teal-600 rounded text-lg" style="font-weight: bold;">Before 12 Hours</button>

                            </div>
                            <div class="flex-grow">
                                <p class="leading-relaxed text-base">You will be fined by 50% of Booking Charges.</p>

                            </div>
                        </div>
                    </div>
                    <div class="p-4 md:w-1/4">
                        <div class="flex rounded-lg bg-gray-800 p-8 flex-col">
                            <div class="flex items-center mb-3">

                                <button class="text-black bg-teal-500 border-0 py-2 px-8 focus:outline-none hover:bg-teal-600 rounded text-lg" style="font-weight: bold;">Before 6 Hours</button>

                            </div>
                            <div class="flex-grow">
                                <p class="leading-relaxed text-base">You will be fined by 75% of Booking Charges.</p>

                            </div>
                        </div>
                    </div>
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
    <?php

    }
    ?>

    <?php
    car_detail();
    payment_details();
    ?>

    <script src="bootstrap/js/jquery-3.2.1.slim.min.js"></script>
    <script src="bootstrap/js/jquery.vide.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>