<?php 
// include 'server.php';

    session_start();


    if(isset($_POST['logout'])){
        // echo "Good Success";
        session_unset();
        session_destroy();
        header('location: login.php');
    }
   
    
    ?>


?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
    </head>
    <body>

   
    </body>
    </html>