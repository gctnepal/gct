<?php include("db.php"); 
if(isset($_POST['submit']))
    {    
     $id = $_POST['id'];
     $name = $_POST['name'];
     $address = $_POST['address'];
     $religion = $_POST['religion'];
     $gender = $_POST['gender'];
     $relation= $_POST['relation'];
     $sql = "INSERT INTO parent(parent_name,parent_address,religion,gender,relation) values('$name','$address','$religion','$gender','$relation')";
     $insertionResult=mysqli_query($connection,$sql) or die("Something went wrong");
     header('location:index.php');
    }
?>
    <?php include("header.php"); ?>
    <?php include("navadmin.php"); ?>
     <div class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3" style="position: absolute;margin-top:50px;">  
        <form class="form-group" method="post">
          <input type="hidden" name="id">
          <div class="form-group col-md-10">
          <input class="form-control" type="text" name="name" placeholder="Enter Name"/>
          </div>
          <div class="form-group col-md-10">
          <input class="form-control" type="text" name="address" placeholder="Enter address"/>
          </div>
          <div class="form-group col-md-10">
          <p>
          <select name= "gender" required class ="form-control">
          <?php
          $sql = "SELECT * From gender ";
          $result=mysqli_query($connection,$sql);
          while($row=mysqli_fetch_array($result))
          echo "<option value='" . $row['gender_id'] . "'>". "Gender " . $row['gender_name'] . "</option>";
          ?>
          </select></p>
          </div>
          <div class="form-group col-md-10">
          <p>
          <select name= "religion" required class ="form-control">
          <?php
          $sql = "SELECT * From religion ";
          $result=mysqli_query($connection,$sql);
          while($row=mysqli_fetch_array($result))
          echo "<option value='" . $row['religion_id'] . "'>". "Religion " . $row['religion_name'] . "</option>";
          ?>
          </select></p>
          </div>
          <div class="form-group col-md-10">
          <input class="form-control" type="text" name="relation" placeholder="Enter relation"/>
          </div>
          <div class="form-group col-sm-10">
            <input type="submit" name="submit" class=" btn btn-primary" value= "Add">
          </div>
        </form>