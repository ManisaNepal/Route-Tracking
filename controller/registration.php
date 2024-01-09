<?php
// include "../config/connect.php";
include ($_SERVER['DOCUMENT_ROOT'].'/cargo/helper/data_helper.php'); // for sanitizing data

//for sanitizing: function test_input($data,$conn)
// for empty check: function emptyempty($vars){
// echo "hello world";
// Create connection
//    $conn = new mysqli($servername, $username, $password,$db);

// define variables to empty values
$fnameErr = $emailErr = $mobilenoErr = $addressErr = $passErr = $confirmPassErr = $agreeErr = $miscErr = "";

$fname = $email  = $mobileno = $address  = $pass = $confirmPass  = $agree = "";
// $name = $email = $mobileno = $gender = $website = $agree = "";

//Input fields validation
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //Name Validation
    if (emptyempty($_POST["fullname"])) {
        $fnameErr = "Name is required";
    } else {
        $fname = input_data($_POST["fullname"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $fname)) {
            $fnameErr = "Only alphabets and white space are allowed";
        }
        if (strlen($fname) < 4) {
            $fnameErr = "Name must be at least 4 characters long";
        }
    }

    //Email Validation
    if (emptyempty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = input_data($_POST["email"]);
        // check that the e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    //mobile Number Validation
    if (emptyempty($_POST["mobile"])) {
        $mobilenoErr = "Mobile no is required";
    } else {
        $mobileno = input_data($_POST["mobile"]);
        // check if mobile no is well-formed
        if (!preg_match("/^[9][6-8]{1}[0-9]{8}$/", $mobileno)) {
            $mobilenoErr = "Enter valid mobile number. E.g. 9XXXXXXXXX";
        }
        //check mobile no length should not be less and greator than 10
        if (strlen($mobileno) != 10) {
            $mobilenoErr = "Mobile no must contain 10 digits.";
        }
    }

    
    //address Validation
    if (emptyempty($_POST["address"])) {
        $addressErr = " Address is required";
    } else {
        $address = input_data($_POST["address"]);
        // check if name only contains letters and numbers and - and #
        if (!preg_match("/^[#.0-9a-zA-Z\s,-]+$/", $address)) {
            $addressErr = "Enter a valid address";
        }
    }


    //Password  Validation
    if (emptyempty($_POST["password"])) {
        $passErr = "Password is required";
    } else {
        $pass = input_data($_POST["password"]);
        // check if URL address syntax is valid
        if (!preg_match("/(?=^.{8,}$)(?=.*\d)(?=.*[!@#$%^&*]+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/", $pass)) {
            $passErr = "Not Strong Password";
        }
    }
    //confirm Password  Validation
    if (emptyempty($_POST["cpassword"])) {
        $confirmPassErr = "Confirm Password is required";
    } else {
        $confirmPass = input_data($_POST["cpassword"]);
        // check if URL address syntax is valid
        if ($pass != $confirmPass) {
            $confirmPassErr = "Confirm Password not match";
        }
    }





    //Checkbox Validation
    if (!isset($_POST['agree'])) {
        $agreeErr = "Accept terms of services before submit.";
    } else {
        $agree = input_data($_POST["agree"]);
    }
}

if (isset($_POST["staff_register"])) {
    $db = new DatabaseConnection();
    $emailErr = checkEmailDuplicate($db,'staff','email',$email);
    $mobilenoErr = checkEmailDuplicate($db,'staff','mobile',$mobileno);
    if ($fnameErr == "" && $emailErr == ""  && $mobilenoErr == "" && $addressErr == ""   && $passErr == "" && $confirmPassErr == ""   && $agreeErr == "" ) {
        
        $cleaned_data = new RealEscaperString();
        $fname = $cleaned_data->cleanSql($fname);
        $email = $cleaned_data->cleanSql($email);
        $address = $cleaned_data->cleanSql($address);
        $mobileno = $cleaned_data->cleanSql($mobileno);
        $pass = $cleaned_data->cleanSql($pass);
        $pass = password_hash($pass, PASSWORD_DEFAULT);

     
        $staff_id= autoincStaff($db);

        try {
            session_start();
            $registrationQuery = "INSERT INTO `staff` (`staff_id`, `email`, `fullname`, `address`, `mobile`, `password`, `branch_id`) VALUES ('$staff_id','$email','$fname','$address','$mobileno','$pass','hetauda')";
            if($db->conn->query($registrationQuery) === TRUE){
                $_SESSION['regis_success']="Staff Registered Successfully. Please proceed to <a href='/cargo/user/login.php'>Login</a>";
                header("Location: ../user/registration.php");
            }else{
                $_SESSION['miscErr']= "Sorry some errors occured. Refill the form.";
            }

        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            echo "<br><a href='/cargo'>GO BAck </a>";
        }
       
        // if (isset($result)) {
        //     echo "data inserted successfully";
        // } else {
        //     echo "<h3 color = 'red'> <b>You have sucessfully registered.</b> </h3>";
        //     echo "<h2>Your Input:</h2>";
        //     echo "Name: " . $fname;
        //     echo "<br>";
        //     echo "Email: " . $email;
        //     echo "<br>";
        //     echo "dob: " . $dob;
        //     echo "<br>";
        //     echo "Mobile No: " . $mobileno;
        //     echo "<br>";
        //     echo "address: " . $address;
        //     echo "<br>";
        //     echo "landmark: " . $landmark;
        //     echo "<br>";
        //     echo "city: " . $city;
        //     echo "<br>";
        //     echo "state: " . $state;
        //     echo "<br>";
        //     echo "pass: " . $pass;
        //     echo "<br>";
        //     echo "confirmPass: " . $confirmPass;
        //     echo "<br>";
        //     echo "file: " . $file;
        //     echo "<br>";
        //     echo "profile: " . $profile;
        //     echo "<br>";
        //     echo "Gender: " . $gender;
        //     echo "<br>";
        //     echo "Gender: " . $agree;
        //     echo "<br>";
        //     echo "Gender: " . $age;
        //     echo "<br>";
        //     echo "dim" . $width . " X " . $height;
        //     echo "<br>";
        //     echo "dimProf" . $widthProf . " X " . $heightProf;
        // }

    } else {
        $miscErr = "Sorry some errors occured. Refill the form.";
        session_start();
        $_SESSION['miscErr'] = $miscErr;
        $_SESSION['fnameErr'] = $fnameErr;
        $_SESSION['emailErr'] = $emailErr;
        $_SESSION['mobilenoErr'] = $mobilenoErr;
        $_SESSION['addressErr'] = $addressErr;
        $_SESSION['passErr'] = $passErr;
        $_SESSION['confirmPassErr'] = $confirmPassErr;
        $_SESSION['agreeErr'] = $agreeErr;

        echo "<script>

         window.location.href='/cargo/user/registration.php';

          </script>";
    }
}