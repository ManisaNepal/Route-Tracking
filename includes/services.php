<?php
$root= $_SERVER['DOCUMENT_ROOT'].'/cargo';
?>
<?php include('../includes/header.php'); ?>
<?php include('../includes/navbar.php'); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Services</title>
<link rel="stylesheet" href="/cargo/assets/css/bootstrap.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <nav class="mynavbar">
   

    

</nav>
</head>
<body>
    
    <div class="about-container"><br><br>
            <h2 style="text-align: center"> Our Services</h2>
            <div id = "whoarewe">
                <center>
                
                <p class="card-text">The Cargo Nepal is a pioneer and leader in the Express Distribution and Supply Chain Solutions in Nepal.<br>
              The Cargo Nepal has consistently explored various ways to bring premium value to the customer,<br>
              always setting benchmarks in quality of service and customer satisfaction.</p>
              
            </center>
            </div><br><br>
    <div class="row">

    <!-- <div class="card" style="width: 18rem;"> -->
    <div class="col-md-4">
  <!-- <img src="..." class="card-img-top" alt="..."> -->
  <span class="fa-stack fa-4x">
              <i class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa fa-truck fa-stack-1x fa-inverse"></i>
            </span>
  <div class="card-body">
    <h2 class="card-title">Roadway freight</h2>
    <p class="card-text">Our surface operations, through dedicated and containerized vehicles cover most parts of Nepal.</p>
    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
  </div>
</div>
    <!-- <div class="card" style="width: 18rem;"> -->
<div class="col-md-4">
  <!-- <img src="..." class="card-img-top" alt="..."> -->
  <span class="fa-stack fa-4x">
          <i class="fa fa-circle fa-stack-2x text-primary"></i>
          <i class="fa fa-exchange fa-stack-1x fa-inverse" ></i>

              <!-- <i class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa fa-truck fa-stack-1x fa-inverse"></i> -->
            </span>
  <div class="card-body text-center d-flex flex-column align-items-center">
    <h2 class="card-title">Transportation</h2>
    <p class="card-text">Our transportation services are efficient and affordable. We can also help goods in loading and unloading.</p>
    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
  </div>
</div>
<div class="col-4 d-flex flex-column align-items-center">
  <!-- <img src="..." class="card-img-top" alt="..."> -->
  <span class="fa-stack fa-4x text-center">
          <i class="fa fa-circle fa-stack-2x text-primary"></i>
          <i class="fa fa-gift fa-stack-1x fa-inverse" ></i>

              <!-- <i class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa fa-truck fa-stack-1x fa-inverse"></i> -->
            </span>
  <div class="card-body">
    <h2 class="card-title">Packing</h2>
    <p class="card-text">We can help with packing services for shipments and we can also provide packing material.</p>
    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
  </div>
</div>
</div>
</body>
<article>
        

<?php include($root.'/includes/footer.php'); ?>