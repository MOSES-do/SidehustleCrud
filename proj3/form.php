<?php  require 'connector.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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


<div class="container" >
<div id="form-validation">
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
    
    <h3> CREATE STUDENT ACCOUNT </h3>
    <!-- <a href="view.php" class = "btn btn-primary" style="text-decoration:none; padding:10px; color:white" >View List</a> -->
    <div class="form-group">
        <p> Name </p>
        <input type="text" class="form-control" name="name" placeholder="Name" value="<?= $name ?>">
        <?php 
            if(isset($error_msg['name'])){
                echo "<div class='error'>" .$error_msg['name']. "</div>" ;
            }
        ?>

</div>
   

    <div class="form-group">
        <p> Roll </p>
        <input type="text"  class="form-control"name="roll" placeholder="Roll" value="<?= $roll ?>">
        <?php 
            if(isset($error_msg['roll'])){
                echo "<div class='error'>" .$error_msg['roll']. "</div>" ;
            }
        ?>
    </div>

    <div class="form-group">
        <p> Registration </p>
        <input type="text" class="form-control" name="reg" placeholder="Registration" value="<?= $reg ?>">
        <?php 
            if(isset($error_msg['reg'])){
                echo "<div class='error'>" .$error_msg['reg']. "</div>" ;
            }
        ?>
    </div>

    <div class="form-group">
        <p> Department </p>
        <select name="dept" type="text" class="text" > 
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
        <select name="sem" type="text" class="text" > 
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
    <input type="radio" name="sex" value="Male" checked> Male
     <!--<php if(isset($sex) && $sex ='Male') echo 'checked="checked"'; ?> This causes an error on form submission -->
    <input type="radio" name="sex" value="Female" checked> Female
    <?php 
            if(isset($error_msg['sex'])){
                echo "<div class='error'>" .$error_msg['sex']. "</div>" ;
            }
        ?>
    </div>

    <div class="form-group">
        <p> Username </p>
        <input type="text"  class="form-control" name="uname" placeholder="Username" value="<?= $uname ?>">
        <?php 
            if(isset($error_msg['uname'])){
                echo "<div class='error'>" .$error_msg['uname']. "</div>" ;
            }
        ?>
    </div>


    <div class="form-group">
        <p> Password </p>
        <input type="password"  class="form-control pword" name="pass" placeholder="Enter Password" value="">
        <?php 
            if(isset($error_msg['pass'])){
                echo "<div class='error'>" .$error_msg['pass']. "</div>" ;
            }
        ?>
    </div>

    <div class="form-group">
        <p> Confirm Password </p>
        <input type="password"   class="form-control pword" name="pass2" placeholder="Confirm Password" value="">
        <?php 
            if(isset($error_msg['pass2'])){
                echo "<div class='error'>" .$error_msg['pass2']. "</div>" ;
            }
        ?>
    </div>

    <div class="form-group">
        <p> Website </p>
        <input type="text" class="form-control" name="website" placeholder="http://www.abz.com" value="<?= $website ?>">
        <?php 
            if(isset($error_msg['website'])){
                echo "<div class='error'>" .$error_msg['website']. "</div>" ;
            }
        ?>
    </div>

    <div class="form-group">
        <p> Email </p>
        <input type="text" class="form-control" name="email" placeholder="acedevops@gmail.com" value="<?= $email ?>">
        <?php 
            if(isset($error_msg['email'])){
                echo "<div class='error'>" .$error_msg['email']. "</div>" ;
            }
        ?>
    </div>

    <div class="form-group">
        <p> Image </p>
        <input type="file" name="img" value='null'>
        <?php 
            if(isset($error_msg['img'])){
                echo "<div class='error'>" .$error_msg['img']. "</div>" ;
            }
        ?>
    </div>


    <div class="policy"  >
    <input type="checkbox" name="agree" value="yes" <?php if(isset($agree) && $agree='yes')  ?> > 
    <!--  -->
    
    <span> I agree with the Terms of Service </span>
    <span><p>and Privacy Policy</p>
    <?php 
            if(isset($error_msg['agree'])){
                echo "<div class='error'>" .$error_msg['agree']. "</div>" ;
            }
        ?>
    </div>

    <!-- <input type="hidden" name="error_msg"> -->
    <p class="error" style="text-align:center; color:red;">
    <?php if($error): ?>
        <?php echo $error; ?>
    <?php endif; ?>
    </p>

    <button type="submit" class="btn-1" name="form" style="margin-left:115px; "> SIGN UP</button>

    <div class="success" >
    <?php if($success): ?>
        <?php echo $success; ?>
    <?php endif; ?>
    </div>
    </div>
    </form>
 </div>

 <style>
.navbar{
    padding-bottom:50px;
}

.container-fluid{
    position:fixed;
    margin-top:30px;
    z-index:1
}

 #form-validation{
     margin-top:5%;
     /* padding-right:10px; */
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
        left:25%;
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


/* @media  (max-width:2560px){
    #form-validation{
        position:absolute;
        left:38%;
        align:center;

       
	}
} */



@media  (max-width:465px){
    #form-validation{
        position:absolute;
        left:14%;
        align:center;
	}
} 




 






    </style>
</body>
</html>
