<?php include('header.php');?>
<?php include('conn.php');?>
<div class="box1">
    <h2>DRIVERS</h2>
    <button  id="addDriversBtn">ADD DRIVERS</button>
</div>

<!-- Modal -->
<div id="addDriversModal" class="modal">
  <!-- Modal content -->
  <form id="addDriverForm" action="insert.php" method="post" class="driver-form">
  <div class="modal-content">
    <span class="close">&times;</span>
    <h2>Add Drivers</h2>
   <div class="form_grp">
    <label for="fname">First Name:</label>
    <input type="text" id="fname" name="fname" required><br><br>
    <label for="lname">Last Name:</label>
    <input type="text" id="lname" name="lname" required><br><br>
    <label for="tname">Team Name:</label>
    <input type="text" id="tname" name="tname" required><br><br></div>
    <input type="submit" value="Add Driver" name="insert">
   
</form>
  </div>
</div>
        <table class="table table-hover table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Team Name</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
                
            </thead>
            <tbody>
                
            <?php
            
        $query = "SELECT * FROM f1";
        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("Query failed: " . mysqli_error($connection));
        }   while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
            <td> <?php echo $row['driver_id'] ?> </td>
            <td> <?php echo $row['first_name']?> </td>
            <td> <?php echo $row['last_name'] ?></td>
            <td> <?php echo $row['team_name'] ?></td>
            <td><a href="update.php? id=<?php echo $row['driver_id'] ?>"class="btn btn-success">UPDATE</a></td>
            <td><a href="delete.php? id=<?php echo $row['driver_id'] ?>"class="btn btn-danger">DELETE</a></td>
            </tr>
            <?php
        }
        ?>
            
            </tbody>
        </table>
<?php
if(isset($_GET['msg'])){
    echo "<h5>".$_GET['msg']."</h5>";
}

?>

  <?php include('footer.php');?>

       