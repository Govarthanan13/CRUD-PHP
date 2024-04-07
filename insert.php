<?php
include 'conn.php';
if(isset($_POST['insert'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $tname = $_POST['tname'];

    $query = "INSERT INTO `f1` (`first_name`, `last_name`, `team_name`) VALUES ('$fname', '$lname', '$tname')";
    $result = mysqli_query($connection, $query);

    if(!$result){
        die("Query failed: " . mysqli_error($connection));
    } else {
        header('location: index.php?msg=ADDED SUCCESSFULLY');
    }
}
?>
