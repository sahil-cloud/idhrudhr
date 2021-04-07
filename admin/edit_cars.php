<?php
$insert = false;
$update = false;
$delete = false;

include("../dbcon.php");
session_start();
include("base.php");

// Die if connection was not successful
if (!$conn) {
    die("Sorry we failed to connect: " . mysqli_connect_error());
}

if (isset($_GET['delete'])) {
    $sno = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM carinfo_tb WHERE car_model = '$sno'";
    $result = mysqli_query($conn, $sql);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['snoEdit'])) {
        // Update the record
        $sno = $_POST["snoEdit"];
        $name = $_POST["titleEdit"];
        $model = $_POST["descriptionEdit"];
        $price = $_POST["description1Edit"];

        // Sql query to be executed
        $sql = "UPDATE carinfo_tb SET car_name = '$name' , car_model = '$model' , car_price = '$price' WHERE car_model = '$sno'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $update = true;
        } else {
            echo "We could not update the record successfully";
        }
    } else {
        $carname = $_POST["carname"];
        $carmodel = $_POST["carmodel"];
        $carprice = $_POST["carprice"];
        $carseat = $_POST["carseat"];
        $carmileage = $_POST["carmileage"];
        $carimage = $_FILES["carimage"];

        $imgname = $carimage['name'];
        $imgerror = $carimage['error'];
        $imgtmp = $carimage['tmp_name'];

        // exploding extension
        $imgtxt = explode('.', $imgname);
        $imgcheck = strtolower(end($imgtxt));

        //checking array
        $imgextentions = array('png', 'jpg', 'jpeg');

        if (in_array($imgcheck, $imgextentions)) {

            $imgdest = '../img/' . $imgname;
            $imgdest1 = 'img/' . $imgname;
            move_uploaded_file($imgtmp, $imgdest);
            // Sql query to be executed
            $sql = "INSERT INTO `carinfo_tb` VALUES ('$carname', '$carmodel','$carmileage','$carseat','$carprice','$imgdest1')";
            $result = mysqli_query($conn, $sql);


            if ($result) {
                $insert = true;
            } else {
                echo "The record was not inserted successfully because of this error ---> " . mysqli_error($conn);
            }
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../bootstrap/css/talewind.min.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome\css\all.css">
    <link rel="stylesheet" href="../css/style1.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/jquery.dataTables.min.css">


    <title>Add cars-ADMIN</title>

</head>

<body>


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
                <form action="edit_cars.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="snoEdit" id="snoEdit">
                        <div class="form-group">
                            <label for="title">Car Name</label>
                            <input type="text" class="form-control" id="titleEdit" name="titleEdit" aria-describedby="emailHelp">
                        </div>

                        <div class="form-group">
                            <label for="desc">Car Model</label>
                            <input class="form-control" id="descriptionEdit" name="descriptionEdit">
                        </div>
                        <div class="form-group">
                            <label for="desc">Car Price</label>
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

    <!-- navbar -->
    <?php
    header2();
    ?>
    <!-- navbar ends -->

    <?php
    if ($insert) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your car has been inserted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
    }
    ?>
    <?php
    if ($delete) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your car has been deleted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
    }
    ?>
    <?php
    if ($update) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your car has been updated successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
    }
    ?>
    <!-- <section class="text-gray-500 bg-gray-900 body-font">
        <div class="container px-5 py-15 mx-auto"> -->
            <div class="container my-4">
                <h2 class="text-center">Add a Car</h2>
                <div class="col-md-6 mx-auto">
                    <form action="edit_cars.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Car name</label>
                            <input type="text" class="form-control" id="car_name" name="carname" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="title">Car Model</label>
                            <input type="text" class="form-control" id="car_model" name="carmodel" aria-describedby="emailHelp">
                        </div>

                        <div class="form-group">
                            <label for="desc">Car Price</label>
                            <input class="form-control" id="car_price" name="carprice">
                        </div>
                        <div class="form-group">
                            <label for="desc">Car seat</label>
                            <input class="form-control" id="car_seat" name="carseat">
                        </div>
                        <div class="form-group">
                            <label for="desc">Car Mileage</label>
                            <input class="form-control" id="car_mileage" name="carmileage">
                        </div>
                        <div class="form-group">
                            <label for="desc">Car Image</label>
                            <input class="form-control" id="car_image" name="carimage" type="file">
                        </div>
                        <button type="submit" class="btn btn-primary">Add Car</button>
                    </form>
                </div>
            </div>

            <div class="container my-4">


                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">Car Name</th>
                            <th scope="col">Car Model</th>
                            <th scope="col">Car Price</th>
                            <th scope="col">Car Seat</th>
                            <th scope="col">Car Mileage</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM `carinfo_tb`";
                        $result = mysqli_query($conn, $sql);
                        $sno = 0;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $sno = $sno + 1;
                            echo "<tr>
            <th scope='row'>" . $sno . "</th>
            <td>" . $row['car_name'] . "</td>
            <td>" . $row['car_model'] . "</td>
            <td>" . $row['car_price'] . "</td>
            <td>" . $row['car_seat'] . "</td>
            <td>" . $row['car_mileage'] . "</td>
            <td> <button class='edit btn btn-sm btn-primary' id=" . $row['car_model'] . ">Edit</button> <button class='delete btn btn-sm btn-primary' id=d" . $row['car_model'] . ">Delete</button>  </td>
          </tr>";
                        }
                        ?>


                    </tbody>
                </table>
            </div>
            <hr>
        <!-- </div>
    </section> -->
            <!-- footer -->

            <?php
            foot();
            ?>

            <script src="../bootstrap/js/jquery-3.2.1.slim.min.js"></script>
            <script src="../bootstrap/js/jquery.vide.js"></script>
            <script src="../bootstrap/js/popper.min.js"></script>
            <script src="../bootstrap/js/bootstrap.min.js"></script>
            <script src="../bootstrap/js/jquery.dataTables.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#myTable').DataTable();

                });
            </script>
            <script>
                edits = document.getElementsByClassName('edit');
                Array.from(edits).forEach((element) => {
                    element.addEventListener("click", (e) => {
                        // console.log("edit ");
                        tr = e.target.parentNode.parentNode;
                        title = tr.getElementsByTagName("td")[0].innerText;
                        description = tr.getElementsByTagName("td")[1].innerText;
                        description1 = tr.getElementsByTagName("td")[2].innerText;
                        // console.log(title, description);
                        titleEdit.value = title;
                        descriptionEdit.value = description;
                        description1Edit.value = description1;
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

                        if (confirm("Are you sure you want to delete this note!")) {
                            // console.log("yes");
                            window.location = `edit_cars.php?delete=${sno}`;
                            // TODO: Create a form and use post request to submit a form
                        } else {
                            // console.log("no");
                        }
                    })
                })
            </script>
</body>

</html>