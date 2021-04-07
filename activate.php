<?php
// http://localhost/renew/activate.php
session_start();
include('dbcon.php');

if(isset($_GET['token'])){
    $token = $_GET['token'];
    $uq = "UPDATE requesterlogin_tb set status = 'active' where token = '$token' ";
    $result = $conn->query($uq);

    if($result){
        echo "<script>
                alert('accnt confirmed');
             </script>";
        echo "<script> 
                     location.href='login.php';
                    </script>";
    }   else{
        echo "<script>
                alert('not confirmed');
             </script>";
    }
}

?>