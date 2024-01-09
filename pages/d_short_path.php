<!-- <?php
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

    <div id="page-wrapper">

<div class="container-fluid">
<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'cargo_tracker';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$graph = array();

$nodesQuery = "SELECT * FROM nodes";
$nodesResult = $conn->query($nodesQuery);

if (!$nodesResult) {
    die("Node query failed: " . $conn->error);
}

while ($row = $nodesResult->fetch_assoc()) {
    $node_id = $row['id'];
    $node_name = $row['name'];
    $graph[$node_name] = array();
}

$edgesQuery = "SELECT * FROM edges";
$edgesResult = $conn->query($edgesQuery);

if (!$edgesResult) {
    die("Edge query failed: " . $conn->error);
}

while ($row1 = $edgesResult->fetch_assoc()) {
    $from_node = $row1['source_node_id'];
    $to_node = $row1['target_node_id'];
    $distance = $row1['weight'];
    $graph[$from_node][$to_node] = $distance;
}

// Close the database connection
//$conn->close();

function dijkstra($graph, $startNode, $endNode) {
    $infinity = PHP_INT_MAX;
    $distances = array();
    $unvisitedNodes = $graph;
    $path = array();

    foreach ($unvisitedNodes as $node => $value) {
        $distances[$node] = $infinity;
    }

    $distances[$startNode] = 0;

    while (count($unvisitedNodes) > 0) {
        $minNode = null;

        foreach ($unvisitedNodes as $node => $value) {
            if ($minNode === null || $distances[$node] < $distances[$minNode]) {
                $minNode = $node;
            }
        }

        foreach ($graph[$minNode] as $neighbor => $value) {
            $alt = $distances[$minNode] + $graph[$minNode][$neighbor];
            if ($alt < $distances[$neighbor]) {
                $distances[$neighbor] = $alt;
                $path[$neighbor] = $minNode;
            }
        }

        unset($unvisitedNodes[$minNode]);
    }

    // Trace the path from startNode to endNode
    $shortestPath = array();
    $currentNode = $endNode;

    while (isset($path[$currentNode])) {
        array_unshift($shortestPath, $currentNode);
        $currentNode = $path[$currentNode];
    }

    array_unshift($shortestPath, $startNode);

    return array(
        'distances' => $distances,
        'path' => $path,
        'shortest_path' => $shortestPath,
    );
}

// Define the start and end nodes
$sql = "SELECT id FROM nodes WHERE name ='". $_GET['start'] . "'";
$start_result = $conn->query($sql);
$srow = $start_result->fetch_row();

$sql = "SELECT id FROM nodes WHERE name = '". $_GET['end'] . "'";
$end_result = $conn->query($sql);
$erow = $end_result->fetch_row();

 
if (empty($srow) || empty($erow)) {

    ?>

<div id="distance_div">
    <div><h1 style="color:#592020">Shortest path using Dijkstra algorithm</h1></div>
    <div style="background:#222222;color:white;padding:25px;">
      <h3>No Node and Edges found in the database </h3>
    </div>
</div>

   
<?php } else {
    
$startNode = $srow[0]; 
$endNode = $erow[0];   
// Calculate the shortest path
$result = dijkstra($graph, $startNode, $endNode);
$c_arr = $result['shortest_path'];

$idString = implode(',', $c_arr);

// SQL query to select data from the database for the IDs in the array
$sql = "SELECT * FROM nodes WHERE id IN ($idString)";

// Execute the query
$result2 = $conn->query($sql);

$final = [];
// Check if the query was successful
if ($result2) {
    // Fetch and process the results
    while ($row = $result2->fetch_assoc()) {
        $final[] = $row['name'];
    }
} else {
    echo "Error executing query: " . $conn->error;
}

$conn->close();
?>


<style>

    #distance_div{
        height: 40px;
        color:#592020;
    }
</style>


<div id="distance_div">
    <div><h1>Shortest path using Dijkstra's algorithm</h1></div>
    <div style="background:#222222;color:white;padding:25px;">
<h3>
<?php
echo "Route : " . implode(" -> ", $final);

?> </h3></div>
    <div style="color:black; background:#B8D5BF;">
        <h3>
<?php

echo "Shortest distance from ". $_GET['start'] . " to " . $_GET['end'] . " : " . $result['distances'][$endNode] . "<br>";
?></h3>
    </div>
</div>
<?php } ?>