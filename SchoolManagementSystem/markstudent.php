<?php include 'db.php';
if(isset($_POST['submit']))
    {    
     $id = $_POST['id'];
     $student = $_POST['student'];
     $sql = "insert into mark-class-student(student) values('$class','$section')";
     $insertionResult=mysqli_query($connection,$sql) or die("Something went wrong");
     header("location:markviewclass.php?id=$id &class=$class &section=$section");
    }
?>
<?php include("header.php"); ?>
      <?php include("navadmin.php"); ?>
      <?php include("db.php"); ?>   
      <div class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3" style="position: absolute;margin-top:50px;">
       <center><form class="form-group" method="post" id="loginForm">
          <input type="hidden" name="id">
          <div class="form-group col-sm-10">
          <select name= "student" class ="form-control">
          <?php
          $class= $_GET['class'];
          $section= $_GET['section'];
          $sql = "SELECT st_id,fname,lname From student where class_id= $class and section_id= $section";
          $result=mysqli_query($connection,$sql);
          while($row=mysqli_fetch_array($result))
          echo "<option value='" . $row['st_id'] . "'>".  "" .$row['fname']. " " .$row['lname']. "</option>";
          ?>
          </select></p>
          <div class="invalid-feedback">
             student is required.
          </div>
          </div>
          <div class="form-group col-sm-10">
            <input type="submit" name="submit" class=" btn btn-primary" value= "show">
          </div>
        </form>
      <?php include("footer.php"); ?>