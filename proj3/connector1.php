<?php 
require 'db.php';

$success = '';
$error = '';

//Value field validation
$name = $roll = $reg = $uname = $email = $agree = $website =  '';


    //Full Name
    if(isset($_POST['form'])){
    if($_POST['name'] == ""){
        $error_msg['name'] = "Name is required";
    }
    $name = $_POST['name'];
    if(!preg_match("/^[a-zA-Z ]*$/",$name)) {
        $error_msg['name'] = "Only letters and white spaces allowed";
    }


    //Roll
    $roll = $_POST['roll'];
    if(empty($roll)){
        $error_msg['roll'] = "Roll is required";
    }
    else if(!is_numeric($roll)){
        $error_msg['roll'] = "Only number allowed";
    }
    else if((strlen($roll) != 6)){
        $error_msg['roll'] = "Only input 6 digit numbers";
    }

    //Registration
    $reg = $_POST['reg'];
    if(empty($reg)){
        $error_msg['reg'] = "Reg. No required";
    }
    else if(!is_numeric($reg)){
        $error_msg['reg'] = "Only number allowed";
    }
    else if((strlen($reg) != 6)){
        $error_msg['reg'] = "Only input 6 digit numbers";
    }

    //Department
    $dept = $_POST['dept'];
    if($dept == "NULL"){
        $error_msg['dept'] = "Department is required";
    }

    //Shift
      $shift = $_POST['shift'];
      if($shift == "NULL"){
          $error_msg['shift'] = "Shift is required";
      }

      //Semester
      $sem = $_POST['sem'];
      if($sem == "NULL"){
          $error_msg['sem'] = "Semester is required";
      }

      //Gender
    //   $sex = $_POST['sex'];
    //   if($_POST['sex'] == ""){
    //       $error_msg['sex']= "Gender is required";
    //   }

      if(isset($_POST['sex'])) {//This line gave me warning errors so i enveloped it in an isset function
        $sex = $_POST['sex'];
        }
        if(empty($sex)){
            $error_msg['sex'] = "Gender is required";
        } 
    
      //Username
      $uname = $_POST['uname'];
      if($_POST['uname'] == ""){
          $error_msg['uname'] = "Username is required";

     //   if(!preg_match("/^[A-Za-z] [A-Za-z0-9] {5,21}$/", $uname)) {
    //     $error_msg['uname'] = "Username invalid";
    // }
     }


     //Email
    $email = $_POST['email'];//Post email must be above the database check query 
    if($_POST['email'] == ""){
        $error_msg['email'] = "* Email is required "; 
    }
   else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error_msg['email'] = "Invalid email";
    }
     


    //Password
    $pass = $_POST ['pass'];
    $pass2 = $_POST['pass2'];
    // $pass = md5($pass);
    // $pass2 = md5($pass2);
    // $pass = trim($pass);
    // $pass2 = trim($pass2);


    if($pass !== $pass2){
        $error_msg['pass2'] = "Passwords do not match";
    }

    else if(empty($pass)){
        $error_msg['pass'] = "Password required";
    }

    if(empty($pass2)){
        $error_msg['pass2'] = "Confirm password is required";
    }

    else if((strlen($pass) >= 8) && strlen($pass2) <= 50){
    //    $error_msg['pass2'] = "Password match";
    } else {
         $error_msg['pass2'] = "Password must  be between 8 - 20 characters";
    }

    //Image
    // if($_FILES['img']['name']){
    //     if( ($_FILES['img']['size'] <= (1024*1024)) and
    //     (($_FILES['img']['type']=="image/jpg") and 
    //     ($_FILES['img']['type']=="image/png"))){

    //             move_uploaded_file($_FILES['img']['tmp_Name'], 
    //             "upload/" .time() .rand() ."-" .$_FILES['img']['name']);
    //     }
    //     else{
    //         $error_msg['img'] = "Please upload image jpg/png format
    //                                 and max 1 MB";
    //     }
    // }
    // else{
    //     $error_msg['img'] = "Image is required";
    // }


  //Website
  $website = $_POST['website'];
  if($_POST['website'] == ''){
    $error_msg['website'] = "Website is required";
  }
  //An error message appeared and i was able to remove from the client side display by adding ==0 in my code
  else if(!filter_var($website, FILTER_VALIDATE_URL)  ){
      $error_msg['website'] = "Invalid Website";
  }

  //Policy
  if(isset($_POST['agree'])) {//This line gave me warning errors so i enveloped it in an isset function
  $agree = $_POST['agree'];
  }
  if(empty($agree)){
      $error_msg['agree'] = "Agree is required";
  } 


//SEND DATA INTO THE DATABASE TABLE
if(!empty($error_msg)== 0) {
        $sql = "INSERT INTO proj3 (name, roll, reg, dept, shift, sem, sex, uname, pass, pass2, website, email, agree) VALUES
        ('$name', '$roll', '$reg', '$dept', '$shift', '$sem', '$sex', '$uname', '$pass', '$pass2', '$website', '$email', '$agree')";

       if(mysqli_query($conn, $sql)){
                // var_dump($_POST);
                $success = "Submitted successfully"; 
       
    } else {
                echo    'ERROR: '. mysqli_error($conn);
            
            }
        } else if(
            $error = "Something went wrong during form submission, please try again!");
        }
    

    
    

?>

