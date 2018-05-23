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
     $sql = "INSERT INTO student(fname,mname,lname,age,dob,email,address,city,country,class_id,section_id,dor) values('$fname','$mname','$lname','$age', '$d_o_b','$email','$address','$city','$country','$class','$section','$d_o_r')";
     $insertionResult=mysqli_query($connection,$sql) or die("Something went wrong");
     header('location:studentlist.php');
    }
?>
    <?php include("header.php"); ?>
    <?php include("navadmin.php"); ?>
     <div class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3" style="position: absolute;margin-top:50px;">  
        <form data-toggle="validator" role="form" method ="post" class="needs-validation" novalidate>
          <fieldset style="column-count: 2;column-gap:0px;">
          <legend style="margin-left:14px;">Basic Info</legend>
          <input type="hidden" name="id">
          <div class="form-group col-md-10">
          <input class="form-control" type="text" name="fname" placeholder="Enter First Name" required/>
            <div class="invalid-feedback">
              first name is required.
            </div>
          </div>
          <div class="form-group col-md-10">
          <input class="form-control" type="text" name="mname" placeholder="Enter Middle Name"/>
          </div>
          <div class="form-group col-md-10">
          <input class="form-control" type="text" name="lname" placeholder="Enter Last Name" required/>
          <div class="invalid-feedback">
             last name is required.
          </div>
          </div>
          <div class="form-group col-md-10">
          <input class="form-control" type="text" name="age" placeholder="Enter Age" required/>
          <div class="invalid-feedback">
          Age is required.
          </div>
          </div>
          <div class="form-group col-md-10">
           <div class="input-group date" data-provide="datepicker">
           <input type="text" name="date_of_birth" class="form-control" placeholder="Enter Date of birth" required>
           <label class="input-group-addon btn" for="date">
           <span class="fa fa-calendar open-datetimepicker"></span>
           </label>
           <div class="invalid-feedback">
             Valid date of birth is required.
            </div>   
           </div> 
          </div>
          <div class="form-group col-md-10">
          <input class="form-control" type="email" name="email" placeholder="Enter Email" required/>
          <div class="invalid-feedback">
             Valid email is required.
          </div>
          </div>
          </fieldset>
          <fieldset style="column-count: 3;column-gap:10px;">
          <legend style="margin-left:14px;">Address Info</legend>
          <div class="form-group col-md-10">
          <input class="form-control" type="text" name="address" placeholder="Enter Address" required />
          <div class="invalid-feedback">
             Valid address is required.
          </div>
          </div>
          <div class="form-group col-md-10">
          <input class="form-control" type="text" name="city" placeholder="Enter City" required />
          <div class="invalid-feedback">
             Valid city is required.
          </div>
          </div>
          <div class="form-group col-md-10">
          <input class="form-control" type="text" name="country" placeholder="Enter Country" required />
          <div class="invalid-feedback">
             Valid country is required.
          </div>
          </div>
          </fieldset>
          <fieldset style="column-count: 3;column-gap:10px;">
          <legend style="margin-left:14px;">Registration Info</legend>
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
          </div>
          <div class="form-group col-md-10">
           <div class="input-group date" data-provide="datepicker" required>
           <input type="text" name="date_of_reg" class="form-control" placeholder="Enter Date of registration" required>
           <label class="input-group-addon btn" for="date">
           <span class="fa fa-calendar open-datetimepicker"></span>
           </label>
            <div class="invalid-feedback">
             Valid date of registration is required.
            </div>
           </div>   
          </div>
          </fieldset>
          <div class="form-group col-sm-10">
            <input type="submit" name="submit" class=" btn btn-primary" value= "Add">
          </div>
        </form>
        <center><h2><button class="btn btn-primary">LIST OF STUDENTS</button></h2></center>
        <div class="table-responsive">
        <table class="table table-striped">
        <thead>
        <tr>
        <th>Id</th>
        <th>Student Name</th>
        <th>Age</th>
        <th>Date_of_Birth</th>
        <th>Email</th>
        <th>Address</th>
        <th>City</th>
        <th>Country</th>
        <th>Class</th>
        <th>Section</th>
        <th>Date of Registration</th>
        <th>Action</th>
        </tr>
        </thead>
    <tbody>
    <?php
    include("db.php");
    $query="SELECT s.st_id,s.fname,s.mname,s.lname,s.age,s.dob,s.email,s.address,s.city,s.country,s.dor,c.class_name,a.section_name from student s inner join class c on c.class_id = s.class_id inner join section a on a.section_id = s.section_id";
    $result=mysqli_query($connection, $query);

  while($row=mysqli_fetch_assoc($result)){
    echo '<tr>';
    echo '<td>'.$row['st_id'].'</td>';
    echo '<td>'.$row['fname'].' '.$row['mname'].' '.$row['lname'].'</td>';
    echo '<td>'.$row['age'].'</td>';
    echo '<td>'.$row['dob'].'</td>';
    echo '<td>'.$row['email'].'</td>';
    echo '<td>'.$row['address'].'</td>';
    echo '<td>'.$row['city'].'</td>';
    echo '<td>'.$row['country'].'</td>';
    echo '<td>'.$row['class_name'].'</td>';
    echo '<td>'.$row['section_name'].'</td>';
    echo '<td>'.$row['dor'].'</td>';
    echo '<td> <a class="btn btn-primary" href="edit.php?id='.$row['st_id'].'&f_name='.$row['fname']. '&m_name='.$row['mname']. '&lname='.$row['lname']. '&age='.$row['age']. '&dob='.$row['dob']. '&email='.$row['email']. '&address='.$row['address']. '&city='.$row['city']. '&country='.$row['country']. '&class_name='.$row['class_name']. '&section_name='.$row['section_name']. '&dor='.$row['dor'].'">Edit</a></td>';
    echo '<td> <a class="btn btn-danger" href="delete.php?id='.$row['st_id'].'">Delete</a> </td>';
    echo '</tr>';
  }
  ?>
</tbody>
</table>
<?php include("footer.php"); ?>