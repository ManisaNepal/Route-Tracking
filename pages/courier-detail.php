<!-- <?php
require('../config/databaseConnect.php');
session_start();

if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']==true){
   echo 'This is dashboard';
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
       $crid = $_GET['id'];
   $query = "SELECT * from courier where cr_id= '$crid'";
   // var_dump($query);
   $result = mysqli_query($conn, $query) or die(mysql_error());

       $row = mysqli_fetch_array($result);
       

       ?>

       <div id="page-wrapper">

           <div class="container-fluid">

               <!-- Page Heading -->
               <table class="table table-dark">
                   <tr>
                       <th>Sender's  name</th><td><?php echo $row['sender_name']; ?></td>
                    </tr>
                    <tr>
                    <th>Sender Address</th><td><?php echo $row['sender_address']; ?></td>
                    </tr>   
                    <tr><th>Weight</th> <td><?php echo $row['weight']; ?></td></tr>
                      <tr><th>Receiver Name</th><td><?php echo $row['receiver_name']; ?></td></tr>
                      <tr><th>Receiver Address</th><td><?php echo $row['receiver_address']; ?></td></tr>
                      <tr><th>Delivery Date</th><td><?php echo $row['delivery_date']; ?></td></tr>
                      <tr><th></th><td></td></tr>
</table>
               <!-- /.row -->


           </div>
           <!-- /.container-fluid -->

       </div>
       <!-- /#page-wrapper -->

   </div>
   <!-- /#wrapper -->

   <!-- jQuery -->

   <!-- Bootstrap Core JavaScript -->
   <script src="/cargo/assets/dashboard/js/bootstrap.min.js"></script>
   

</body>

</html>
