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
    <title>Contact</title>
</head>

<body>
    <?php
    include("dbcon.php");
    session_start();
    include("run.php");

    header1();

    if (isset($_REQUEST['send'])) {
        if (($_REQUEST['name'] == "") || ($_REQUEST['name'] == "") || ($_REQUEST['name'] == "")) {
            echo "<script>
            alert('All Field are required');
            </script>";
        } else {
            $name = $_REQUEST['name'];
            $email = $_REQUEST['email'];
            $msg = $_REQUEST['msg'];

            $sql = "INSERT INTO contact_tb VALUES('$name','$email','$msg')";
            $result = $conn->query($sql);

            if ($result == true) {
                echo "<script>
            alert('Thank for contacting with us');
            </script>";
            } else {
                echo "<script>
            alert('Error in contact');
            </script>";
            }
        }
    }

    ?>
    <section class="text-gray-500 bg-gray-900 body-font relative">
        <div class="absolute inset-0 bg-gray-900">
            <iframe width="100%" height="100%" frameborder="0" marginheight="0" marginwidth="0" title="map" scrolling="no" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3681.314209813725!2d75.83900121371018!3d22.67934418512795!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3962fc4330d26ad5%3A0x7da6be546436ac8a!2sSahaj%20Residency!5e0!3m2!1sen!2sin!4v1587070107400!5m2!1sen!2sin" style="filter: grayscale(1) contrast(1.2) opacity(0.4);"></iframe>
        </div>

        <div class="container px-5 py-15 mx-auto relative z-10">
            <div class="flex flex-col text-center w-full mb-12">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-white">Contact Us</h1>
                <!-- <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Whatever cardigan tote bag tumblr hexagon brooklyn asymmetrical gentrify.</p> -->
            </div>
            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                <div class="flex flex-wrap -m-2">
                    <form method="POST" class="flex flex-wrap -m-2">
                        <div class="p-2 w-1/2">
                            <input class="w-full bg-gray-800 rounded border border-gray-700 text-white focus:outline-none focus:border-teal-500 text-base px-4 py-2" name="name" placeholder="Name" type="text">
                        </div>
                        <div class="p-2 w-1/2">
                            <input class="w-full bg-gray-800 rounded border border-gray-700 text-white focus:outline-none focus:border-teal-500 text-base px-4 py-2" name="email" placeholder="Email" type="email">
                        </div>
                        <div class="p-2 w-full">
                            <textarea class="w-full bg-gray-800 rounded border border-gray-700 text-white focus:outline-none h-48 focus:border-teal-500 text-base px-4 py-2 resize-none block" name="msg" type="text" placeholder="Message"></textarea>
                        </div>
                        <div class="p-2 w-full">
                            <button class="flex mx-auto text-white bg-teal-500 border-0 py-2 px-8 focus:outline-none hover:bg-teal-600 rounded text-lg" name="send">Send</button>
                        </div>
                    </form>
                    <div class="p-2 w-full pt-8 mt-8 border-t border-gray-800 text-center">
                        <a class="text-teal-500">idhrudhr.carrental@email.com</a>
                        <p class="leading-normal my-5">Sahaj residency
                            <br>kesar bagh, Indore
                        </p>
                        <span class="inline-flex">
                            <a href="www.facebook.com/sahiljasuja" class="p-1 mr-3" style="color:rgb(59,90,154);"><i class="fab fa-2x fa-facebook-square" style="margin-bottom: 5px;"></i></a>
                            <a href="www.instagram.com/thesahiljasuja7" class="p-1 mr-3" style="color:rgb(202, 96, 144);"><i class="fab fa-2x fa-instagram" style="margin-bottom: 5px"></i></a>
                            <a href="www.twitter.com" class="p-1 mr-3" style="color:#00ACEE;"><i class="fab fa-2x fa-twitter" style="margin-bottom: 5px"></i></a>
                            <a href="www.gmail.com/idhrudhr.carrental@gmail.com" class="p-1" style="color:rgb(119, 24, 11);"><i class="fab fa-2x fa-google-plus-square" style="margin-bottom: 5px"></i></a>
                        </span>
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

    <script src="bootstrap/js/jquery-3.2.1.slim.min.js"></script>
    <script src="bootstrap/js/jquery.vide.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>