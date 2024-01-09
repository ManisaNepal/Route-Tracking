<?php
// include ('../config/connect.php');
include ($_SERVER['DOCUMENT_ROOT'].'/cargo/config/connection.php');
// data sanitizing
function input_data($input_data) {
    $input_data = trim($input_data);
    $input_data = stripslashes($input_data);
    $input_data = htmlspecialchars($input_data);
    return $input_data;
  }

  
// empty check
  function emptyempty($input_data){ 
    if($input_data==""){ 
        return true;
   }else{ 
       return false;
   }
}


// mysqli escape string user function
// mysqli_real_escape_string
class RealEscaperString{
  public function cleanSql($data){
    $db=new DatabaseConnection();
    return $db->conn->real_escape_string($data);
  }
  // function get_data(){
  //   return $this->vars;
  // }

}

// for automatic cust_id
function autoincStaff($db){
  global $value2;
  // $conn = new mysqli("localhost", "root", "", "home_service_project");
  $conn = $db->conn;
  $query = "SELECT staff_id from staff order by staff_id desc LIMIT 1";
  $result = $conn->query($query);
 

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        //  $result=$row;
        $value2 = $row['staff_id'];
        $value2 = substr($value2, 3, 6);
        $value2 = (int) $value2 + 1;
        $value2 = "STF" . sprintf('%03s', $value2);
        $value = $value2;
        return $value;
        // get last inserted id function
        
    }
      
  } else {
      $value2 = "STF001";
      $value = $value2;
      return $value;
  }
}

// echo autoincSVP($db)." SVP";
function checkEmailDuplicate($db,$table,$col,$check){
  // global $value2;
  // $conn = new mysqli("localhost", "root", "", "home_service_project");
  $conn = $db->conn;
  $sql= "SELECT $col from $table WHERE $col='$check'";
  $result = $conn->query($sql);
 $vars="";

  if ($result->num_rows > 0) {
    $vars = "Given $col already exists";      
  } else {
    $vars = "";
  }
  return $vars;
}

// echo autoincemp();
echo "<br>";
echo date("YmdHis");
echo "<br>";
// $dob=date("2008-01-21");
// echo input_data($dob);

// echo checkEmailDuplicate($db,'admin','username','zeroth');


?>