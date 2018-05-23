<?php 
 include("db.php");
 $class = $_GET['class'];
 $section = $_GET['section'];
 $subject = $_GET['subject'];
 $st_query = "select st_id from marklist 
  where class = $class and section = $section and sub_id= $subject";
   $st_result=mysqli_query($connection, $st_query);
   while($row=mysqli_fetch_assoc($st_result)){
   $student=$row['st_id']; 
   $mark_query ="select th,pr from marklist where st_id = $student and sub_id = $subject";
   $mark_result=mysqli_num_rows(mysqli_query($connection, $mark_query));
    }
   if(isset($mark_result)){
    $mark_result;
    $st;
   	$res_query= "select th,pr from marklist where st_id = $st and sub_id = $subject";
   	$res_result=mysqli_query($connection, $res_query);
   	while($row=mysqli_fetch_assoc($res_result)){
    $th = $row['th'];
    $pr = $row['pr'];
    $check = "select sub_id,sub_name from subject where sub_id = $subject";
    $check_result=mysqli_query($connection, $check);
    while($row=mysqli_fetch_assoc($check_result)){
    $sub_id=$row['sub_id'];
    if($sub_id == 5){
   	echo '<td>'.'<div class="form-group col-md-4" style = "margin-left:-15px">'.'<input class="form-control" type="text" name="thmark[]" placeholder="Theory" value = "'.$th.'" required/>'.'</div>'.'</td>';
    }
    else{
    echo '<td>'.'<div class="form-group col-md-4" style = "margin-left:-15px">'.'<input class="form-control" type="text" name="thmark[]" placeholder="Theory" value = "'.$th.'" required/>'.'</div>'.'</td>';
    echo '<td>'.'<div class="form-group col-md-4" style = "margin-left:-15px">'.'<input class="form-control" type="text" name="prmark[]" placeholder="Practical" value = "'.$pr.'" required/>'.'</div><div class="invalid-feedback">
                hey!! fill it
              </div>'.'</td>';
          }
        }
      }
   } 
        else{
             $query="select st_id,fname,lname from student where class_id = $class and section_id = $section";
   	         echo '<td>'.'<div class="form-group col-md-4" style = "margin-left:-15px">'.'<input class="form-control" type="text" name="thmark[]" placeholder="Theory" required/>'.'</div>'.'</td>';
            echo '<td>'.'<div class="form-group col-md-4" style = "margin-left:-15px">'.'<input class="form-control" type="text" name="prmark[]" placeholder="Practical" required/>'.'</div><div class="invalid-feedback">
                hey!! fill it
              </div>'.'</td>';
   	}
 