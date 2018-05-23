<?php include("header.php"); ?>
<?php include("navadmin.php"); ?>
<?php include 'db.php';
if(isset($_POST['submit']))
    {    
     $id = $_POST['id'];
     $name = $_POST['name'];
     $sql = "insert into section(section_name) values('$name') ";
     $insertionResult=mysqli_query($connection,$sql) or die("Something went wrong");
    }
?>    
      <div class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3" style="position: absolute;margin-top:50px;">  
        <form class="form-group" method="post">
          <input type="hidden" name="id">
          <div class="form-group col-md-10">
          <input class="form-control" type="text" name="name" placeholder="Enter section"/>
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
    $query="SELECT section_id,section_name from section";
    $result=mysqli_query($connection, $query);

    while($row=mysqli_fetch_assoc($result)){
    echo '<tr>';
    echo '<td>'.$row['section_name'].'</td>';
    echo '<td> <a class="btn btn-primary" href="editsection.php?id='.$row['section_id'].'&section='.$row['section_name'].'">Edit</a> <a class="btn btn-danger" href="deletesection.php?id='.$row['section_id'].'">Delete</a> </td>';
    
    echo '</tr>';
  }
  ?>
</tbody>
</table>
</form>
</div>
<?php include("footer.php"); ?>