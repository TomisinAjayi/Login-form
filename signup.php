<?php
// Functions to filter user inputs
function filterName($field){
    // Sanitize user name
    $field = filter_var(trim($field), FILTER_SANITIZE_STRING);
    
    // Validate user name
    if(filter_var($field, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        return $field;
    } else{
        return FALSE;
    }
}    
function filterEmail($field){
    // Sanitize e-mail address
    $field = filter_var(trim($field), FILTER_SANITIZE_EMAIL);
    
    // Validate e-mail address
    if(filter_var($field, FILTER_VALIDATE_EMAIL)){
        return $field;
    } else{
        return FALSE;
    }
}
function filterString($field){
    // Sanitize string
    $field = filter_var(trim($field), FILTER_SANITIZE_STRING);
    if(!empty($field)){
        return $field;
    } else{
        return FALSE;
    }
}
 
// Define variables and initialize with empty values
$nameErr = $emailErr = $messageErr = $passwordErr = "";
$name = $lname = $email = $password = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate user name
    if(empty($_POST["name"])){
        $nameErr = "Please enter your name.";
    } else{
        $name = filterName($_POST["name"]);
        if($name == FALSE){
            $nameErr = "Please enter a valid name.";
        }
    }

    // Validate user name
    if(empty($_POST["lname"])){
        $nameErr = "Please enter your name.";
    } else{
        $lname = filterName($_POST["lname"]);
        if($lname == FALSE){
            $nameErr = "Please enter a valid name.";
        }
    }
    
    // Validate email address
    if(empty($_POST["email"])){
        $emailErr = "Please enter your email address.";     
    } else{
        $email = filterEmail($_POST["email"]);
        if($email == FALSE){
            $emailErr = "Please enter a valid email address.";
        }
    }

    // Validate user passowrd
    if(empty($_POST["password"])){
        $passwordErr = "Please enter your password.";     
    } else{
        $password = filterString($_POST["password"]);
        if($password == FALSE){
            $passwordErr = "Please enter a valid password.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Sign up</title>
        <link rel="stylesheet" href="./css/signup.css">
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
                    <h1>Sign up for free.</h1>

                    <form action="welcome-page.php" class="formdesign" method="POST">
                        <div class="form-group">
                            <input name="name"type="text" class="form-control"  value="<?php echo $name; ?>" placeholder="First Name" required>
                            <span class="error"><?php echo $nameErr; ?></span>
                        </div>
                        
                        <div class="form-group">
                            <input name="lname" type="text" class="form-control" value="<?php echo $lname; ?>" placeholder="Last Name" required>
                            <span class="error"><?php echo $nameErr; ?></span>
                        </div>

                        <div class="form-group">
                            <input name="email" type="email" class="form-control" value="<?php echo $email; ?>" placeholder="Email-Address" required>
                            <span class="error"><?php echo $emailErr; ?></span>
                        </div>

                        <div class="form-group">
                            <input name="password" type="password" class="form-control" value="<?php echo $password; ?>" placeholder="Password" required>
                            <span class="error"><?php echo $passwordErr; ?></span>
                        </div>
        
                        <button type="submit" class="btn btn-lg btn-block btn-primary" id="signupbtn">Signup</button>
                        <a href="login.html" id="loginlink">Already have an account?</a>
                    </form>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>