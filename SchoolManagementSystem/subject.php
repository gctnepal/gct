<?php include("header.php"); ?>
<?php include("navadmin.php"); ?>
<?php include 'db.php';
if(isset($_POST['submit']))
    {    
     $id = $_POST['id'];
     $subject = $_POST['subject'];
     $class = $_POST['class'];
     $sub = $_POST['subject_name'];
     $query = "select sub_name from classwisesubject where class_id = $class and sub_name = $subject";
     $result = mysqli_num_rows(mysqli_query($connection, $query));
     if($result==0){
       $sql = "insert into classwisesubject(sub_name,class_id,subject) values('$subject','$class','$sub')";
     $insertionResult=mysqli_query($connection,$sql) or die("Something went wrong");
    }
    else{
      echo $value = "dublicate entry";   
    }
  }
?>  
     <div class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3"
      style="position: absolute;margin-top:50px;"> 
        <center><form class="form-group" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
          <input type="hidden" name="id">
          <div class="form-group col-md-10">
           <p>
           <select name= "subject" class ="form-control" required>
           <?php
           $sql = "SELECT sub_id,sub_name From subject ";
           $result=mysqli_query($connection,$sql);
           while($row=mysqli_fetch_array($result)){
           echo "<option value='" . $row['sub_id'] . "'>". " " . $row['sub_name'] . "</option>";
            } ?>
          </select>
          </p>
          </div>
          
          <div class="form-group col-md-10">
           <p>
           <select name= "class" class ="form-control" required>
           <?php
           $sql = "SELECT * From class ";
           $result=mysqli_query($connection,$sql);
           while($row=mysqli_fetch_array($result))
           echo "<option value='" . $row['class_id'] . "'>". "Class " . $row['class_name'] . "</option>";
          ?>
          </select>
          </p>
            <div class="invalid-feedback">
               class is required.
            </div>
          </div>
          <div class="form-group col-sm-10">
            <input type="submit" name="submit" class=" btn btn-primary" value= "Add">
          </div>
        </form>
      </center>