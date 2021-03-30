<?php
    session_start();
    include_once 'includes/header.php';
?> 

    <!--Log-in-->
    <div class="wrapper">
        <div class="row" style="margin-top:100px;margin-bottom:200px;">
            <div class="col-sm-6" style="padding:50px">
                <div class="container-fluid pl-0 pr-0"  >
                    <!-- create a form and validate it -->
                    <form action="includes/login.inc.php" method="post">
                        <h3 style="text-transform:uppercase; padding-bottom:10px">Log in</h3>
                        <?php
                        //check error data in url and throw error
                        if(isset($_GET["error"])){
                            if($_GET["error"] == "emptyinput"){
                        ?>
                                <p style="text-align:center;font-size:10px; color:red;">Fill in all fields!</p>
                        <?php
                            }
                            else if($_GET["error"] == "wronglogin"){
                        ?>
                                <p style="text-align:center;font-size:10px; color:red;">Please try to log-in again!</p>
                        <?php
                            }
                        }
                        ?>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="userName" placeholder="Enter username or email" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <!-- <label style="float: right; font-size:1vw"><a href="#">Forget password?</a></label> -->
                            <input type="password" class="form-control" name="pwd" placeholder="Password" required>
                        </div>
                        <div class="form-footer border-top-0 d-flex justify-content-center p-0">
                            <button type="submit" name="login_submit" class="btn btn-dark">Log in</button>
                        </div>
                    </form>
                </div>    
            </div>
            <!-- link to register page -->
            <div class="col-sm-4 " style="margin:100px;">
                <div class="container-fluid pl-0 pr-0">  
                    <h3>REGISTER</h3>
                    <p style="font-size:0.8em">IF YOU STILL DON'T HAVE A WAP!.COM ACCOUNT, USE THIS OPTION TO ACCESS THE REGISTRATION FORM.
                    PROVIDE YOUR DETAILS TO MAKE WAP!.COM PURCHASES EASIER.</p>
                    <br><a href="register.php" class="btn btn-dark">&nbsp;Register</a>
                </div>
            </div>
        </div> 
    </div>
<?php
    include_once 'includes/footer.php';
?> 
