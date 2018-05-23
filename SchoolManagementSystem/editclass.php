
<?php include 'db.php';
if(isset($_POST['submit']))
    {    
     $id = $_POST['id'];
     $class = $_POST['class'];
     $sql = "update class set class_name = '$class' where class_id = '$id'";
     $insertionResult=mysqli_query($connection,$sql) or die("Something went wrong");
     header('location:addclass.php');
    }
?>    <?php include("header.php"); ?>
      <?php include("navadmin.php"); ?>   
      <div class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3" style="position: absolute;margin-top:50px;">  
        <form data-toggle="validator" role="form" method ="post" class="needs-validation" novalidate>
          <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
          <div class="form-group col-md-10">
            <?php $class = $_GET['class']; ?>
          <input class="form-control" type="text" name="class" value = "<?php echo $class; ?>" placeholder="Enter Class" required/>
          <div class="invalid-feedback">
              hey!! you need to insert class .
            </div>
          </div>
          <div class="form-group col-sm-10">
            <input type="submit" name="submit" class=" btn btn-primary" value= "Update">
          </div>
        
<?php include("footer.php"); ?>