<?php

require('../config/databaseConnect.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $email = $_POST['email'];
    $password = $_POST['password'];
    // echo password_hash($password, 1);die;
    $query = "SELECT * from staff where email = '$email'";
    // var_dump($query);
    $result = mysqli_query($conn, $query) or die(mysql_error());
    $rows = mysqli_num_rows($result);
    
    if($rows>0){
        while($row = mysqli_fetch_array($result)){
            
                 if (password_verify($password, $row['password'])) {

                $_SESSION['loggedIn'] = true;
                header("location: ../includes/dashboard.php");
                 } 
                 else {
                    var_dump("Login Failed");
                 }
            }
        } else {
            echo "<script>

            window.location.href='/cargo/user/login.php';
   
             </script>";
        }
    
    
}
?>
