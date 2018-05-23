<div class="dashboard">
    <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
      <button class="navbar-toggler navbar-toggler-right hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">Dashboard</a>
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="notice.php">Notices</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="about.php">About Us</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="contact.php">Contact Us</a>
          </li>
          <li class="nav-item dropdown active" style=" position:absolute;margin-left: 850px;">
           <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="false" aria-expanded="true">
           <?php  
           echo "" .$_SESSION['uname'];
           ?>
           </a>
           <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
           <a class="dropdown-item" href="#">setting</a>
           <a class="dropdown-item" href="#">about</a>
           <a class="dropdown-item" href="logout.php">Signout</a>
           </div>
          </li>   
        </ul>
        <form class="form-inline mt-2 mt-md-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>
    <div class="container-fluid">
      <div class="row">
        <nav class="col-sm-3 col-md-2 hidden-xs-down bg-faded sidebar" style="margin-top: 65px;">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="addstudent.php">Add Students <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="addclass.php">Add Class</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="addsection.php">Add Section</a>
            </li>
          </ul>
          
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="addparent.php"> Add Teachers<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="addreligion.php">Add Religion </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="addgender.php">Add Gender</a>
            </li>
          </ul>
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="">Academics<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="entry.php">Mark Entry</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="subject.php">Add Subject</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="exam.php">Add Exam</a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="markview.php">View Marksheet Randomly</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="laser-entry.php">View Marksheet(class)</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="markviewstudent.php">View Marksheet(student)</a>
            </li>
          </ul>
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="#">Attendance<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="markviewstudent.php">Take Attendance </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="markviewstudent.php">View Attendance </a>
            </li>
          </ul>
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="#">Notice<span class="sr-only">(current)</span></a>
            </li>
          </ul>    
        </nav>
        