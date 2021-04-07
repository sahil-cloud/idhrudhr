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
    <title>About Us</title>
</head>

<body>
    <?php
    include("dbcon.php");
    session_start();
    include("run.php");

    header1();
    ?>

    <!-- main page -->
    <section class="text-gray-500 bg-gray-900 body-font">
        
        <div class="container px-5 py-15 mx-auto">
            <div class="xl:w-1/2 lg:w-3/4 w-full mx-auto text-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="inline-block w-8 h-8 text-gray-700 mb-8" viewBox="0 0 975.036 975.036">
                    <path d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z"></path>
                </svg>
                <h4 class="text-teal-500">Online Cab Service:</h4>
                <p class="leading-relaxed text-lg"> We are <b>IdhrUdhr</b> Car Rentals, an online cab booking aggregator, providing customers with
                    reliable
                    and premium Intercity
                    and Local car rental services..</p>
                <span class="inline-block h-1 w-10 rounded bg-indigo-500 mt-8 mb-6"></span>
                <h2 class="text-white font-medium title-font tracking-wider text-sm">IdhrUdhr</h2>
                <p class="text-gray-600">idhrudhr.carrental@gmail.com</p>
                <a href="www.facebook.com/sahiljasuja" class="p-1" style="color:rgb(59,90,154);"><i class="fab fa-2x fa-facebook-square" style="margin-bottom: 5px;"></i></a>
                <a href="www.instagram.com/thesahiljasuja7" class="p-1" style="color:rgb(202, 96, 144);"><i class="fab fa-2x fa-instagram" style="margin-bottom: 5px"></i></a>
                <a href="www.twitter.com" class="p-1" style="color:#00ACEE;"><i class="fab fa-2x fa-twitter" style="margin-bottom: 5px"></i></a>
                <a href="www.gmail.com/idhrudhr.carrental@gmail.com" class="p-1" style="color:rgb(119, 24, 11);"><i class="fab fa-2x fa-google-plus-square" style="margin-bottom: 5px"></i></a>
            </div>
        </div>
    </section>
    <!--  -->
    <section class="text-gray-500 bg-gray-900 body-font">
        <div class="container px-5 py-15 mx-auto">
            <h1 class="text-3xl font-medium text-black title-font  mb-12 text-center"><strong>About Us</strong>
            </h1>
            <span class="inline-block h-1 w-20 rounded bg-indigo-500 mt-8 mb-6 "></span>


            <div class="flex flex-wrap -m-4">
                <div class="p-4 md:w-1/2 w-full">
                    <div class="h-full bg-gray-800 p-8 rounded">
                        <!-- <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="block w-5 h-5 text-gray-600 mb-4" viewBox="0 0 975.036 975.036">
                            <path d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z"></path>
                        </svg> -->
                        <h4 class="text-teal-500">Exploring India, one road trip at a time</h4>
                        <p class="leading-relaxed mb-6">To us, a road trip is one of the most exhilarating ways to travel the length and breadth of India. There's always something to look at, something to explore and to experience. Because we love travelling by road so much, we've been striving to make sure you have a great experience too. We wanted more of you to go on a road trip, and more of you to experience the same joys of travel that we do.</p>
                        <!-- <a class="inline-flex items-center">
                            <img alt="testimonial" src="https://dummyimage.com/106x106" class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center">
                            <span class="flex-grow flex flex-col pl-4">
                                <span class="title-font font-medium text-white">Holden Caulfield</span>
                                <span class="text-gray-600 text-sm">UI DEVELOPER</span>
                            </span>
                        </a> -->
                    </div>
                </div>
                <div class="p-4 md:w-1/2 w-full">
                    <div class="h-full bg-gray-800 p-8 rounded">
                        <!-- <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="block w-5 h-5 text-gray-600 mb-4" viewBox="0 0 975.036 975.036">
                            <path d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z"></path>
                        </svg> -->
                        <h4 class="text-teal-500">No matter where you travel - we've got a cab for you:</h4>
                        <p class="leading-relaxed mb-6">Planning a weekend getaway? Our outstation cab services will help you explore the best destinations, visit all the must-see places and taste the best local food. Did you just land at an airport or railway station closest to your destination? No problem! You can use our airport taxi, the transit pick up service to cover the last mile. We'll get you to your destination and show you some of the best sights along the way.</p>
                        <!-- <a class="inline-flex items-center">
                            <img alt="testimonial" src="https://dummyimage.com/107x107" class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center">
                            <span class="flex-grow flex flex-col pl-4">
                                <span class="title-font font-medium text-white">Alper Kamu</span>
                                <span class="text-gray-600 text-sm">DESIGNER</span>
                            </span>
                        </a> -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- main page end-->
    <!-- ceo talk -->
    <section class="text-gray-500 bg-gray-900 body-font">
        <div class="container px-5 py-15 mx-auto">
            <div class="xl:w-1/2 lg:w-3/4 w-full mx-auto text-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="inline-block w-8 h-8 text-gray-700 mb-8" viewBox="0 0 975.036 975.036">
                    <path d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z"></path>
                </svg>
                <h4 class="text-teal-500">IdhrUdhr:</h4>
                <p class="leading-relaxed text-lg"> Our focus will remain on continuously creating differentaited value for the inter-city traveler. We have several exciting offerings lined up, the most prominent being 'Package Offers' to key tourist and buisness destinations. With your support, these initiatives will transform road travel into even more memorable and exciting journeys.
                    .</p>
                <span class="inline-block h-1 w-10 rounded bg-indigo-500 mt-8 mb-6"></span>
                <h2 class="text-white font-medium title-font tracking-wider text-sm">Sahil Jasuja</h2>
                <p class="text-gray-600">CEO,IdhrUdhr CAR RENTAL</p>
                <p class="text-gray-600">sahiljasuja666@gmail.com</p>
                <a href="www.facebook.com/sahiljasuja" class="p-1" style="color:rgb(59,90,154);"><i class="fab fa-2x fa-facebook-square" style="margin-bottom: 5px;"></i></a>
                <a href="www.instagram.com/thesahiljasuja7" class="p-1" style="color:rgb(202, 96, 144);"><i class="fab fa-2x fa-instagram" style="margin-bottom: 5px"></i></a>
                <a href="www.twitter.com" class="p-1" style="color:#00ACEE;"><i class="fab fa-2x fa-twitter" style="margin-bottom: 5px"></i></a>
                <a href="www.gmail.com/sahiljasuja666@gmail.com" class="p-1" style="color:rgb(119, 24, 11);"><i class="fab fa-2x fa-google-plus-square" style="margin-bottom: 5px"></i></a>
            </div>
        </div>
    </section>
    <!--  -->

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