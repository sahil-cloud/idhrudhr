<?php
include("dbcon.php");
session_start();

include("run.php");



// $sql1 = "SELECT  * from carinfo_tb";
// $result1 = $conn->query($sql1);
// var_dump($result1);
// echo "<br>";
// $rr=$result1->fetch_assoc();
// var_dump($rr);
// echo "<br>";
// $rr = $result1->fetch_assoc();
// var_dump($rr);
$avmd = array();
// echo "<br>";


if (isset($_REQUEST['book'])) {
    if (($_REQUEST['date'] == "") || ($_REQUEST['edate'] == "") || ($_REQUEST['city'] == "") || ($_REQUEST['time'] == "")) {
        echo "<script> alert('All Field Are Required'); </script>";
    } else {
        $now = date("Y-m-d");


        $date = $_REQUEST['date'];
        $edate = $_REQUEST['edate'];
        $time = $_REQUEST['time'];
        $city = $_REQUEST['city'];

        if (($date < $now) or ($edate <= $date))
        {
            echo "<script> alert('Enter valid dates'); </script>;";
            echo "<script> location.href='index.php'; </script>";

        }

        else{
            $_SESSION['date'] = $date;
            $_SESSION['time'] = $time;
            $_SESSION['edate'] = $edate;
            $_SESSION['city'] = $city;

        // findind the cars avaialble
        $sql = "SELECT  * from booklist_tb where ((pick_d > '$date' and end_d < '$edate') or
    (pick_d < '$date' and end_d > '$date') or (pick_d = '$date' or end_d = '$edate')
    )";
        $result = $conn->query($sql);
        // var_dump($result);
        // echo "<br>";

        while ($rr = $result->fetch_assoc()) {
            array_push($avmd, $rr['car_model']);
        }

        // var_dump($avmd);
        // echo $avmd[0]."<br>";

        $num1 = count($avmd);
        $_SESSION['count'] = $num1;

        // $num1 =
        for ($i = 0; $i < count($avmd); $i++) {
            $_SESSION['md' . $i] = $avmd[$i];
        }
        // var_dump($_SESSION);
        echo "<script> location.href='car_list.php'; </script>";
    }
}
}

header1();
signup_form();
About_us();
?>
<section class="text-gray-500 bg-gray-900 body-font">
    <div class="container px-5 mb-20 mx-auto">
        <div class="h-1 bg-gray-800 rounded overflow-hidden">
            <div class="w-24 h-full bg-teal-500"></div>
        </div>
        <div class="text-center mb-20 mt-5">
            <h3 class="sm:text-3xl text-2xl font-medium text-center title-font text-green-500 mb-4">why choose Us??</h3>
            <p class="text-base leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto">The answer is so simple.<br>We provide our customers the best experince they can have while renting a car<br>WE PROVIDE:</p>
        </div>

        <div class="flex flex-wrap lg:w-4/5 sm:mx-auto sm:mb-2 -mx-2">
            <div class="p-2 sm:w-1/2 w-full">
                <div class="bg-gray-800 rounded flex p-4 h-full items-center">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="text-indigo-500 w-6 h-6 flex-shrink-0 mr-4" viewBox="0 0 24 24">
                        <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                        <path d="M22 4L12 14.01l-3-3"></path>
                    </svg>
                    <span class="title-font font-medium text-white">Security and Hygiene</span>
                </div>
            </div>
            <div class="p-2 sm:w-1/2 w-full">
                <div class="bg-gray-800 rounded flex p-4 h-full items-center">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="text-indigo-500 w-6 h-6 flex-shrink-0 mr-4" viewBox="0 0 24 24">
                        <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                        <path d="M22 4L12 14.01l-3-3"></path>
                    </svg>
                    <span class="title-font font-medium text-white">Door to Door service</span>
                </div>
            </div>
            <div class="p-2 sm:w-1/2 w-full">
                <div class="bg-gray-800 rounded flex p-4 h-full items-center">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="text-indigo-500 w-6 h-6 flex-shrink-0 mr-4" viewBox="0 0 24 24">
                        <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                        <path d="M22 4L12 14.01l-3-3"></path>
                    </svg>
                    <span class="title-font font-medium text-white">Car always at your disposal</span>
                </div>
            </div>
            <div class="p-2 sm:w-1/2 w-full">
                <div class="bg-gray-800 rounded flex p-4 h-full items-center">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="text-indigo-500 w-6 h-6 flex-shrink-0 mr-4" viewBox="0 0 24 24">
                        <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                        <path d="M22 4L12 14.01l-3-3"></path>
                    </svg>
                    <span class="title-font font-medium text-white">Changable Time and Location</span>
                </div>
            </div>
            <div class="p-2 sm:w-1/2 w-full">
                <div class="bg-gray-800 rounded flex p-4 h-full items-center">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="text-indigo-500 w-6 h-6 flex-shrink-0 mr-4" viewBox="0 0 24 24">
                        <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                        <path d="M22 4L12 14.01l-3-3"></path>
                    </svg>
                    <span class="title-font font-medium text-white">24*7 customer support</span>
                </div>
            </div>
            <div class="p-2 sm:w-1/2 w-full">
                <div class="bg-gray-800 rounded flex p-4 h-full items-center">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="text-indigo-500 w-6 h-6 flex-shrink-0 mr-4" viewBox="0 0 24 24">
                        <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                        <path d="M22 4L12 14.01l-3-3"></path>
                    </svg>
                    <span class="title-font font-medium text-white">Cheaper Price</span>
                </div>
            </div>
        </div>
        <!-- <button class="flex mx-auto mt-16 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Button</button> -->
    </div>
</section>
<?php

footer11();
?>