<?php

define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASSWORD','');
define('DB_DATABASE','cargo_tracker');


$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);

if(mysqli_connect_error()){
    echo "Connection Error:" .mysqli_connect_error();
}


?>