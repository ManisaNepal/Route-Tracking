<?PHP
require('../config/databaseConnect.php');
session_start();
?>

<?php
$root= $_SERVER['DOCUMENT_ROOT'].'/cargo';
?>
<?php include('../includes/header.php'); ?>
<?php include('../includes/navbar.php'); ?>


    <?PHP
       // include("src/style.php");
    ?>

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
               <table class="table table-light">
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
        <h3 style="background:#eee">No Record Found</h3>
    <?php } ?>
   <!-- /#wrapper -->
   <?php } else { ?>

    <section class="my-3">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 offset-lg-1">
          <div class="alert alert-primary text-center ">
          <form action="" method="GET">
            <label style="background:#ddd;">Enter your tracking ID : </label>
            <input  type="text"  name="tracking_id" style="background:#fff;padding:5px" required/>
            <input type="submit" value="Track" style="background:#fff;padding:5px"/>
       </form>

          </div>
        </div>
      </div>
    </div>
  </section>

   <!-- jQuery -->
        
   <?php } ?>
   