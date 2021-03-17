<?php 

    
    $conn = mysqli_connect ('remotemysql.com', 'Qpez0DbReM', 'R8Tmn6FB2V', 'Qpez0DbReM');

        if(mysqli_connect_errno()){
            //Connection failed
            echo 'Failed to connect to MySQL '.mysqli_connect_errno();
        }
    

?>
