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
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">

    <title>Contact</title>
</head>

<body>
    <?php
    $delete = false;
    $update = false;
    include("dbcon.php");
    session_start();
    include("run.php");

    header1();

    if (isset($_GET['delete'])) {
        $sno = $_GET['delete'];
        $delete = true;
        $sql = "DELETE FROM booklist_tb WHERE sno = '$sno'";
        $result = mysqli_query($conn, $sql);
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['snoEdit'])) {
            // Update the record
            $sno = $_POST["snoEdit"];
            $name = $_POST["titleEdit"];
            $phone = $_POST["descriptionEdit"];
            $time = $_POST["description1Edit"];

            // Sql query to be executed
            $sql = "UPDATE booklist_tb SET email = '$name' , phone = '$phone' , pick_t = '$time' WHERE sno = '$sno'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $update = true;
            } else {
                echo "We could not update the record successfully";
            }
        }
    }

    ?>

    <?php
    if ($delete) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your booking has been deleted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
    }
    ?>
    <?php
    if ($update) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your booking has been updated successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
    }
    ?>
    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit car</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="book_status.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="snoEdit" id="snoEdit">
                        <div class="form-group">
                            <label for="title">Email</label>
                            <input type="text" class="form-control" id="titleEdit" name="titleEdit" aria-describedby="emailHelp">
                        </div>

                        <div class="form-group">
                            <label for="desc">Phone</label>
                            <input class="form-control" id="descriptionEdit" name="descriptionEdit">
                        </div>
                        <div class="form-group">
                            <label for="desc">Time</label>
                            <input class="form-control" id="description1Edit" name="description1Edit">
                        </div>
                    </div>
                    <div class="modal-footer d-block mr-auto">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- booking table -->

    <div class="flex flex-col text-center w-full mb-20 m-4 p-2">
        <h1 class="text-2xl font-medium title-font mb-4 text-black tracking-widest" style="font-weight: bold;">Active Bookings</h1>
        <hr class="bg-blue-800">
        <!-- <p class="lg:w-2/3 mx-auto leading-relaxed text-base"></p> -->
    </div>

    <div class="container my-4 " style="overflow-x:auto;">


        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Pickup date</th>
                    <th scope="col">End date</th>
                    <th scope="col">city</th>
                    <th scope="col">Time</th>
                    <th scope="col">Model</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $now = date("Y-m-d");
                $email = $_SESSION['email'];

                $sql = "SELECT * FROM booklist_tb where pick_d >= '$now' and email = '$email' ";
                $result = $conn->query($sql);
                $sno = 0;

                while ($row = mysqli_fetch_assoc($result)) {
                    $sno = $sno + 1;
                    echo "<tr>
            <th scope='row'>" . $sno . "</th>
            <td>" . $row['email'] . "</td>
            <td>" . $row['phone'] . "</td>
            <td>" . $row['pick_d'] . "</td>
            <td>" . $row['end_d'] . "</td>
            <td>" . $row['city'] . "</td>
            <td>" . $row['pick_t'] . "</td>
            <td>" . $row['car_model'] . "</td>
            <td> <button class='edit btn btn-sm btn-primary' id=" . $row['sno'] . ">Edit</button> <button class='delete btn btn-sm btn-primary' id=d" . $row['sno'] . ">Cancel</button>  </td>
          </tr>";
                }
                ?>


            </tbody>
        </table>
    </div>
    <hr>


    <!-- booking table ends -->

    <!-- booking table -->

    <div class="flex flex-col text-center w-full mb-20 m-4 p-2">
        <h1 class="text-2xl font-medium title-font mb-4 text-black tracking-widest" style="font-weight: bold;">All Bookings</h1>
        <hr class="bg-blue-800">
        <!-- <p class="lg:w-2/3 mx-auto leading-relaxed text-base"></p> -->
    </div>

    <div class="container my-4 " style="overflow-x:auto;">


        <table class="table" id="myTable1">
            <thead>
                <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Pickup date</th>
                    <th scope="col">End date</th>
                    <th scope="col">city</th>
                    <th scope="col">Time</th>
                    <th scope="col">Model</th>
                    <!-- <th scope="col">Action</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                $now = date("Y-m-d");
                $email = $_SESSION['email'];

                $sql = "SELECT * FROM booklist_tb where email = '$email' ";
                $result = $conn->query($sql);
                $sno = 0;

                while ($row = mysqli_fetch_assoc($result)) {
                    $sno = $sno + 1;
                    echo "<tr>
            <th scope='row'>" . $sno . "</th>
            <td>" . $row['email'] . "</td>
            <td>" . $row['phone'] . "</td>
            <td>" . $row['pick_d'] . "</td>
            <td>" . $row['end_d'] . "</td>
            <td>" . $row['city'] . "</td>
            <td>" . $row['pick_t'] . "</td>
            <td>" . $row['car_model'] . "</td>
          </tr>";
                }
                ?>


            </tbody>
        </table>
    </div>
    <hr>


    <!-- booking table ends -->

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



    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();

        });
    </script>
    <script>
        $(document).ready(function() {
            $('#myTable1').DataTable();

        });
    </script>
    <script>
        edits = document.getElementsByClassName('edit');
        Array.from(edits).forEach((element) => {
            element.addEventListener("click", (e) => {
                // console.log("edit ");
                tr = e.target.parentNode.parentNode;
                title = tr.getElementsByTagName("td")[0].innerText; //email
                phone = tr.getElementsByTagName("td")[1].innerText; //
                time = tr.getElementsByTagName("td")[5].innerText;
                // console.log(title, description);
                titleEdit.value = title;
                descriptionEdit.value = phone;
                description1Edit.value = time;
                snoEdit.value = e.target.id;
                // console.log(e.target.id)
                $('#editModal').modal('toggle');
            })
        })

        deletes = document.getElementsByClassName('delete');
        Array.from(deletes).forEach((element) => {
            element.addEventListener("click", (e) => {
                // console.log("edit ");
                sno = e.target.id.substr(1);

                if (confirm("Are you sure you want to cancel this booking!")) {
                    // console.log("yes");
                    window.location = `book_status.php?delete=${sno}`;
                    // TODO: Create a form and use post request to submit a form
                } else {
                    // console.log("no");
                }
            })
        })
    </script>
    <script src="bootstrap/js/jquery-3.2.1.slim.min.js"></script>
    <script src="bootstrap/js/jquery.vide.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/jquery.dataTables.min.js"></script>

</body>

</html>