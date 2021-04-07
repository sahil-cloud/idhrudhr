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
    <title>Login</title>
</head>

<body>
    <?php
    include("dbcon.php");
    include("run.php");
    header1("");


    session_start();
    if (!isset($_SESSION['email'])) {
        if ((isset($_REQUEST['rEmail'])) || (isset($_REQUEST['rPassword']))) {


            // var_dump($_SESSION);

            if (isset($_REQUEST['rLogin'])) {
                $email = $_REQUEST['rEmail'];
                $password = $_REQUEST['rPassword'];
                
                // checking password




                $sql = "SELECT * FROM requesterlogin_tb where r_email= '$email'";

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {

                    $rrr = $result->fetch_assoc();

                    if(password_verify($password,$rrr['r_password']))
                    {
                    // var_dump($rrr);
                    $_SESSION['name'] = $rrr['r_name'];
                    $_SESSION['phone'] = $rrr['r_phone'];
                    // var_dump($_SESSION);
                    // for checking active session
                    $_SESSION['email'] = $email;
                    $_SESSION['pass'] = $password;
                    $_SESSION['status'] = "active";
                    


                    echo "<script>
                alert('Login Successful. Press ok to continue');
             </script>";

                    if (isset($_SESSION['date'])) {
                        echo "<script> alert('Continue Booking');
                            location.href='car_book.php';

                     </script>";
                    } else {
                        echo "<script> alert('Start Booking');
                     location.href='index.php';
                    </script>";
                    }
                    // <?php
                    // echo "<script>  </script>";
                } else {
                    echo "<script> alert('You are not registered'); </script>";
                }
            }else{
                    echo "<script>
                alert('incorrect password');
             </script>";
            }
            
        }





            //redirecting to profile page
        }
    } else {
        $e = $_SESSION['email'];
        $try = "SELECT * from requesterlogin_tb where r_email = '$e' ";
        $catch = $conn->query($try);
        // $res1 = $catch->fetch_assoc();

        if($catch->num_rows >0){

                ?>
                    <script>
                        alert("Already Logged In . Press Ok to Continue");
                    </script>
                <?php
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

    }
        
        
    

    if (isset($_REQUEST['rSignup'])) {
        echo "<script> location.href='signup.php';
                     location.href='signup.php';
        </script>";
    }
    ?>
    <!-- login form -->
    <section class="text-gray-500 bg-gray-900 body-font relative">
        <div class="absolute inset-0 bg-gray-900">
            <iframe title="map" width="200%" height="200%" frameborder="0" marginheight="0" marginwidth="0" scrolling="no" src="img/try5.jpg" style="filter: grayscale(1) contrast(1.2) opacity(0.3);"></iframe>
        </div>
        <div class="container px-5 py-25 mx-auto flex">
            <form class="lg:w-1/3 md:w-1/2 bg-gray-900 rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0 relative z-10" method="POST">
                <h2 class="text-white text-lg mb-3 font-medium title-font">Login Now</h2>
                <!-- <p class="leading-relaxed mb-5 text-gray-500">Post-ironic portland shabby chic echo park, banjo fashion axe</p> -->
                <input class="bg-gray-800 text-white rounded border border-gray-700 focus:outline-none focus:border-teal-500 text-base px-4 py-2 mb-4" placeholder="Email" type="email" name="rEmail">
                <input class="bg-gray-800 text-white rounded border border-gray-700 focus:outline-none  text-base px-4 py-2 mb-4 resize-none" placeholder="Password" name="rPassword">

                <button name="rLogin" type="submit" class="text-white bg-teal-500 border-0 py-2 px-6 focus:outline-none hover:bg-teal-600 rounded text-lg">Login</button>

                <p class="text-xs text-gray-600 mt-3">Do Not have an account.Sign Up</p>
                <button name="rSignup" type="submit" class="text-white bg-teal-500 border-0 py-2 px-6 focus:outline-none hover:bg-teal-600 rounded text-lg">Sign Up</button>

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