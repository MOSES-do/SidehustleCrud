<?php  

require 'db.php';



//Create a query

$query = 'SELECT * FROM proj3';

//Get Result
$results = mysqli_query($conn, $query);

// $output = mysqli_num_rows($results);

session_start();


?>
<link rel = "stylesheet" style="text/css" href="bootstrap.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
<!-- Font Awesome CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<style>
.name:hover{
    background-color:purple;
    color:white;
    padding: 4px  10.5px;
    cursor:pointer;
    border-radius: 10px; 
}

body{
    margin-top:10px;
}



@media  (max-width:600px){
    .dboard{
        top:120%;
        position:absolute;
        right:-170%;
        width:400%;   
	}
}

@media(max-width:600px){
    .logout{
        top:90%;
        position:absolute;
        right:-130%;
        margin-left:48em;
        /* width:400%;    */
	}
}

@media(max-width:600px){
    .name{
        position:absolute;
        right:-220%;
        margin-left:53em;
	}
}

.btn-label {
	position: relative;
	left: -12px;
	display: inline-block;
	padding: 6px 12px;
	background: rgba(0, 0, 0, 0.15);
	border-radius: 3px 0 0 3px;
}
 
.btn-labeled {
	padding-top: 0;
	padding-bottom: 0;
}
 



</style>

<div style="position:fixed">
            <a href="form.php" class = "btn btn-success" style="margin-left:8px;" >Register Student</a>

            <form action="logout.php" method ="POST">
        
             <input type = "submit"  value="Logout" style="margin-left:68em; position:absolute; top:0em;" name="logout" class="btn btn-success logout">
                  
             </form> 

        <?php 
            if(isset($_SESSION['Username'])){//This forces the page to redirect back to login.php if session is not set and if session is 
                //set and open on multiple pages once one is logged out all is logged out.
            echo "<span class='name'  style='margin:0px; font-weight:bold; position:absolute; width:8em; margin-left:53em; top:5px;'>" .'Hello, ' . $_SESSION["Username"] . "</span>";
            echo '<div class="dboard"><h1 style="text-align:center; margin-left:8em;">Welcome To Your Dashboard</h1></div>';
            } else {
                echo "<script> location.href='login.php' </script>";
            
            }

        ?>
    </div>

 <br><br><br><br><div style="overflow-x:auto  margin-top:60px;"><br>
<table class="table table-light " style="margin-top:40px; ">
            <thead class="thead-dark">
            <!-- <button type="submit" name = "logout"><a href="login.php?logout='1'">Logout</a></button>      -->
    
                <tr>
                    <th class="mc" >#</th>
                    <th class="mc">Full Name</th>
                    <th class="mc">Roll</th>
                    <th class="mc">Reg No.</th>
                    <th class="mc">Department</th>
                    <th class="mc">Shift</th>
                    <th class="mc">Semester</th>
                    <th class="mc">Gender</th>
                    <th class="mc">Uname</th>
                    <th class="mc">Password</th>
                    <th class="mc">Confirm Password</th>
                    <th class="mc">Website</th>
                    <th class="mc">Email</th>
                    <th class="mc">Policy</th>
                    <th class="mc">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php   while ($row = mysqli_fetch_array($results)) : ?>
                   <!-- <php  var_dump($row); ?> -->
                    <!-- var_dump($row); #This is used to test to see the content of the database i.e. Rows after connection has been created -->

                   
                <tr>
                     <td><?php echo $row['id']; ?></td>
                    <td class="text"><?php echo $row['Name']; ?></td>
                    <td class="text"><?= $row['Roll']; ?></td>
                    <td class="text"><?= $row['Reg']; ?></td>
                    <td class="text"><?= $row['Dept']; ?></td>
                    <td class="text"><?= $row['Shift']; ?></td>
                    <td class="text"><?= $row['Sem']; ?></td>
                    <td class="text"><?= $row['Sex']; ?></td>
                    <td class="text"><?= $row['Uname']; ?></td>
                    <td class="text"><?= $row['Pass']; ?></td>
                    <td class="text"><?= $row['Pass2']; ?></td>
                    <td class="text"><?= $row['Website']; ?></td>
                    <td class="text"><?= $row['Email']; ?></td>
                    <td class="text"><?= $row['Agree']; ?></td>
                    <!-- The field names must be the same as the character in the database -->

                    <!-- Edit button -->
                    <td> <a href="<?php "form.php" ;?>updatepost.php?id=<?php echo $row['id']; ?>"
                      class = "btn btn-labeled btn-info">Edit</a>
                    </td>

                    <td>
                    <!-- Delete button -->
                     <a  href="<?php "form.php";?>deletepost.php?id=<?php echo $row['id']; ?>"  <span class="btn-label"><i class="fa fa-trash"></i></span></button></a>   
                    </td> 
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
