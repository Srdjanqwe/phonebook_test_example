<?php include "header.php" ?>
 <?php require_once "process.php"; ?>

<div class="bs-example">
  <div class="card border-dark mb-3" style="width: 60rem; height: 100rem;">
    <div class="card-body text-dark">

      <h5 class="card-title">
        <div class="container-fluid">
          <div class="form-horizontal">
            <div class="form-inline">
              <label class="control-label" for="Phonebook">Phonebook</label>  
            </div>
          </div>
        </div>
      </h5>
      <hr>

<div class="container-fluid">
  <form class="form-horizontal" action="process.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Firstname:</label>
            <div class="col-sm-4">
                <input type="text" name="firstname" class="form-control" value="<?php echo $firstname; ?>" placeholder="Enter Firstname" required>
            </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Lastname:</label>
           <div class="col-sm-4">
                <input type="text" name="lastname" class="form-control" value="<?php echo $lastname; ?>" placeholder="Enter Lastname" required>
            </div>
    </div>

    <div class="form-group row">
        <label for="users" class="col-sm-2 col-form-label">Phone Number:</label>
          <div class="col-sm-4">
                <input type="text" name="phonenumber" class="form-control" value="<?php echo $phonenumber; ?>" placeholder="Enter Phone Number" required>
          </div>
      </div>
    
    <div class="form-inline"> 
        <div class="col-sm-2"> 
          <?php if($update == true): ?>
              <button type="submit" name="update" class="btn btn-info">Update</button>
          <?php else: ?>
            <button type="submit" name="save" class="btn btn-primary mb-2">Save</button>
          <?php endif; ?>
        </div>
    </div>

  </form>
</div>

<br>
<h5 class="card-title">
        <div class="container-fluid">
          <div class="form-horizontal">
            <div class="form-inline">
              <label class="control-label" for="Contacts">Contacts List</label>  
            </div>
          </div>
        </div>
      </h5>

    <table id="table" class="table table-hover">
      <thead>
        <tr>
          <!-- <th>id</th> -->
          <th>Firstname</th>
          <th>Lastname</th>
          <th>Phone Number</th>
        </tr>
      </thead>

      <tbody>

<?php

$query = "SELECT * FROM users";
$select_users = mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($select_users)) {

$id = $row['id'];
$firstname = $row['firstname'];
$lastname = $row['lastname'];
$phonenumber = $row['phonenumber'];

echo "<tr>";
// echo "<td>$id</td>";
echo "<td>$firstname</td>";
echo "<td>$lastname</td>";
echo "<td>$phonenumber</td>";
echo "<td><a href='process.php?delete=$id'>Delete</a></td>"; 
echo "<td><a href='index.php?edit=$id'>Edit</a></td>"; 

}

?>

</tbody>
</table>

</div>
</div>
</div>

</body>
</html>