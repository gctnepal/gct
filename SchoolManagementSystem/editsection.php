
<?php include 'db.php';
if(isset($_POST['submit']))
    {    
     $id = $_POST['id'];
     $section = $_POST['section'];
     $sql = "update section set section_name = '$section' where section_id = '$id'";
     $insertionResult=mysqli_query($connection,$sql) or die("Something went wrong");
     header('location:addsection.php');
    }
?>    <?php include("header.php"); ?>
      <?php include("navadmin.php"); ?>   
      <div class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3" style="position: absolute;margin-top:50px;">  
        <form data-toggle="validator" role="form" method ="post" class="needs-validation" novalidate>
          <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
          <div class="form-group col-md-10">
            <?php $section = $_GET['section']; ?>
          <input class="form-control" type="text" name="section" value = "<?php echo $section; ?>" placeholder="Enter Class" required/>
          <div class="invalid-feedback">
              hey!! you need to insert .
            </div>
          </div>
          <div class="form-group col-sm-10">
            <input type="submit" name="submit" class=" btn btn-primary" value= "Update">
          </div>
        
<?php include("footer.php"); ?>