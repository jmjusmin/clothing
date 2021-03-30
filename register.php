<?php
    session_start();
    include_once 'includes/header.php';
?>
<!--sign up-->
    <div class="wrapper">
        <div class="row justify-content-center align-items-center" style="margin:40px; ">
            <div class="col-sm-8">
                <div class="container-fluid pl-0 pr-0">
                    <!-- create a form that take all the input and validate it -->
                    <form action="includes/register.inc.php" method="post">
                        <h3 style="text-transform:uppercase; padding-bottom:10px">Register</h3>
                        <?php
                        //check error data in url and throw error
                        if(isset($_GET["error"])){
                            if($_GET["error"] == "emptyinput"){
                                echo "<p>Fill in all fields!</p>";
                            }
                            else if($_GET["error"] == "invalidUsername"){
                                echo "<p>Choose a proper username!</p>";
                            }
                            else if($_GET["error"] == "invalidEmail"){
                                echo "<p>Choose a proper email!</p>";
                            }
                            else if($_GET["error"] == "pwddoentMatch"){
                                echo "<p>Password doesn't match!</p>";
                            }
                            else if($_GET["error"] == "stmtfailed"){
                                echo "<p>Something went wrong, try again!</p>";
                            }
                            else if($_GET["error"] == "usernametaken"){
                                echo "<p>This username is taken!</p>";
                            }
                            else if($_GET["error"] == "none"){
                                echo "<p>You have register!</p>";
                            }
                        }
                        ?>
                        <!-- create a register form -->
                        <div class="row container-fluid pl-0 pr-0">
                            <div class="form-group col-sm-6">
                                <label for="user">Username</label>
                                <input type="text" class="form-control" name="userName" placeholder="Enter username" required>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="email">Email Address</label>
                                <input type="text" class="form-control" name="email" placeholder="Enter email address" required>
                            </div>
                        </div>
                        <div class="row container-fluid pl-0 pr-0">
                            <div class="form-group col-sm-6">
                                <label for="fName">First Name</label>
                                <input type="text" class="form-control" name="fName" placeholder="Enter first name" required>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="lName">Last Name</label>
                                <input type="text" class="form-control" name="lName" placeholder="Enter last name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Address</span>
                            </div>
                            <textarea class="form-control" name="address" aria-label="Address"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="pwd" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <label for="password2">Repeat Password</label>
                            <input type="password" class="form-control" name="rePwd" placeholder="Password" required>
                        </div>
                        <div class="modal-footer border-top-0 d-flex justify-content-center">
                            <button type="submit" name="signup_submit" class="btn btn-dark">Register</button>
                        </div> 
                        <div style="padding-top:20px">
                        <!-- link to log-in page if user already have account -->
                        <p style="text-align:center; font-size:70%">Already have an account?<a href="login.php">&nbsp;Log in</a></p>
                        </div>               
                    </form>
                </div>    
            </div>
        </div>
    </div>

<?php
    include_once 'includes/footer.php';
?> 
