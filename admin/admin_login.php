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
    <title>Login</title>
</head>

<body>
    <?php
    include("../dbcon.php");
    session_start();
    include("base.php");
    header2();
    login();
    foot();

    // logic for login
    if(isset($_SESSION['admin_email'])){
        echo "<script> alert('Already logged In'); </script>";
        echo "<script> location.href = 'admin_index.php' ; </script>";
    }
    else{
        if(isset($_REQUEST['login'])){
            if(($_REQUEST['email'] == "") || ($_REQUEST['password'] == "")){
                echo "<script> alert('All Field Are Compulsory'); </script>";

            }else{
                $email = $_REQUEST['email'];
                $password = $_REQUEST['password'];
                $sql = "SELECT * from admininfo where email = '$email' and password = '$password' ";
                $result = $conn->query($sql);

                if ($result->num_rows > 0){
                    $row = $result->fetch_assoc();
                    $_SESSION['admin_name'] = $row['name'];
                    $_SESSION['admin_email'] = $row['email'];
                    $_SESSION['admin_img'] = $row['img'];
                    $_SESSION['admin_phone'] = $row['phone'];
                    $_SESSION['admin_city'] = $row['city'];

                    echo "<script> location.href = 'admin_index.php' ; </script>";

                }
                else{
                    echo "<script> alert('Not an Admin'); </script>";
                    echo "<script> location.href = 'admin_login.php' ; </script>";


                }
            }
        }
    }

    
    ?>





    <script src="../bootstrap/js/jquery-3.2.1.slim.min.js"></script>
    <script src="../bootstrap/js/jquery.vide.js"></script>
    <script src="../bootstrap/js/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>