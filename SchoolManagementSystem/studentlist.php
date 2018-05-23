<?php include("header.php"); ?>
<?php include("navadmin.php"); ?>
    <div class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3" style="position: absolute;margin-top:45px;">
    <center><h2><button class="btn btn-primary">LIST OF STUDENTS</button></h2></center>
        <div class="table-responsive">
        <table class="table table-striped">
        <thead>
        <tr>
        <th>Id</th>
        <th>First Name</th>
        <th>Middle Name</th>
        <th>Last Name</th>
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
    echo '<td>'.$row['fname'].'</td>';
    echo '<td>'.$row['mname'].'</td>';
    echo '<td>'.$row['lname'].'</td>';
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