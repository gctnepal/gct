<?php include("header.php"); ?>
<?php include 'db.php';
    if(isset($_POST['submit']))
    {    
     $id = $_POST['id'];
     $uname = $_POST['uname'];
     $password = $_POST['password'];
     $sql = "SELECT * FROM user WHERE `uname` = '$uname' AND `password` = '$password' ";
     $query = mysqli_num_rows(mysqli_query($connection, $sql));
     if($query==1){
	   $_SESSION['uname']=$uname;
		 header('location:studentlist.php');
     }
     else{
   	 echo "Username/password not matched";
     }
    }
?>    
      <div class="center">  
        <form class="form-group" method="post" id="loginForm">
          <input type="hidden" name="id">
          <div class="form-group col-md-10">
            <input class="form-control" type="text" name='uname' placeholder="username"/>
          </div>
          <div class="form-group col-md-10">
            <input class="form-control" type="password" name='password' placeholder="password"/>     
          </div>
          <div class="form-group col-sm-10">
            <input type="submit" name="submit" class=" btn btn-primary" value= "login">
          </div>
        </form>
      </div>           
<?php require("footer.php"); ?> 