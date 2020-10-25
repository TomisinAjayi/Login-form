<?php 
    include 'database.php';
?>

<?php
    mysqli_query($connect,"INSERT INTO user (name, lname, email, password)
    VALUES('$name', '$lname', '$email', '$password')");
    if(mysqli_affected_rows($connect) > 0){
        echo "<p>user Added</p>";
        
    } else {
        echo "user NOT Added<br />";
        echo mysqli_error($connect);
    }
?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Contact</title>
            <style>
                h1{
                    text-align: center;
                }
            </style>
        </head>
        <body>
            <h1>Hello 
                <?php 
                    echo $_POST["name"]; echo " ";
                    echo $_POST["lname"]; echo "<br/>";
                    echo $_POST["email"]; echo "<br/>";
                    echo $_POST["password"]; echo "<br/>";
                ?> 
            </h1>

        </body>
    </html>
