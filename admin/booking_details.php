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
    <link rel="stylesheet" href="../css/jquery.dataTables.min.css">

    <title>Login</title>
</head>

<body>
    <?php
    $send = false;
    $unsend = false;
    $delete = false;
    include("../dbcon.php");
    session_start();

    use PHPMailer\PHPMailer\PHPMailer;

    include("base.php");
    header2();

    if (!$conn) {
        die("Sorry we failed to connect: " . mysqli_connect_error());
    }

    if (isset($_GET['delete'])) {
        $sno = $_GET['delete'];
        // echo $sno;
        $delete = true;
        $sql2 = "DELETE FROM booklist_tb WHERE sno = '$sno'";
        $result2 = mysqli_query($conn, $sql2);
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['snoEdit'])) {
            // Update the record
            $sno = $_POST["snoEdit"];
            $email = $_POST["titleEdit"];
            $subject = $_POST["subject"];
            $message = $_POST["message"];

            $mailto = $email;
            $mailsub = $subject;
            $mailmsg = $message;
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
            $mail->Username = "idhrudhr.carrental@gmail.com";
            $mail->Password = "IdhrUdhr@hack_1";
            $mail->setFrom("idhrudhr.carrental@gmail.com");
            $mail->Subject = $mailsub;
            $mail->Body = $mailmsg;
            $mail->addAddress($mailto);

            if ($mail->send()) {
                echo "<script>alert('Mail has been sent');</script>";
                // $send = true;
                echo "<script> location.href='booking_details.php'; </script>";
            } else {
                // $unsend = true;
                echo "<script>alert('Mail has not been sent');</script>";
                // $send = true;
                echo "<script> location.href='booking_details.php'; </script>";
            }
        }
    }
    ?>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Send Mail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="booking_details.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="snoEdit" id="snoEdit">
                        <div class="form-group">
                            <label for="title">Email</label>
                            <input type="text" class="form-control" id="titleEdit" name="titleEdit" aria-describedby="emailHelp">
                        </div>

                        <div class="form-group">
                            <label for="desc">Subject</label>
                            <input class="form-control" name="subject">
                        </div>
                        <div class="form-group">
                            <label for="desc">Message</label>
                            <input class="form-control" id="description1Edit" name="message">
                        </div>
                    </div>
                    <div class="modal-footer d-block mr-auto">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    if ($send) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Success!</strong> Mail has been sent successfully
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>×</span>
        </button>
    </div>";
    }
    ?>
    <?php
    if ($unsend) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Success!</strong> Mail has not been sent
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>×</span>
        </button>
    </div>";
    }
    ?>
    <?php
    if ($delete) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Booking has been deleted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
    }
    ?>

    <!-- booking table -->

    <div class="flex flex-col text-center w-full mb-20 m-4 p-4">
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

                $sql = "SELECT * FROM booklist_tb where pick_d >= '$now'";
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
            <td> <button class='edit btn btn-sm btn-primary' id=" . $row['sno'] . ">Mail</button> <button class='delete btn btn-sm btn-primary' id=d" . $row['sno'] . ">Cancel</button>  </td>
          </tr>";
                }
                ?>


            </tbody>
        </table>
    </div>
    <hr>


    <!-- booking table ends -->

    <?php
    foot();
    ?>

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
                title = tr.getElementsByTagName("td")[0].innerText; //email
                // description = tr.getElementsByTagName("td")[1].innerText; //
                // description1 = tr.getElementsByTagName("td")[2].innerText;
                // console.log(title, description);
                titleEdit.value = title;
                // descriptionEdit.value = description;
                // description1Edit.value = description1;
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
                    window.location = `booking_details.php?delete=${sno}`;
                    // TODO: Create a form and use post request to submit a form
                } else {
                    // console.log("no");
                }
            })
        })
    </script>
    <script src="../bootstrap/js/jquery-3.2.1.slim.min.js"></script>
    <script src="../bootstrap/js/jquery.vide.js"></script>
    <script src="../bootstrap/js/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../bootstrap/js/jquery.dataTables.min.js"></script>

</body>

</html>