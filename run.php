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
    <title>IdhrUdhr</title>
    <style>


    </style>
</head>

<body>
    <?php
    function header1()
    {
    ?>

        <nav class="navbar navbar-expand-lg navbar-light bg-gray-800 text-gray-500 p-3">
            <a class="navbar-brand text-white" href="index.php"><i class="fa fa-car mr-2 text-white" aria-hidden="true"></i>IdhrUdhr</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link text-white" href=" index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="aboutus.php">About Us</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link text-white" href="contact_us.php">
                            Contact Us
                        </a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white " href="gallery.php">Gallery</a>
                    </li>
                    <?php
                     if (isset($_SESSION['status']) and isset($_SESSION['email'])) {
                    ?>

                        <li class="nav-item">
                            <a class="nav-link text-white " href="book_status.php">Booking Status</a>
                        </li>

                    <?php
                    }
                    ?>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <?php
                    if (isset($_SESSION['status'])) {
                    ?>
                        <a href="profile.php" style="color:white;" class="mr-3">
                            <?php echo $_SESSION['name']; ?>
                        </a>

                    <?php

                    } else {

                    ?>

                        <a href="login.php" style="color:green;font-weight:bold; " class="mr-3">
                            Login
                        </a>
                    <?php
                    }
                    if (isset($_SESSION['email'])and isset($_SESSION['status'])) {
                    ?>

                        <a href="logout.php" style="color:green;font-weight:bold" class="mr-3">
                            Logout
                        </a>

                    <?php
                    }
                   
                    ?>
                    <a href="admin/admin_login.php" style="color:white;" class="mr-2">
                        Admin
                    </a>
                </form>
            </div>
        </nav>






    <?php
    }
    function signup_form()
    {
    ?>
        <section class="text-gray-500 bg-gray-900 body-font relative">
            <div class="absolute inset-0 bg-gray-900 ">
                <iframe title="map" width="100%" height="100%" frameborder="0" marginheight="0" marginwidth="0" scrolling="no" src="img/try6.jpg" style="filter: grayscale(1) contrast(1.2) opacity(0.3);"></iframe>
            </div>
            <div class="container px-5 py-20 mx-auto flex">
                <form class="lg:w-1/3 md:w-1/2 bg-gray-900 rounded-lg p-8 py-10 flex flex-col md:ml-auto w-full mt-10 md:mt-0 relative z-10" method="POST">
                    <h2 class="text-white text-lg mb-3 font-medium title-font">Book A Cab</h2>
                    From <br>
                    <!-- <p class="leading-relaxed mb-5 text-gray-500">Post-ironic portland shabby chic echo park, banjo fashion axe</p> -->
                    <input class="bg-gray-900 rounded border text-white border-gray-900 focus:outline-none focus:border-teal-500 text-base px-4 py-2 mb-4" placeholder="From" name="date" type="date">
                    To <br>
                    <input class="bg-gray-900 rounded border text-white border-gray-900 focus:outline-none focus:border-teal-500 text-base px-4 py-2 mb-4" placeholder="End date" name="edate" type="date">
                    Address <br>
                    <input class="bg-gray-900 rounded border text-white border-gray-900 focus:outline-none focus:border-teal-500 text-base px-4 py-2 mb-4" placeholder="Address" name="city" type="text">
                    Time <br>
                    <input class="bg-gray-900 rounded border text-white border-gray-900 focus:outline-none focus:border-teal-500 text-base px-4 py-2 mb-4" placeholder="Pic up time" name="time" type="time">
                    <a><button class="text-white bg-teal-500 lg:w-full md:w-full border-0 py-2 px-6 focus:outline-none hover:bg-teal-600 rounded text-lg" name="book" type="submit">Book</button></a>
                    <p class="text-xs text-gray-600 mt-3">unleash the journey of self-reliance,freedom and lots of hapiness</p>
                </form>

            </div>
        </section>

    <?php

    }
    function About_us()
    {
    ?>
        <section class="text-gray-500 bg-gray-900 body-font" id="abs">
            <div class="container px-5 py-15 mx-auto">
                <div class="flex flex-col">
                    <div class="h-1 bg-gray-800 rounded overflow-hidden">
                        <div class="w-24 h-full bg-teal-500"></div>
                    </div>
                    <div class="flex flex-wrap sm:flex-row flex-col py-6 mb-12">
                        <h1 class="sm:w-2/5 text-white font-medium title-font text-2xl mb-2 sm:mb-0">IdhrUdhr.tk<br>Online Cab Services</h1>
                        <p class="sm:w-3/5 leading-relaxed text-base sm:pl-10 pl-0">We are <b>IdhrUdhr.tk Car Rental</b> an online cab booking aggregator, providing customers with reliable
                            and
                            premium
                            Intercity
                            and Local car rental services</p>
                    </div>
                </div>
                <div class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4">
                    <div class="p-4 md:w-1/3 sm:mb-0 mb-6">
                        <div class="rounded-lg h-64 overflow-hidden">
                            <img alt="content" class="object-cover object-center h-full w-full" src="img/cleancar.jpg">
                        </div>
                        <button type="button" class="btn btn-dark card-title mt-4" style="background-color:darkolivegreen;color:black;font-weight:bold">Clean Cars</button>
                        <p class="text-base leading-relaxed mt-2">To us the most important thing to keep in mind is cleanliness.
                            So we provide our customers the best possible clean and friendy sound Cars.</p>
                    </div>
                    <div class="p-4 md:w-1/3 sm:mb-0 mb-6">
                        <div class="rounded-lg h-64 overflow-hidden">
                            <img alt="content" class="object-cover object-center h-full w-full" src="img/money.jpg">
                        </div>
                        <button type="button" class="btn btn-dark card-title mt-4" style="background-color:darkolivegreen;color:black;font-weight:bold">Transparent Billing</button>
                        <p class="text-base leading-relaxed mt-2">We provide our customers the transparency in billing services
                            To us money does not maater only Customer satisfaction matters.</p>
                    </div>
                    <div class="p-4 md:w-1/3 sm:mb-0 mb-6">
                        <div class="rounded-lg h-64 overflow-hidden">
                            <img alt="content" class="object-cover object-center h-full w-full" src="img/handshake.jpg">
                        </div>
                        <button type="button" class="btn btn-dark card-title mt-4" style="background-color:darkolivegreen;color:black;font-weight:bold">Reliable Service</button>

                        <p class="text-base leading-relaxed mt-2">We at <b>IdhrUdhr</b> provide every possible service our customers need
                            For us Customer satisfaction is the only key to success</p>
                    </div>
                </div>

                <div class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4">
                    <div class="p-4 md:w-1/3 sm:mb-0 mb-6">
                        <div class="rounded-lg h-64 overflow-hidden">
                            <img alt="content" class="object-cover object-center h-full w-full" src="img/customer.jpg">
                        </div>
                        <button type="button" class="btn btn-dark card-title mt-4" style="background-color:darkolivegreen;color:black;font-weight:bold">24*7 Customer Support</button>

                        <p class="text-base leading-relaxed mt-2">We at <b>IdhrUdhr</b> provide 24*7 customer care service to our customers
                            They can call anytime for any query related to us,we will try to solve it</p>

                    </div>
                    <div class="p-4 md:w-1/3 sm:mb-0 mb-6">
                        <div class="rounded-lg h-64 overflow-hidden">
                            <img alt="content" class="object-cover object-center h-full w-full" src="img/copy.jpg">
                        </div>
                        <button type="button" class="btn btn-dark card-title mt-4" style="background-color:darkolivegreen;color:black;font-weight:bold">Choice</button>

                        <p class="text-base leading-relaxed mt-2">We at <b>IdhrUdhr</b> provide a list of cars to choose From
                            Giving our customers a wide choice of cars to rent car to enjoy your outimg
                        </p>

                    </div>
                    <div class="p-4 md:w-1/3 sm:mb-0 mb-6">
                        <div class="rounded-lg h-64 overflow-hidden">
                            <img alt="content" class="object-cover object-center h-full w-full" src="img/bike1.jpg">
                        </div>
                        <button type="button" class="btn btn-dark card-title mt-4" style="background-color:darkolivegreen;color:black;font-weight:bold">Upcoming Services</button>

                        <p class="text-base leading-relaxed mt-2">We at <b>IdhrUdhr</b>will start the BIKE rental very soon
                            Giving our customers a wide choice of vehicles to rent and enjoy their outimg</p>

                    </div>
                </div>
            </div>
        </section>

    <?php
    }

    function footer11()
    {
    ?>
        <footer class="text-gray-500 bg-gray-900 body-font">
            <div class="container px-5 py-15 mx-auto">
                <div class="flex flex-wrap md:text-left text-center order-first">

                    <div class="lg:w-1/4 md:w-1/2 w-full px-4">
                        <button class="btn btn-light mt-2 mb-3" style="color: black;background-color:darkgrey" id="ser"><b>Our Services</b></button><br>

                        <nav class="list-none mb-10">
                            <a class="topfoot" style="color: white">Car Rental</a><br>
                            <a class="topfoot" style="color: white">Customised packages</a><br>
                            <a class="topfoot" style="color: white">Trips</a><br>
                            <a class="topfoot" style="color: white">Tour packages</a><br>
                            <a class="topfoot" style="color: white">Holiday Packages</a><br>
                        </nav>
                    </div>
                    <div class="lg:w-1/4 md:w-1/2 w-full px-4">
                        <button class="btn btn-light mt-2 mb-2" style="color: black; background-color:darkgrey"><b>Contact Us</b></button><br>

                        <nav class="list-none mb-10">
                            <button type="button" class="btn btn-secondary mt-1 mr-md-1 mb-2">
                                <a href="mailto:idhrudhr.carrental@gmail.com" style="color:black"><i class="fas fa-envelope salt"></i>
                                    <b>Email</b></a>
                            </button>
                            <button type=" button" class="btn btn-secondary mt-1 mr-md-1 mb-2">
                                <a href="tel:9782356004" style="color:black;"><i class="fas fa-mobile-alt btn-dark"></i>
                                    <b>Call Now</b></a>
                            </button><br>

                            <div class="embed-responsive embed-responsive-16by9 mb-3">
                                <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3681.314209813725!2d75.83900121371018!3d22.67934418512795!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3962fc4330d26ad5%3A0x7da6be546436ac8a!2sSahaj%20Residency!5e0!3m2!1sen!2sin!4v1587070107400!5m2!1sen!2sin" frameborder="0"></iframe>
                            </div>
                        </nav>
                    </div>
                    <div class="lg:w-1/4 md:w-1/2 w-full px-4">
                        <a class="mr-3" style="font-family:Verdana, Geneva, Tahoma, sans-serif; font-size: 20px;color:black;"> <b> <b><b><button class="btn btn-light mt-2 mb-2" style="color: black;background-color:darkgrey"><b>
                                                IdhrUdhr</b></button></b></b> </b></a>
                        <p style="color:white">
                            We are <b>IdhrUdhr</b> Car Rentals, an online cab booking aggregator, providing customers with
                            reliable
                            and premium Intercity
                            and Local car rental services.
                        </p>
                        <a href="www.facebook.com/sahiljasuja" class="p-1" style="color:rgb(59,90,154);"><i class="fab fa-2x fa-facebook-square" style="margin-bottom: 5px;"></i></a>
                        <a href="www.instagram.com/thesahiljasuja7" class="p-1" style="color:rgb(202, 96, 144);"><i class="fab fa-2x fa-instagram" style="margin-bottom: 5px"></i></a>
                        <a href="www.twitter.com" class="p-1" style="color:#00ACEE;"><i class="fab fa-2x fa-twitter" style="margin-bottom: 5px"></i></a>
                        <a href="www.gmail.com/idhrudhr.carrental@gmail.com" class="p-1" style="color:rgb(119, 24, 11);"><i class="fab fa-2x fa-google-plus-square" style="margin-bottom: 5px"></i></a>
                    </div>

                </div>
            </div>
            <div class="bg-gray-800">
                <div class="container px-5 py-6 mx-auto flex items-center sm:flex-row flex-col">
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
                            <strong style="color:white; font-size:15px">Developed By: SAHIL JASUJA</strong>
                        </p>

                    </span>
                </div>
            </div>
        </footer>

    <?php

    }
    ?>




    <script>
        /* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
        function myFunction() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
            } else {
                x.className = "topnav";
            }
        }
    </script>

    <script src="bootstrap/js/jquery-3.2.1.slim.min.js"></script>
    <script src="bootstrap/js/jquery.vide.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>