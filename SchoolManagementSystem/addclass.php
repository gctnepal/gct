<?php include("header.php"); ?>
<?php include("navadmin.php"); ?>
<?php include 'db.php';
if(isset($_POST['submit']))
    {    
     $id = $_POST['id'];
     $name = $_POST['name'];
     $sql = "insert into class(class_name) values('$name') ";
     $insertionResult=mysqli_query($connection,$sql) or die("Something went wrong");
    }
?>    
      <div class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3" style="position: absolute;margin-top:50px;">  
        <form data-toggle="validator" role="form" method ="post" class="needs-validation" novalidate>
          <input type="hidden" name="id">
          <div class="form-group col-md-10">
          <input class="form-control" type="text" name="name" placeholder="Enter Class" required/>
          <div class="invalid-feedback">
              hey!! you need to insert class .
            </div>
          </div>
          <div class="form-group col-sm-10">
            <input type="submit" name="submit" class=" btn btn-primary" value= "Add">
          </div>
        <div class="table-responsive" >
        <table class="table table-striped" >
        <thead>
        <tr>
        <th>Class Name</th>
        <th>Action</th>
        </tr>
        </thead>
    <tbody>
    <?php
    include("db.php");
    $query="SELECT class_id,class_name from class";
    $result=mysqli_query($connection, $query);

    while($row=mysqli_fetch_assoc($result)){
    echo '<tr>';
    echo '<td>'.$row['class_name'].'</td>';
    echo '<td> <a class="btn btn-primary" href="editclass.php?id='.$row['class_id'].'&class='.$row['class_name'].'">Edit</a> <a class="btn btn-danger" href="deleteclass.php?id='.$row['class_id'].'">Delete</a> </td>';
    
    echo '</tr>';
  }
  ?>
</tbody>
</table>
</form>
</div>
<?php include("footer.php"); ?>