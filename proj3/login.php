<?php 
require 'db.php';


/*Start the  session */
session_start();
//Check if session exist
if(isset($_SESSION['id'])){
    //redirect to dashboard
    header('location: view.php');
}

$Username="";
$Password="";


if(isset($_POST['submit'])){
    // echo "Success";
    
 
    $Username = $conn->real_escape_string($_POST['Username']);
    if(empty($_POST['Username'])){
        $error_msg['Username'] = "Please enter your username";
    
    }
    $Password = $conn->real_escape_string($_POST['Password']);
    if(empty($_POST['Password'])){
        $error_msg['Password'] = "Please enter your password";
    
    } else{


    $sql = $conn->prepare( "SELECT * FROM proj3a WHERE Username = ? AND Password = ? ");
    $sql->bind_param("ss", $Username, $Password);
    $sql->execute();
    
    $result = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
    // echo "<pre>";
    //         print_r($result);
    //         echo "</pre>";
    //         exit; 
    //          if ($result->num_rows > 0){ Testing

    if(count($result) > 0){
//  while($row = $result->fetch_assoc()){Testing

        /*Start the session*/
        #Set session var iables
        // $_SESSION["id"] = $row['id']; 
        // $_SESSION["Username"] = $row['Username'];
                
        session_start();
    //Set Session Variables
        $_SESSION["id"] = $result[0]['id'];
        $_SESSION["Username"] = $result[0]['Username'];
        header("location: view.php");
    // }
    } else {
        // echo "<div class='message error'>Email and Password DO Not Match.</div>";  
        // $error_log = "Wrong username/password combination, please try again";

    }  
       ?>
    <script>
    alert ("Wrong username/password combination, please try again"); 
    </script>
    <?php    
} 

}

mysqli_close($conn);


 

 


//LOGIN ADMIN
// if(isset($_POST['submit'])) { 
//     $Username = $conn->real_escape_string($_POST['Username']);
//     if(empty($_POST['Username'])){
//         $error_msg['Username'] = "Please enter your username";
    
//     }
//     $Password = $conn->real_escape_string($_POST['Password']);
//     if(empty($_POST['Password'])){
//         $error_msg['Password'] = "Please enter your password";
    
//     } else{

    

//     $query = "SELECT * FROM proj3a WHERE Username = '$Username' AND Password = '$Password' ";
//     $result = mysqli_query($conn, $query);

//     $user = mysqli_fetch_assoc($result);
  
//     // var_dump($user);
//     // die();
 
//    if($user == 0){
//       if(['Username'] === $Username && ['Password'] === $Password ){
//         $_SESSION['Username'] = $Username;
//         $_SESSION['success'] = "You are now logged in";
//         header('location: view.php');
                       
//               } else{
//                   >
//                   <script>
//                   alert ("Wrong username/password combination, please try again"); 
//                   </script>
//                   <?php    
//               }   

//             } else if (header('location: view.php'));   
// }
// }

?>





<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Log In</title>

<link rel="stylesheet" href="css/style.css" />

</head>

<body>

<!-- <nav><a href="" class="focus">Log In</a></nav> -->

<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">

	<h2>Admin Login</h2>
    <div class="form-group">
    <input type="text" name="Username" class="text-field" placeholder="Username" value="<?= $Username ?>">
    <?php 
            if(isset($error_msg['Username'])){
                echo "<div class='error'>" .$error_msg['Username']. "</div>" ;
            }
        ?>

    </div>

    <div class="form-group">
    <input type="password" name="Password" class="text-field" placeholder="password" value="<?= $Password ?>">
    <?php 
            if(isset($error_msg['Password'])){
                echo "<div class='error'>" .$error_msg['Password']. "</div>" ;
            }
        ?>
    </div>
    
  <!-- <a href=""><input type="button"  class="button" value="Log In" /></a> -->
  <input type="submit" name="submit" value="submit">
          <!-- <php   if(isset($error_log)): ?>
            <php echo $error_log ?>
          <php endif; ?> -->


  <h6 style="font-family:tahoma"> New Admin? <a href="#"> Sign Up </a>


</form>

</body>

</div>
</div>



    </body>
    </html>