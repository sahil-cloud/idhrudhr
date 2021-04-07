<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/talewind.min.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome\css\all.css">
    <link rel="stylesheet" href="../css/style1.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style23.css">
    <title>Profile</title>
</head>

<body>
    <?php
    include("../dbcon.php");
    session_start();
    include("base.php");
    header2();
    $email = $_SESSION['admin_email'];

    $sql = "SELECT * FROM admininfo where email = '$email'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    ?>

    <!-- profile -->

    <section class="text-gray-500 bg-gray-900 body-font">
        <div class="container px-5 py-24 mx-auto flex flex-wrap">
            <div class="flex flex-wrap -mx-4 mt-auto mb-auto lg:w-1/2 sm:w-2/3 content-start sm:pr-10">
                <div class="w-full sm:p-4 px-4 mb-6">
                    <h1 class="title-font font-medium text-xl mb-2 text-white"><?php echo $row['name']; ?></h1>
                    <div class="leading-relaxed"><?php echo $row['email']; ?></div>
                </div>
                <div class="p-4 sm:w-1/2 lg:w-1/4 w-1/2">
                    <h2 class="title-font font-medium text-2xl text-white"><?php echo $row['age']; ?></h2>
                    <p class="leading-relaxed">Age</p>
                </div>
                <div class="p-4 sm:w-1/2 lg:w-1/4 w-1/2">
                    <h2 class="title-font font-medium text-2xl text-white"><?php echo $row['city']; ?></h2>
                    <p class="leading-relaxed">City</p>
                </div>
                <div class="p-4 sm:w-1/2 lg:w-1/4 w-1/2">
                    <h2 class="title-font font-medium text-2xl text-white"><?php echo $row['phone']; ?></h2>
                    <p class="leading-relaxed">Phone</p>
                </div>
                <!-- <div class="p-4 sm:w-1/2 lg:w-1/4 w-1/2">
                    <h2 class="title-font font-medium text-3xl text-white">4</h2>
                    <p class="leading-relaxed">Products</p>
                </div> -->
            </div>
            <div class="lg:w-1/2 sm:w-1/3 w-full rounded-lg overflow-hidden mt-6 sm:mt-0">
                <img class="object-cover object-center w-full h-full" src="<?php echo $row['img']; ?>" alt="stats">
            </div>
        </div>
    </section>

    <!-- profile ends -->

    <?php
    foot();
    ?>

    <script src="../bootstrap/js/jquery-3.2.1.slim.min.js"></script>
    <script src="../bootstrap/js/jquery.vide.js"></script>
    <script src="../bootstrap/js/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>