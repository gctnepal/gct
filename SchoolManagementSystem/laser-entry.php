      <?php
       include("db.php");
       if(isset($_POST['submit']))
       {    
       $id = $_POST['entry_id'];
       $class = $_POST['class'];
       $section = $_POST['section'];
       $exam = $_POST['exam'];
       $sql = "INSERT INTO laserentry(class,section,exam) values('$class','$section','$exam')";
       $insertionResult=mysqli_query($connection,$sql) or die("Something went wrong");
       $query="SELECT e.l_id,c.class_id,a.section_id from laserentry e inner join class c on c.class_id = e.class inner join section a on a.section_id = e.section";
       $result=mysqli_query($connection, $query);
       while($row=mysqli_fetch_assoc($result)){
       	$id = $row['id'];
       	$class = $row['class_id'];
       	$section = $row['section_id'];
        header("location:markprocess.php?id=$id &class=$class &section=$section &subject=$subject &exam=$exam");
        }
       }
       ?>
       <?php include("header.php"); ?>
       <?php include("navadmin.php"); ?>
       <div class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3" style="position: absolute;margin-top:50px;">  
        <form data-toggle="validator" role="form" method ="post" class="needs-validation" novalidate>
        <input type="hidden" name="entry_id">
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
          </div>
          <div class="form-group col-md-10">
           <p>
           <select name= "exam" class ="form-control" required>
           <?php
           $sql = "SELECT * From exam ";
           $result=mysqli_query($connection,$sql);
           while($row=mysqli_fetch_array($result))
           echo "<option value='" . $row['exam_id'] . "'>". " " . $row['exam_type'] . "</option>";
          ?>
          </select>
          </p>
            <div class="invalid-feedback">
               class is required.
            </div>
          </div>
          <div class="form-group col-sm-10">
          <input type="submit" name="submit" class=" btn btn-primary" value= "Submit">
          </div>
        </form>