<?php include("header.php"); ?>
<?php include("navadmin.php"); ?>
<?php include 'db.php';
if(isset($_POST['submit']))
    {    
     $id = $_POST['id'];
     $type = $_POST['type'];
     $sql = "insert into exam(exam_type) values('$type') ";
     $insertionResult=mysqli_query($connection,$sql) or die("Something went wrong");
    }
?>    
      <div class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3" style="position: absolute;margin-top:50px;">  
        <center><form class="form-group" method="post" id="loginForm">
          <input type="hidden" name="id">
          <div class="form-group col-md-10">
          <input class="form-control" type="text" name="type" placeholder="Enter Exam type"/>
          </div>
          <div class="form-group col-sm-10">
            <input type="submit" name="submit" class=" btn btn-primary" value= "Add">
          </div>
        </form></center>