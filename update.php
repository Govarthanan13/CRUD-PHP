<?php include('header.php');?>
<?php include('conn.php');?>


<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
}

 $query = "SELECT * FROM f1 WHERE `driver_id`='$id'";
        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("Query failed: " . mysqli_error($connection));
        }  else{
        $row = mysqli_fetch_assoc($result);
    
    }
?>

<?php

if(isset($_POST["update"])){
    if(isset($_GET["idn"])){
        $idn = $_GET["idn"];
    }
    
    $fname=$_POST["fname"];
    $lname=$_POST["lname"];
    $tname=$_POST["tname"];
    $query = "UPDATE `f1` SET `first_name`='$fname',`last_name`='$lname',`team_name`='$tname'WHERE `driver_id`='$idn'";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("Query failed: " . mysqli_error($connection));
    }  else{
        header('location: index.php?msg=UPDATED SUCCESSFULLY');
    }
}

?>
<form action="update.php? idn=<?php echo "$id"?>" method="post">
<div class="form_grp">
    <label for="fname">First Name:  </label><br>
    <input type="text" id="fname" name="fname" value="<?php echo $row['first_name'] ?>"><br><br>
    <label for="lname">Last Name:  </label><br>
    <input type="text" id="lname" name="lname" value="<?php echo $row['last_name'] ?>"><br><br>
    <label for="tname">Team Name:</label><br>
    <input type="text" id="tname" name="tname" value="<?php echo $row['team_name'] ?>"><br><br>
    <input type="submit" value="UPDATE" class="btn btn-success" name="update">
</div>
</form>



<?php include('footer.php');?>
