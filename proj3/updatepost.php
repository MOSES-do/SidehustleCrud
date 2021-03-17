<?php 
require 'db.php';
include 'connector1.php';
$error = "";
   


//Check for submit

if(!empty($error_msg)== 0) {
if(isset($_POST['form'])){
    //Get form data
    $update_id = mysqli_real_escape_string($conn, $_POST['update_id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $roll = mysqli_real_escape_string($conn, $_POST['roll']);
    $reg = mysqli_real_escape_string($conn, $_POST['reg']);
    $dept = mysqli_real_escape_string($conn, $_POST['dept']);
    $shift = mysqli_real_escape_string($conn, $_POST['shift']);
    $sem = mysqli_real_escape_string($conn, $_POST['sem']);
    $sex = mysqli_real_escape_string($conn, $_POST['sex']);
    $uname = mysqli_real_escape_string($conn, $_POST['uname']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);
    $pass2 = mysqli_real_escape_string($conn, $_POST['pass2']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $website = mysqli_real_escape_string($conn, $_POST['website']);
    $agree = mysqli_real_escape_string($conn, $_POST['agree']);
   
    $query = "UPDATE proj3 SET
                name='$name',
                roll='$roll',
                reg='$reg',
                dept='$dept',
                shift='$shift',
                sem='$sem',
                sex='$sex',
                uname='$uname',
                pass='$pass',
                pass2='$pass2',
                email='$email',
                website='$website',
                agree='$agree'
                
                

            WHERE id = {$update_id}";
    

    if(mysqli_query($conn, $query)){
        header('Location: view.php');
    } else {
        echo 'ERROR: '. mysqli_error($conn);
    }
} 

}else if(
    $error = "Something went wrong during form submission, please try again!");


//Create a query to grab the current post

//Get ID - to be able to generate any row of posts automatically by clicking the link
$id = mysqli_real_escape_string($conn, $_GET['id']);


//Create a query to get individual posts
// $query = 'SELECT * FROM posts WHERE id = 1'; instead of one we use .$id;
$query = 'SELECT * FROM proj3 WHERE id ='.$id;

//Get Result
$result = mysqli_query($conn, $query);

// //Fetch Data For a single post by using the mysqli_fetch_assoc syntax
$post = mysqli_fetch_array($result);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
    <script src="bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family-Montserrat|Open+Sans">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="login.php">ADMIN LOGIN</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 " style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Link
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Link</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<div class="container">
<div id="form-validation">
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
    
    <h3> CREATE STUDENT ACCOUNT </h3>

    <div class="form-group">
        <p> Name </p>
        <input type="text" name="name" placeholder="Name" value="<?php echo $post['Name']; ?>">
        <?php 
            if(isset($error_msg['name'])){
                echo "<div class='error'>" .$error_msg['name']. "</div>" ;
            }
        ?>
    
</div>
   

    <div class="form-group">
        <p> Roll </p>
        <input type="text" name="roll" placeholder="Roll" value="<?php echo $post['Roll']; ?>">
        <?php 
            if(isset($error_msg['roll'])){
                echo "<div class='error'>" .$error_msg['roll']. "</div>" ;
            }
        ?>
    </div>

    <div class="form-group">
        <p> Registration </p>
        <input type="text" name="reg" placeholder="Registration" value="<?php echo $post['Reg']; ?>">
        <?php 
            if(isset($error_msg['reg'])){
                echo "<div class='error'>" .$error_msg['reg']. "</div>" ;
            }
        ?>
    </div>

    <div class="form-group">
        <p> Department </p>
        <select name="dept" type="text" class="text"> 
            <option value="NULL">--Select Department</option>
            <option value="Banking & Finance">Banking & Finance</option>
            <option value="Chemical Engineering">Chemical Engineering</option>
            <option value="Mathematics">Mathematics</option>
            <option value="Computer Science">Computer Science</option>
            <option value="Account">Account</option>
        </select>
        <?php 
            if(isset($error_msg['dept'])){
                echo "<div class='error'>" .$error_msg['dept']. "</div>" ;
            }
        ?>
    </div>

    <div class="form-group">
        <p> Shift </p>
        <select name="shift" type="text" class="text" > 
            <option value="NULL">--Select Shift</option>
            <option value="1st">1st</option>
            <option value="2nd">2nd</option>
        </select>
        <?php 
            if(isset($error_msg['shift'])){
                echo "<div class='error'>" .$error_msg['shift']. "</div>" ;
            }
        ?>
    </div>

    <div class="form-group">
        <p> Semester </p>
        <select name="sem" type="text" class="text"> 
            <option value="NULL">--Select Semester</option>
            <option value="1st">1st</option>
            <option value="2nd">2nd</option>
            <option value="3rd">3rd</option>
            <option value="4th">4th</option>
            <option value="5th">5th</option>
            <option value="6th">6th</option>
            <option value="7th">7th</option>
            <option value="8th">8th</option>
        </select>
        <?php 
            if(isset($error_msg['sem'])){
                echo "<div class='error'>" .$error_msg['sem']. "</div>" ;
            }
        ?>
    </div>

    <div class="form-group">
    <p> Gender </p>
    <input type="radio" name="sex" value="Male" <?php if(isset($sex) && $sex ='Male') echo 'checked="checked"';?>> Male
    <input type="radio" name="sex" value="Female" <?php if(isset($sex) && $sex ='Female') echo 'checked="checked"';?>> Female
    <?php 
            if(isset($error_msg['sex'])){
                echo "<div class='error'>" .$error_msg['sex']. "</div>" ;
            }
        ?>
    </div>

    <div class="form-group">
        <p> Username </p>
        <input type="text" name="uname" placeholder="Username" value="<?php echo $post['Uname']; ?>">
        <?php 
            if(isset($error_msg['uname'])){
                echo "<div class='error'>" .$error_msg['uname']. "</div>" ;
            }
        ?>
    </div>


    <div class="form-group">
        <p> Password </p>
        <input type="password" class="pword" name="pass" placeholder="Enter Password" value="<?php echo $post['Pass']; ?>">
        <?php 
            if(isset($error_msg['pass'])){
                echo "<div class='error'>" .$error_msg['pass']. "</div>" ;
            }
        ?>
    </div>

    <div class="form-group">
        <p> Confirm Password </p>
        <input type="password"  class="pword" name="pass2" placeholder="Confirm Password" value="<?php echo $post['Pass2']; ?>">
        <?php 
            if(isset($error_msg['pass2'])){
                echo "<div class='error'>" .$error_msg['pass2']. "</div>" ;
            }
        ?>
    </div>

    <div class="form-group">
        <p> Website </p>
        <input type="text" name="website" placeholder="http://www.abz.com" value="<?php echo $post['Website']; ?>">
        <?php 
            if(isset($error_msg['website'])){
                echo "<div class='error'>" .$error_msg['website']. "</div>" ;
            }
        ?>
    </div>

    <div class="form-group">
        <p> Email </p>
        <input type="text" name="email" placeholder="acedevops@gmail.com" value="<?php echo $post['Email']; ?>">
        <?php 
            if(isset($error_msg['email'])){
                echo "<div class='error'>" .$error_msg['email']. "</div>" ;
            }
        ?>
    </div>

    <div class="form-group">
        <p> Image </p>
        <input type="file" name="img">
        <?php 
            if(isset($error_msg['img'])){
                echo "<div class='error'>" .$error_msg['img']. "</div>" ;
            }
        ?>
    </div>

    <div class="policy"  >
    <input type="checkbox" name="agree" value="yes" <?php if(isset($agree) && $agree='yes') ?> value="<?php echo $post['Agree']; ?>"> 
    <span> I agree with the Terms of Service </span>
    <span><p>and Privacy Policy</p></span>
    <?php 
            if(isset($error_msg['agree'])){
                echo "<div class='error'>" .$error_msg['agree']. "</div>" ;
            }
        ?>
    </div>

    <p class="error" style="text-align:center; color:red;">
    <?php if($error): ?>
        <?php echo $error; ?>
    <?php endif; ?>
    </p>

     <!-- edit button setup -->
     <input type="hidden" name="update_id" value="<?php echo $post['id']; ?>"> 
        

    <button type="submit" class="btn-1" name="form"> Update </button>
</div>
    
    </form>
    </div>



 <style>
.navbar{
    padding-bottom:40px;
}

.container-fluid{
    position:fixed;
    margin-top:30px;
    z-index:1
}

 #form-validation{
     margin-top:5%;
 }



 input[type="text"]{
    width:240px;
    padding: 8px;
}

.pword[type="password"]{
    width:240px;
    padding: 8px;
}

.form-group{
    margin-left:50px;
}


 .btn{
     margin:0px;
 }

 .success{
    color:white;
    font-weight: bold;
    padding-top:5px;
    float:left;
    width:110%;
    background-color: black;
    border: 0px;
    outline: 0px;
    margin-bottom:5px;
    text-align:center;
 }

body{
    background:linear-gradient(to right, rgb(94, 100, 126), rgba(94, 255, 126, 0));
}

.policy{
    margin-top: 20px;
    text-align: center;
    line-height:20px;
    margin-left:35px;
    font-size:14px;
}

.btn-1{
    margin-top: 20px;
    margin-left:120px;
    background-color: maroon;
    width:90px;
    height:30px;
    margin-bottom:30px;
    cursor:pointer;
    outline:none;
    border:none;
    border-radius:10px;
}




/*====Media Queries====*/


@media  (max-width:768px){
    #form-validation{
        top:10%;
        position:absolute;
        left:18%;
        align:center;

       
	}
}


@media  (max-width:1024px){
    #form-validation{
        position:absolute;
        left:20%;
        align:center;

       
	}
}


@media  (max-width:465px){
    #form-validation{
        position:absolute;
        left:2%;
        align:center;
	}
} 
 </style>

      

       
      


