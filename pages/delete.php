<?php
require('../config/databaseConnect.php');


$id = $_GET['id'];
$query = "delete from staff where staff_id='$id'";
// var_dump($query);
$result = mysqli_query($conn, $query) or die(mysql_error());
echo "<script>

window.location.href='/cargo/pages/staff.php';

 </script>";






