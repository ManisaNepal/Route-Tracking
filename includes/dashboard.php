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
                                          <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                                      </li>
                                  </ul>
                              </li>
                          </ul>
              
         
                          <?php include('sidebar.php'); ?>


             <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">
            <label>Recent Bookings</label>
            <br>
            <br>
            <div class="container-fluid">

                <!-- Page Heading -->
                <table class="table table-dark">
                    <tr>
                        <th></th>
                        <th>Sender's  name</th>
                        <th>Sender Address</th>
                        <th>Weight</th>
                        <th>Receiver Name</th>
                        <th>Receiver Address</th>
                        <th>Delivery Date</th>
                        <th></th>
            </tr>
                 <?php 
    $query = "SELECT * from courier";
    // var_dump($query);
    $result = mysqli_query($conn, $query) or die(mysql_error());
    $rows = mysqli_num_rows($result);
    $i = 1;
    //if($rows>0){
        while($row = mysqli_fetch_array($result)){?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $row['sender_name']; ?></td>
            <td><?php echo $row['sender_address']; ?></td>
            <td><?php echo $row['weight']; ?></td>
            <td><?php echo $row['receiver_name']; ?></td>
            <td><?php echo $row['receiver_address']; ?></td>
            <td><?php echo $row['delivery_date']; ?></td>
            <td><a href="/cargo/pages/courier-detail.php?id=<?php echo $row['cr_id'];?>" class="btn btn-info">Details</a>
            <a href="/cargo/pages/d_short_path.php?start=<?php echo $row['sender_address'];?>&end=<?php echo $row['receiver_address'];?>" class="btn btn-info">shortest path</a>
            
        </td>


        </tr>
        <?php
               $i++;
            }
      //  }

        ?>
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
