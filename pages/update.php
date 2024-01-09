<!-- <?php
require('../config/databaseConnect.php');
session_start();

if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']==true){
}else{
   header('loginForm.php');
}

?> -->

<!DOCTYPE html>
<html lang="en">

<head>

   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="">
   <meta name="author" content="">

   <title>Dashboard</title>

   <!-- Bootstrap Core CSS -->

   <script src="/cargo/assets/dashboard/js/jquery.js"></script>

   <link href="/cargo/assets/dashboard/css/bootstrap.min.css" rel="stylesheet">


   <!-- Custom CSS -->
   <link href="/cargo/assets/dashboard/css/sb-admin.css" rel="stylesheet">

   <!-- Custom Fonts -->
   <link href="/cargo/assets/dashboard/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>
<?php if (isset($_POST['update_booking'])) {
    $cr_id = $_POST['cr_id'];
    $sender_name = $_POST['sender_name'];
    $sender_address = $_POST['sender_address'];
    $weight = $_POST['weight'];
    $sender_num = $_POST['sender_num'];
    $ship_date = $_POST['ship_date'];
    $receiver_name = $_POST['receiver_name'];
    $receiver_address = $_POST['receiver_address'];
    $receiver_num = $_POST['receiver_num'];
    $delivery_date = $_POST['delivery_date'];
    $collector_id = 1;
    //change this to update query
    $sql = "insert into courier(cr_id,sender_name,sender_address,weight,sender_num,ship_date,receiver_name,receiver_address,receiver_num,delivery_date,collector_id)
     values('$sender_name','$sender_address','$weight','$sender_num', '$ship_date','$receiver_name','$receiver_address','$receiver_num','$delivery_date','$collector_id')";
    mysqli_query($conn, $sql);
?>
<script>alert("Booked Successfully...");</script>
 <?php } ?>

   <div id="wrapper">

       <!-- Navigation -->
       <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
           <!-- Brand and toggle get grouped for better mobile display -->
           <div class="navbar-header">
             
                             <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                                 <span class="sr-only">Toggle navigation</span>
                                 <span class="icon-bar"></span>
                                 <span class="icon-bar"></span>
                                 <span class="icon-bar"></span>
                             </button>
                             <a class="navbar-brand" href="#">Cargo Dashboard</a>
             
                         </div>
                         <!-- Top Menu Items -->
                       <ul class="nav navbar-right top-nav">
             
                             <li class="dropdown">
             
                               <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                     <i class="fa fa-user"> Welcome</i><span class="caret"></span>
                               </a>
             
                                 <ul class="dropdown-menu">
             
                                     <li>
                                         <a href="/cargo/includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                                     </li>
                                 </ul>
                             </li>
                         </ul>

                         <?php include('../includes/sidebar.php'); ?>


            <!-- /.navbar-collapse -->
       </nav>
       <?php 
$cr_id = $_GET['cr_id'];
$query = "SELECT * from courier where cr_id='$cr_id'";
// var_dump($query);
$result = mysqli_query($conn, $query) or die(mysql_error());

    
    $rows = mysqli_num_rows($result);
    
    $row = mysqli_fetch_array($result);
    ?>

<div id="page-wrapper">

<div class="container-fluid">

   <!-- jQuery -->
        <form action="" method="POST">
            <label style="padding:5px">Please enter booking details</label>
            <input type="hidden" name="cr_id" value="<?php echo $row['cr_id']?>" />
           <p> <label style="width:150px;">Sender Name</label> <input  type="text"  name="sender_name" value="<?php echo $row['sender_name']; ?>" required/></p> 
           <p>  <label style="width:150px;">Sender Address</label><input  type="text"  name="sender_address" value="<?php echo $row['sender_address']; ?>" required/></p>
           <p>  <label style="width:150px;">Weight</label><input  type="text"  name="weight" value="<?php echo $row['weight']; ?>" required/></p>
           <p>  <label style="width:150px;">Sender Number</label><input  type="text"  name="sender_num"  value="<?php echo $row['sender_num']; ?>" required/></p>
           <p>  <label style="width:150px;">Ship Date</label><input  type="text"  name="ship_date" value="<?php echo $row['ship_date']; ?>" required/></p>
           <p> <label style="width:150px;">Receiver Name</label> <input  type="text"  name="receiver_name" value="<?php echo $row['receiver_name']; ?>" required/></p> 
           <p>  <label style="width:150px;">Receiver Address</label><input  type="text"  name="receiver_address" value="<?php echo $row['receiver_address']; ?>" required/></p>
           <p>  <label style="width:150px;">Receiver Number</label><input  type="text"  name="receiver_num" value="<?php echo $row['receiver_num']; ?>" required/></p>
           <p>  <label style="width:150px;">Delivery Date</label><input  type="text"  name="delivery_date" value="<?php echo $row['receiver_address']; ?>" required/></p>
           <p> <input type="submit" value="update Booking" name="update_booking"/></p>
       </form>
   </div>
   </div>
                
   <!-- /#wrapper -->
   <!-- Bootstrap Core JavaScript -->
   <script src="/cargo/assets/dashboard/js/bootstrap.min.js"></script>
</body>
</html>
