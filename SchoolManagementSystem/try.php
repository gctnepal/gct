function isLoginPage(){
	if($_SERVER['PHP_SELF']=='/student/check.php'){
     	return true;
	}
    else{
    	return false;
    }
} 
   function isuserloggedin()
    {
     if (isset($_SESSION['name'])){
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
             header('location:abc.php');
          }
        }
        else
        {
            if(!isuserloggedin()){
            header('location:check.php');
          }
        }
    }
?>   