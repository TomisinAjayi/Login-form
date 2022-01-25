<?php
    session_start();

    //variables
    $fname = "";
    $lname = "";
    $email = "";
    $errors = array();

    //database connection
    $db = mysqli_connect("localhost", "root", "", "form");

    // register user
    if(isset($_POST["reg_user"])) {
        //get value input from form
        $fname = mysqli_real_escape_string($db, $_POST["fname"]);
        $lname = mysqli_real_escape_string($db, $_POST["lname"]);
        $email = mysqli_real_escape_string($db, $_POST["email"]);
        $password_1 = mysqli_real_escape_string($db, $_POST["password_1"]);
        $password_2 = mysqli_real_escape_string($db, $_POST["password_2"]);
        

        if (empty($fname)) { array_push($errors, "First Name is required!"); }
        if (empty($lname)) { array_push($errors, "Last Name is required!"); }
        if (empty($email)) { array_push($errors, "Email is required!"); }
        if (empty($password_1)) { array_push($errors, "Password is required!"); }
        if ($password_1 != $password_2) {
            array_push($errors, "The two passwords do not match");
        }

        $user_check_query = "SELECT * FROM usersinfo WHERE Email='$email' LIMIT 1";
        $result = mysqli_query($db, $user_check_query);
        $user = mysqli_fetch_assoc($result);

        if ($user) {
            if($user['email'] === $email) {
                array_push($errors, "Email already exists!");
            }
        }

        if (count($errors) == 0) {
            $password = md5($password_1);

            $query = "INSERT INTO usersinfo (Firstname, Lastname, Email, Password) 
                      VALUES('$fname', '$lname', '$email', '$password')";
            mysqli_query($db, $query);
            $_SESSION['email'] = $email;
            $_SESSION['success'] = "You are now logged in";
            header("location: index.php");
        }
    }
    // login user
    if (isset($_POST['login_user'])) {
        $email = mysqli_real_escape_string($db, $_POST["email"]);
        $password = mysqli_real_escape_string($db, $_POST["password"]);

        if(empty($email)) {
            array_push($errors, "Email is required");
        }
        if (empty($password)) {
            array_push($errors, "Password is required");
        }

        if(count($errors) == 0) {
            $password = md5($password);
            $query = "SELECT * FROM usersinfo WHERE Email='$email' AND Password='$password'";
            $results = mysqli_query($db, $query);
            if (mysqli_num_rows($results) == 1) {
            $_SESSION['email'] = $email;
            $_SESSION['success'] = "You are now logged in";
            header('location: index.php');
            }else {
                array_push($errors, "Wrong username/password combination");
            }
        }
    }

?>