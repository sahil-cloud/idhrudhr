<?php
function header2()
{
?>

    <!-- navbar -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand text-white" href="../index.php"><i class="fa fa-car mr-2 text-white" aria-hidden="true"></i>IdhrUdhr</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link " style="font-weight: bold;" href="#">Admin Pannel <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link " style="font-weight: bold;" href="admin_index.php">DashBoard<span class="sr-only">(current)</span></a>
                </li>

            </ul>
            <form class="form-inline my-2 my-lg-0">
                <?php
                if (isset($_SESSION['admin_name'])) {
                ?>
                    <a href="admin_profile.php" style="font-weight:bold; color:green" class="mx-2 text-green-800">
                        <!-- <button class="btn btn-outline-success my-2 my-sm-0 mx-2" type="submit"></button> -->
                        <?php echo $_SESSION['admin_name']; ?>
                    </a>
                    <a href="admin_logout.php" style="font-weight:bold; color:green" class="mx-2 text-green-800">
                        <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
                     -->
                        Logout
                    </a>

                <?php
                }
                ?>
            </form>
        </div>
    </nav>
<?php
}
?>
<!-- navbar ends -->

<!-- functiong calling -->
<?php
// header2();
function login()
{
?>

    <!-- login -->

    <section class="text-gray-500 bg-gray-900 body-font relative">
        <div class="absolute inset-0 bg-gray-900">
            <iframe title="map" width="200%" height="200%" frameborder="0" marginheight="0" marginwidth="0" scrolling="no" src="../img/try5.jpg" style="filter: grayscale(1) contrast(1.2) opacity(0.3);"></iframe>
        </div>
        <div class="container px-5 py-25  mt-32 mx-auto flex">
            <form class="lg:w-1/3 md:w-1/2 bg-gray-900 rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0 relative z-10" method="POST">
                <h2 class="text-white text-lg mb-3 font-medium title-font">Login Now</h2>
                <!-- <p class="leading-relaxed mb-5 text-gray-500">Post-ironic portland shabby chic echo park, banjo fashion axe</p> -->
                <input class="bg-gray-800 text-white rounded border border-gray-700 focus:outline-none focus:border-teal-500 text-base px-4 py-2 mb-4" placeholder="Email" type="email" name="email">
                <input class="bg-gray-800 text-white rounded border border-gray-700 focus:outline-none  text-base px-4 py-2 mb-4 resize-none" placeholder="Password" name="password" type="password">

                <button name="login" type="submit" class="text-white bg-teal-500 border-0 py-2 px-6 focus:outline-none hover:bg-teal-600 rounded text-lg">Login</button>

            </form>
        </div>
    </section>

    <!-- login ends -->

<?php
}
function foot()
{
?>
    <!-- footer -->

    <footer class="text-gray-500 bg-gray-900 body-font">
        <div class="container px-5 py-2 mx-auto flex items-center sm:flex-row flex-col">
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
// foot();
?>