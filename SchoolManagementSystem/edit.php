
<?php
include("db.php");
if(isset($_POST['submit']))
    {    
     $id = $_POST['id'];
     $fname = $_POST['fname'];
     $mname = $_POST['mname'];
     $lname = $_POST['lname'];
     $age = $_POST['age'];
     $d_o_b = $_POST['date_of_birth'];
     $email = $_POST['email'];
     $address = $_POST['address'];
     $city = $_POST['city'];
     $country = $_POST['country'];
     $class = $_POST['class'];
     $section = $_POST['section'];
     $d_o_r = $_POST['date_of_reg'];
     $sql = "INSERT INTO student(fname,mname,lname,age,dob,email,address,city,country,class_id,section_id,dor) values('$fname','$mname','$lname','$age', '$d_o_b','$email','address','$city','$country','$class','$section','$d_o_r')";
     $insertionResult=mysqli_query($connection,$sql) or die("Something went wrong");
     header('location:studentlist.php');
    }
?>
    <?php include("header.php"); ?>
    <?php include("navadmin.php"); ?>
     <div class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3" style="position: absolute;margin-top:50px;">  
        <form class="form-group" method="post">
          <fieldset style="column-count: 2;column-gap:0px;">
          <legend style="margin-left:14px;">Basic Info</legend>
          <input type="hidden" name="id">
          <div class="form-group col-md-10">
          <input class="form-control" type="text" name="fname" placeholder="Enter First Name"/>
          </div>
          <div class="form-group col-md-10">
          <input class="form-control" type="text" name="mname" placeholder="Enter Middle Name"/>
          </div>
          <div class="form-group col-md-10">
          <input class="form-control" type="text" name="lname" placeholder="Enter Last Name"/>
          </div>
          <div class="form-group col-md-10">
          <input class="form-control" type="text" name="age" placeholder="Enter Age"/>
          </div>
          <div class="form-group col-md-10">
           <div class="input-group date" data-provide="datepicker">
           <input type="text" name="date_of_birth" class="form-control" placeholder="Enter Date of birth">
            <div class="input-group-addon">
            <span class="glyphicon glyphicon-th"></span>
            </div>
           </div>   
          </div>
          <div class="form-group col-md-10">
          <input class="form-control" type="text" name="email" placeholder="Enter Email"/>
          </div>
          </fieldset>
          <fieldset style="column-count: 3;column-gap:10px;">
          <legend style="margin-left:14px;">Address Info</legend>
          <div class="form-group col-md-10">
          <input class="form-control" type="text" name="address" placeholder="Enter Address"/>
          </div>
          <div class="form-group col-md-10">
          <input class="form-control" type="text" name="city" placeholder="Enter City"/>
          </div>
          <div class="form-group col-md-10">
          <input class="form-control" type="text" name="country" placeholder="Enter Country"/>
          </div>
          
          </fieldset>
          <fieldset style="column-count: 3;column-gap:10px;">
          <legend style="margin-left:14px;">Registration Info</legend>
          <div class="form-group col-md-10">
          <p>
          <select name= "class" required class ="form-control">
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
          <select name= "section" required class ="form-control">
          <?php
          $sql = "SELECT * From section ";
          $result=mysqli_query($connection,$sql);
          while($row=mysqli_fetch_array($result))
          echo "<option value='" . $row['section_id'] . "'>". "Section " . $row['section_name'] . "</option>";
          ?>
          </select></p>
          </div>
          <div class="form-group col-md-10">
           <div class="input-group date" data-provide="datepicker">
           <input type="text" name="date_of_reg" class="form-control" placeholder="Enter Date of registration">
            <div class="input-group-addon">
            <span class="glyphicon glyphicon-th"></span>
            </div>
           </div>   
          </div>
          </fieldset>
          <div class="form-group col-sm-10">
            <input type="submit" name="submit" class=" btn btn-primary" value= "Add">
          </div>
        </form>