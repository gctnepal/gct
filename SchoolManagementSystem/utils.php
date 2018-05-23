<?php 
    session_start();
    function isLoginPage(){
	if($_SERVER['PHP_SELF']=='/schoolManagementSystem/login.php'){
     	return true;
	}
    else{
    	return false;
    }
} 
   function isuserloggedin()
    {
     if (isset($_SESSION['uname'])){
    		return true;
    	}
    	else{
    		return false;
    	}
    }
    function checkLogin()
    {
    	if(isLoginPage()){
    	  if(isuserloggedin()){
             header('location:studentlist.php');
    	  }
    	}
    	else
    	{
    		if(!isuserloggedin()){
          	header('location:login.php');
    	  }
        }
    }
?>	 