<div class="container ">

    <form name="stafflogin" action="/cargo/controller/login.php" method="POST" onsubmit="return validateLoginFormStaff()">

        <div class="container col-8" style="margin-top:2rem;">
            <header>
                <h1>Staff Login</h1>
            </header>
            <div class="row p-0 m-0">

                <div class="row col-8 offset-2">
                    <div class="form-floating mb-3 ">
                        <input type="text" class="form-control px-2" id="floatingInput" placeholder="someone@some.com"
                            name="email">
                        <label for="floatingInput" class="px-5">Email</label>
                        <small id="emailErr" class="error py-2 text-danger"></small>

                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password"
                            name="password">
                        <label for="floatingPassword" class="px-5">Password</label>
                        <small id="passwordErr" class="error py-2 text-danger"></small>
                    </div>
                </div>

                <div class="col-8 offset-2 mb-3 px-5">
                    <!-- <input type="checkbox" name="remember" id="rememberme" value="yes" /> <span class="px-2">

                        Remember Me
                    </span> -->
                </div>

                <div class="col-8 offset-2 pb-3">

                    <button type="submit" class="offset-2 col-8 rounded shadow-lg">Login</button>
                <!--     <p>
                    
                    Don't have an account? <a href="registration.php">Sign Up</a>
                </p> -->
                </div>
            </div>
        </div>
    </form>
</div>

<!-- <script>
    $function(){
        $('login-form').submit(funtion(e){
            e.preventDefault();
            $('.pop_msg').remove()
            var_this = $(this)
            var_el = $('<div>')
                _el.addClass('pop_msg')
            _this.find('button').attr('disabled',true)
            _this.find('button[type="submit"]').text('Loging in..')
            $.ajax({
                url:'Actions.php?a=login',
                method:'POST',
                data:$(this).serialize(),
                dataType:'JSON',
                error:err=>{
                        console.log(err)
                        _el.addClass('alert alert-danger')
                        _el.text("An error occured.")
                        _this.prepend(_el)
                        _el.show('slow')
                        _this.find('button').attr('disabled',false)
                        _this.find('button[type="submit"]').text('save')
                },
                success:function(resp){
                    if(resp.status == 'success'){
                        _el.addClass('alert alert-success')
                        setTimeout(() =>{
                            location.replace('./');

                        

                        }, 2000);
                    }else{
                        _el.addClass('alert alert-danger')
                    }
                    _el.text(resp.msg)

                    _el.hide()
                    _this.prepend(_el)
                    _el.show('slow')
                    _this.find('button').attr('disabled',false)
                    _this.find('button[type="submit"]').text('save')
                }
            })
        })
    })
</script>
 -->
