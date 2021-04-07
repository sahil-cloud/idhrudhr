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
    <title>Signup</title>
</head>

<body>
    <?php
    session_start();
    include("dbcon.php");
    include("run.php");
    header1();

    use PHPMailer\PHPMailer\PHPMailer;


    if (isset($_REQUEST['tokens'])) {
        $r = $_REQUEST['token'];
        $rEmail  = $_SESSION['email'];
        //  echo "<script> alert('$r'); </script>";
        // $sql111 = "SELECT token FROM requesterlogin_tb WHERE r_Email = '$rEmail'";
        // $result11 = $conn->query($sql111);
        // $res = $result11->fetch_assoc();
        $token1 = $_SESSION['token'];
        $rName = $_SESSION['name'];
        $rPhone = $_SESSION['phone'];
        $rPassword = $_SESSION['pass'];

        // hashing password
        $hashp = password_hash($rPassword, PASSWORD_DEFAULT);

        if ($r === $token1) {

            $sql = "INSERT INTO requesterlogin_tb(r_name,r_email,r_password,r_phone,token,status)VALUES('$rName','$rEmail','$hashp','$rPhone','$token1','Active')";
            $res2 = $conn->query($sql);

            if ($res2) {
                $_SESSION['display'] = 'false';
                $_SESSION['status'] = "active";
                echo "<script> alert('verified successfully'); </script>";
                // echo "<script> location.href='car_book.php'; </script>";
                if (isset($_SESSION['date'])) {
                    echo "<script> alert('Continue Booking');
                            location.href='car_book.php';

                     </script>";
                } else {
                    echo "<script> alert('Start Booking');
                     location.href='index.php';
                    </script>";
                }
            }
        } else {
            echo "<script> alert('Invalid token '); </script>";
        }
    }

    // for cancelling 
    if(isset($_REQUEST['cancel'])){
        session_unset();
        session_destroy();
        echo "
            <script>
            location.href = 'index.php';
            </script>
        ";
    }

    if (isset($_REQUEST['signup'])) {
        // echo '<script>
        //                   let x = document.createElement("INPUT");
        //                     x.setAttribute("type", "text");
        //                     x.setAttribute("placeholder", "Enter Token");
        //                     x.setAttribute("name", "token");
        //                     document.getElementById("token").appendChild(x);
        //             </script>';

        if (($_REQUEST['rName'] == "") || ($_REQUEST['rEmail'] == "") || ($_REQUEST['rPassword'] == "") || ($_REQUEST['rPhone'] == "")) {
            $msg = '<div class="alert alert-danger mt-2" role="alert"> All fields are required</div>';
        } else {
            // token generation
            function getToken($length)
            {
                $token = "";
                $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                $codeAlphabet .= "abcdefghijklmnopqrstuvwxyz";
                $codeAlphabet .= "0123456789";
                $max = strlen($codeAlphabet);

                for ($i = 0; $i < $length; $i++) {
                    $token .= $codeAlphabet[random_int(0, $max - 1)];
                }

                return $token;
            }
            $token = getToken(10);
            $_SESSION['token'] = $token;
            $rName = $_REQUEST['rName'];
            $rEmail = $_REQUEST['rEmail'];
            $rPhone = $_REQUEST['rPhone'];
            $rPassword = $_REQUEST['rPassword'];

            $_SESSION['email'] = $rEmail;
            $_SESSION['phone'] = $rPhone;
            $_SESSION['name'] = $rName;
            $_SESSION['pass'] = $rPassword;

            // displaying only token
            $_SESSION['display'] = 'true';

            $sql = "SELECT r_email FROM requesterlogin_tb WHERE r_Email = '$rEmail'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<script> alert('Email Already Exist'); </script>";
            } else {

                //checking email already registrd
                $sql = "SELECT r_email FROM requesterlogin_tb WHERE r_Email = '$rEmail'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo "<script> alert('All Field Are Required'); </script>";
                } else {
                    //assigning users values to variables

                    // $str_pwd = password_hash($rPassword, PASSWORD_BCRYPT);
                    // $str_pwd1 = password_hash($cPassword, PASSWORD_BCRYPT);
                    // $_SESSION['rName']= $rName;




                    // if ($conn->query($sql) == TRUE) {
                    // sending mail

                    $mailto = $rEmail;
                    $mailsub = "Email CONFIRMATION";
                    $mailmsg = "Hello $rName Enter the token in the field to verify your account your token is $token .Thank You";
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
                    $mail->Username = "";
                    $mail->Password = "";
                    $mail->setFrom("idhrudhr.carrental@gmail.com");
                    $mail->Subject = $mailsub;
                    $mail->Body = $mailmsg;
                    $mail->addAddress($mailto);

                    if ($mail->send()) {
                        echo "<script> alert('Enter the token to verify your email'); </script>";
                        echo "<script> location.href='signup.php'; </script>";
                    } else {
                        echo "<script>alert('some error occured Please try again');</script>";
                        echo "<script> location.href='signup.php'; </script>";
                    }


                    // sending mail ended

                    // echo "<script> location.href='car_book.php'; </script>";


                    // } else {
                    //     echo "<script> alert('Cannot Create Account'); </script>";
                    // }
                }
            }
        }
    }
    // signup_form();
    ?>
    <!-- login form -->
    <section class="text-gray-500 bg-gray-900 body-font relative">
        <div class="absolute inset-0 bg-gray-900 container-fluid">
            <iframe title="map" width="100%" height="100%" frameborder="0" marginheight="0" marginwidth="0" scrolling="no" src="img/try7.jpg" style="filter: grayscale(1) contrast(1.2) opacity(0.3);"></iframe>
        </div>
        <div class="container px-5 py-20 mx-auto flex">
            <form class="lg:w-1/3 md:w-1/2 bg-gray-900 rounded-lg p-8 py-10 flex flex-col md:ml-auto w-full mt-10 md:mt-0 relative z-10" method="POST">
               
            <?php
                if(!isset($_SESSION['display'])){
            ?>
            <h2 class="text-white text-lg mb-3 font-medium title-font">Create Account</h2>
                <!-- <p class="leading-relaxed mb-5 text-gray-500">Post-ironic portland shabby chic echo park, banjo fashion axe</p> -->
                <input class="bg-gray-800 text-white rounded border border-gray-700 focus:outline-none focus:border-teal-500 text-base px-4 py-2 mb-4" placeholder="Email" type="email" name="rEmail">
                <input class="bg-gray-800 text-white rounded border border-gray-700 focus:outline-none  text-base px-4 py-2 mb-4 resize-none" placeholder="Name" name="rName">
                <input class="bg-gray-800 text-white rounded border border-gray-700 focus:outline-none  text-base px-4 py-2 mb-4 resize-none" placeholder="Phone" name="rPhone">
                <input class="bg-gray-800 text-white rounded border border-gray-700 focus:outline-none  text-base px-4 py-2 mb-4 resize-none" placeholder="New Password" type="password" name="rPassword">
                <!-- <input class="bg-gray-800 text-white rounded border border-gray-700 focus:outline-none  text-base px-4 py-2 mb-4 resize-none" placeholder="Confirm Password" name="cPassword"> -->
                <button class="text-white bg-teal-500 border-0 py-2 px-6 focus:outline-none hover:bg-teal-600 rounded text-lg" type="submit" name="signup">Sign Up</button>
                <p class="text-xs text-gray-600 mt-3">We will not share your Email and Password With anyone</p>
                <p class="text-xs text-gray-600 mt-3">Sigup first then verify token</p>

                    <?php
                }
                if(isset($_SESSION['display'])){
                    ?>
                
                <p class="text-xs text-gray-600 ">

                    <input class="bg-gray-800 text-white rounded border border-gray-700 focus:outline-none  text-base px-4 py-2 mb-4 resize-none" placeholder="Enter token " type="text" name="token">;
                    <button class="text-white bg-teal-500 border-0 py-2 px-6 focus:outline-none hover:bg-teal-600 rounded text-lg" type="submit" name="tokens">Verify</button>;
                    <button class="text-white bg-teal-500 border-0 py-2 px-8 focus:outline-none hover:bg-teal-600 rounded text-lg" type="submit" name="cancel">Cancel</button>;
                </p>
                <?php
                    }
                ?>

            </form>

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
                    <strong style="color: white; font-size:15px">Developed By: SAHIL JASUJA</strong>
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
