<?php 
 include("db.php");
 $id = $_GET['id'];
 $sql = "Delete from student where id = $id";
 $result=mysqli_query($connection, $sql);
 header('location:studentlist.php');
?>