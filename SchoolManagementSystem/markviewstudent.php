
<?php include 'db.php';
if(isset($_POST['submit']))
    {    
     $id = $_POST['id'];
     $class = $_POST['class'];
     $section = $_POST['section'];
     $sql = "insert into mark_class(class,section) values('$class','$section')";
     $insertionResult=mysqli_query($connection,$sql) or die("Something went wrong");
     header("location:markstudent.php?id=$id &class=$class &section=$section");
    }
?>
      <?php include("header.php"); ?>
      <?php include("navadmin.php"); ?>    
      <div class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3" style="position: absolute;margin-top:50px;">  
        <center><form class="form-group" method="post" id="loginForm">
          <input type="hidden" name="id">
          <div class="form-group col-md-10">
          <p>
          <select name= "class" required class ="form-control" required>
          <?php
          $sql = "SELECT * From class ";
          $result=mysqli_query($connection,$sql);
          while($row=mysqli_fetch_array($result))
          echo "<option value='" . $row['class_id'] . "'>". "Class " . $row['class_name'] . "</option>";
          ?>
          </select></p>
          </div>
          <div class="form-group col-md-10">
          <p>
          <select name= "section" required class ="form-control" required>
          <?php
          $sql = "SELECT * From section ";
          $result=mysqli_query($connection,$sql);
          while($row=mysqli_fetch_array($result))
          echo "<option value='" . $row['section_id'] . "'>". "Section " . $row['section_name'] . "</option>";
          ?>
          </select></p>
          <div class="invalid-feedback">
             Valid section is required.
          </div>
          <div class="form-group col-sm-10">
            <input type="submit" name="submit" class=" btn btn-primary" value= "show">
          </div>
        </form></center>