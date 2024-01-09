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


   <script src="/cargo/assets/dashboard/js/jquery.js"></script>

   <link href="/cargo/assets/dashboard/css/bootstrap.min.css" rel="stylesheet">


   <link href="/cargo/assets/dashboard/css/sb-admin.css" rel="stylesheet">

   <link href="/cargo/assets/dashboard/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>



   <div id="wrapper">

       <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
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
    if (isset($_GET['tracking_id'])) { 
       $tracking_id = $_GET['tracking_id'];
   $query = "SELECT * from tracking where tracking_id= '$tracking_id'";
   // var_dump($query);
   $result = mysqli_query($conn, $query) or die(mysql_error());

       $row = mysqli_fetch_array($result);
       $rows = mysqli_num_rows($result);
    
    if($rows>0){
      
       ?>

       <div id="page-wrapper">

           <div class="container-fluid">

               <!-- Page Heading -->
               <table class="table table-dark">
                   <tr>
                       <th>Tracking ID</th><td><?php echo $row['tracking_id']; ?></td>
                    </tr>
                    <tr>
                    <th>Route 1</th><td><?php echo $row['route1']; ?></td>
                    </tr>   
                    <tr><th>Route 2</th> <td><?php echo $row['route2']; ?></td></tr>
                      <tr><th>Route 3</th><td><?php echo $row['route3']; ?></td></tr>
                      <tr><th>Route 4</th><td><?php echo $row['route4']; ?></td></tr>
                      <tr><th>Route 5</th><td><?php echo $row['route5']; ?></td></tr>
                      <tr><th>Status</th><td><?php echo $row['progress']; ?></td></tr>
                </table>
               <!-- /.row -->
           </div>
           <!-- /.container-fluid -->
       </div>
       <!-- /#page-wrapper -->
   </div> 
   <?php } else {?>
        <h3 style="background:#eee">No Courier Found</h3>
    <?php } ?>
   <!-- /#wrapper -->
   <?php } else { ?>

    <div id="page-wrapper">

<div class="container-fluid">

   <!-- jQuery -->
        <form action="" method="GET">
            <label style="background:#ddd;">Enter your tracking ID : </label>
            <input  type="text"  name="tracking_id" required/>
            <input type="submit" value="Track"/>
       </form>

   <?php } ?>
   </div>
   </div>
   <!-- Bootstrap Core JavaScript -->
   <script src="/cargo/assets/dashboard/js/bootstrap.min.js"></script>
   

</body>

</html>
