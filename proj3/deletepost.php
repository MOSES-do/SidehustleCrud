
<?php 
require 'db.php';

$query = "DELETE FROM proj3 WHERE id = ' " . $_GET ['id'] . "'";
if(mysqli_query($conn, $query)){
    header('Location: view.php?Post successfully deleted');
    
    // echo "<font 'color:red'>Record deleted";
}
else{
    echo "<font 'color:red'>Error unable to delete record: " . mysqli_error($conn);
}
?>



