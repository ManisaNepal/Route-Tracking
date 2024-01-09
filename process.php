<?php
include('connection.php');
$user=$_POST['uname'];
$pass=$_POST['pwsd'];
$sql="select * from cargo where username='$user' and password='$pass' ";
$result=mysqli_query($con,$sql) or die(mysqli_error($con));
// $row=mysqli_fetch_array($result);
if(mysqli_num_rows($result)>0){
    session_start();
    $_SESSION['auth']=true;
    echo "soccessful login";
    header("Location:homepage.php");
}
else{
    echo " <script>alert('Invalid email or password not matched try again');
    window.location.href='form.html'; 
    </script>";}

?>


<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card shadow">
                <div class="card-title text-center border-bottom">
                    <h2 class="p-3">Login</h2>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-4">
                            <label for="username" class="form-label">Username/Email</label>
                            <input type="text" class="form-control" id="username" />
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" />
                        </div>
                        <div class="mb-4">
                            <input type="checkbox" class="form-check-input" id="remember" />
                            <label for="remember" class="form-label">Remember Me</label>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn text-light main-bg">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>