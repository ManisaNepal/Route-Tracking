<?php      
    // $host = "localhost";  
    // $user = "root";  
    // $password = '';  
    // $db_name = "cargo";  
    // $conn =new mysqli($host, $user, $password, $db_name);  
    // if(!$con) {  
    //     die("Sorry Failed to connect to database ". mysqli_connect_error());  
    // }  



    define('DB_HOST','localhost');
    define('DB_USER','root');
    define('DB_PASSWORD','');
    define('DB_DATABASE','cargo_tracker');
    
    class DatabaseConnection
    {
        public function __construct()
        {
            $conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
    
            if($conn->connect_error)
            {
                die ("<h1>Database Connection Failed</h1>");
            }
            //echo "Database Connected Successfully";
            return $this->conn = $conn;
        }
    }
    $db = new DatabaseConnection();
    

?>