
<html>
<head>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" 
integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

<title>Student Information</title>
</head>
<body>
<h1> Student Information</h1>
<div class = "form-group">
<form  class="form-group" method="POST" action="data.php">
  <table border="0" cellpadding="10" cellspacing="10">
    <tr>
      <td>Name:</td>
      <td> <input class="form-control" type="text" name="name" ></td>
    </tr>
    <tr>
      <td>Address</td>
      <td> <input class="form-control" type="text" name="address"></td>
    </tr>
    <tr>
      <td>Age:</td>
      <td><input class="form-control" type="text" name="age"></td>
      <td>Class</td>
      <td><input class="form-control" type="text" name="class"></td>
    </tr>
    <tr>
    <td>Gender</td>
      <td><input  class="btn btn-primary" type="radio" name="gender" value="male">Male</td>
      <td><input class="btn btn-primary" type="radio" name="gender" value="female"> Female</td>
    </tr>
    <tr>
      <td>Contact:</td>
      <td><input type="text" class = "form-control" name="contact"></td>
      <td>Parent Name</td>
      <td><input type="text" class = "form-control" name="parent"></td>
    </tr>
    <tr>
      <td><input class= "btn btn-primary" type="submit" name="submit" value="submit"</td>
    </tr>
  </table>
</form>
</div>
</body>
    
</html>