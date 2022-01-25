<?php include('database.php') ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Log In.</title>
        <link rel="stylesheet" href="./css/login.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-4 leftside">
                    <h2>Login using social media to get quick access</h2>
                    <div class="list-group container">
                        <button class="smbutton" id="facebookbtn">Login with Facebook</button>
                        <button class="smbutton" id="twitterbtn">Login with Twitter</button>
                        <button class="smbutton" id="googlebtn">Login with Google</button>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-8 rightside" style="padding:0px">
                    <h1>Login to your account</h1>
                    <p>Don't have an account? <a href="signup.php">Sign up for free!</a></p>

                    <form action="login.php" class="formdesign" name="myForm" method="post">
                        <?php include('errors.php'); ?>
                        <div class="form-group"><input name="email" type="email" class="form-control" placeholder="Email-Address" required></div>
                        <div class="form-group"><input name="password" type="password" class="form-control" placeholder="Password" required></div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                    <label class="form-check-label" for="gridCheck">
                                      Remember Me
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <a href="forgotpassword.php" >Forgot Password?</a>
                            </div>
                        </div>
                        <button name="login_user" type="submit" class="btn btn-lg btn-block btn-primary" id="loginbtn">Login</button>
                    </form>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>