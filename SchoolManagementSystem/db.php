<?php
  $dbhost="localhost";
  $dbuser="root";
  $dbpass='';
  $dbname="school_management_system";
  $connection= mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die(mysqli_error()."Could not connect db");
  return $connection;
?>