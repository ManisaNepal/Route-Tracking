<div class="container ">

    <form name="staffregis" action="/cargo/controller/registration.php" method="POST"
        onsubmit="return validateRegisFormStaff()">
        <div class="d-none <?php if(!empty($_SESSION['regis_success'])){
                                    echo 'd-block';
                                    
                                }?>">
            <h1>Registration Successful <i class="fa-solid fa-circle-check "></i> </h1>
            <small class="error" id="regis_success"><?php if(!empty($_SESSION['regis_success'])){
                                    echo $_SESSION['regis_success'];
                                    
                                }?>

            </small>

        </div>
        <div class="container col-8" style="border:5px double var(--primary-color);margin-top:2rem;">
            <header>
                <h1>Staff Registration</h1>
            </header>
            <div class="row p-0 m-0">
                <div class="error text-danger" id="miscErr"><?php if(!empty($_SESSION['miscErr'])){
                                    echo $_SESSION['miscErr'];
                                    unset($_SESSION['miscErr']);
                                }?></div>

                <div class="row col-6 ">
                    <div class="form-floating mb-3 ">
                        <input type="text" class="form-control px-4" id="floatingInput" placeholder="Your Full Name"
                            name="fullname">
                        <label for="floatingInput" class="px-5">Full Name</label>
                        <small id="nameErr" class="error py-2 text-danger"><?php if(!empty($_SESSION['fnameErr'])){
                                    echo $_SESSION['fnameErr'];
                                    unset($_SESSION['fnameErr']);
                                }?></small>

                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingPassword" placeholder="Address"
                            name="address">
                        <label for="floatingPassword" class="px-5">Address</label>
                        <small id="addressErr" class="error py-2 text-danger"><?php if(!empty($_SESSION['addressErr'])){
                                    echo $_SESSION['addressErr'];
                                    unset($_SESSION['addressErr']);
                                }?></small>

                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password"
                            name="password">
                        <label for="floatingPassword" class="px-5">Password</label>
                        <small id="passwordErr" class="error py-2 text-danger"><?php if(!empty($_SESSION['passErr'])){
                                    echo $_SESSION['passErr'];
                                    unset($_SESSION['passErr']);
                                }?></small>
                    </div>
                </div>
                <div class="row col-6 p-0 m-0 float-end" style="margin-left:7rem;">

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingPassword" placeholder="Email" name="email">
                        <label for="floatingPassword" class="px-5">Email</label>
                        <small id="emailErr" class="error py-2 text-danger"><?php if(!empty($_SESSION['emailErr'])){
                                    echo $_SESSION['emailErr'];
                                    unset($_SESSION['emailErr']);
                                }?></small>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingPassword" placeholder="Password"
                            name="mobile">
                        <label for="floatingPassword" class="px-5">Mobile No.:</label>
                        <small id="mobileErr" class="error py-2 text-danger"><?php if(!empty($_SESSION['mobilenoErr'])){
                                    echo $_SESSION['mobilenoErr'];
                                    unset($_SESSION['mobilenoErr']);
                                }?></small>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password"
                            name="cpassword">
                        <label for="floatingPassword" class="px-5">Confirm Password</label>
                        <small id="confirmPassErr" class="error py-2 text-danger"><?php if(!empty($_SESSION['confirmPassErr'])){
                                    echo $_SESSION['confirmPassErr'];
                                    unset($_SESSION['confirmPassErr']);
                                }?></small>
                    </div>
                </div>
                <div class=" mb-3 col-6">
                    <label for="agree">Terms and Conditions</label>
                    <span class="terms">

                        <input type="checkbox" name="agree" id="agree" value="yes" /> <span class="px-2">

                            I agree
                            with the
                        </span>
                        <a href="#" title="term of services" class="px-2"> term of services</a>
                    </span>
                    <small id="termsErr" class="text-danger"><?php if(!empty($_SESSION['agreeErr'])){
                                    echo $_SESSION['agreeErr'];
                                    unset($_SESSION['agreeErr']);
                                }?></small>

                </div>

                <div class="col-6">

                    <button type="submit" class="offset-2 col-8 rounded shadow-lg"
                        name="staff_register">Register</button>
                </div>
            </div>
        </div>
    </form>
</div>