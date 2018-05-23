<?php 
include("db.php");
if(isset($_POST['submit'])){
      $id = $_POST['id'];
       $no = $_POST['number'];
       for($i=0;$i<$no;$i++){
        $query = "select st_id from markstotal where  class = '".$_POST['class'][$i]."' and section = '".$_POST['section'][$i]."' and exam='".$_POST['exam'][$i]."'";
        $value = mysqli_num_rows(mysqli_query($connection, $query));
        echo $value;
        if($value==0){
          for($i=0;$i<$no;$i++){
        $sql = "INSERT INTO markstotal(st_id,class,section,exam,grand_total) values('".$_POST['st_id'][$i]."','".$_POST['class'][$i]."','".$_POST['section'][$i]."','".$_POST['exam'][$i]."','".$_POST['g_value'][$i]."')";

       $insertionResult=mysqli_query($connection,$sql) or die("Something went wrong");
        }
       $query="SELECT m.mt_id,c.class_id,a.section_id,e.exam_id from markstotal m inner join class c on c.class_id = m.class inner join section a on a.section_id = m.section
       inner join exam e on e.exam_id = m.exam";
       $result=mysqli_query($connection, $query);
       while($row=mysqli_fetch_assoc($result)){
        $id = $row['id'];
        $class = $row['class_id'];
        $section = $row['section_id'];
        $exam = $row['exam_id'];
         header("location:marksheetlist.php?id=$id &class=$class &section=$section &exam=$exam");
        }
       }
       else{
        $query="SELECT m.mt_id,c.class_id,a.section_id,e.exam_id from markstotal m inner join class c on c.class_id = m.class inner join section a on a.section_id = m.section
       inner join exam e on e.exam_id = m.exam";
       $result=mysqli_query($connection, $query);
         while($row=mysqli_fetch_assoc($result)){
          $id = $row['id'];
          $class = $row['class_id'];
          $section = $row['section_id'];
          $exam = $row['exam_id'];
           header("location:marksheetlist.php?id=$id &class=$class &section=$section &exam=$exam");
         }  
        }
      }
  }
    
?>
<?php include("header.php"); ?>
<?php include("navadmin.php"); ?>
<?php include("db.php"); ?>
<div class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3" style="position: absolute;margin-top:50px;">

<form class = "form-group" method = "post">
<?php
  $class = $_GET['class'];
  $exam = $_GET['exam'];
  $sec = $_GET['section'];
  $class_query = "select class_id from class where class_id = $class";
  $class_res=mysqli_query($connection,$class_query); 
  
  while($row_class=mysqli_fetch_assoc($class_res))
  {  
    $c_id=$row_class['class_id']; 
    ?>
    <input type = "hidden" name = "id" >
    
    <?php  } 
    $sec_query = "select section_id from section where section_id = $sec ";
    $sec_res=mysqli_query($connection,$sec_query); 
    while($row_sec=mysqli_fetch_assoc($sec_res)){  
        $s_id = $row_sec['section_id']; ?>
        
        <?php } 
        $ex_query = "select exam_id from exam where exam_id = $exam";
        $ex_res=mysqli_query($connection,$ex_query); 
        while($row_ex=mysqli_fetch_assoc($ex_res)){  
            $ex = $row_ex['exam_id']; ?>
          
            <?php }
            $class = $_GET['class'];
            $section = $_GET['section'];
            $st_query="select * from student where class_id = $class and section_id = $section";
            $st_result = mysqli_query($connection,$st_query);
            $num = mysqli_num_rows($st_result);
             $num; ?>
            <input type = "hidden" name = "number" value = "<?php echo $num; ?>" > <?php
            while($st_row=mysqli_fetch_assoc($st_result)){
              $G_total = 0;  
              $class = $_GET['class'];
              $subject = $_GET['subject'];
              $exam = $_GET['exam'];
              $st = $st_row['st_id'];
              $query1="SELECT sub_name from classwisesubject where class_id = $class";
              $result1=mysqli_query($connection, $query1);
              while($row1=mysqli_fetch_assoc($result1)){
                 $sub = $row1['sub_name'];
                 $query = "select th,pr from marklist where class = $class and section = $section and sub_id = $sub and st_id = $st ";
                 $result = mysqli_query($connection,$query);
                while($row=mysqli_fetch_assoc($result)){
                $th = $row['th'];
                $pr = $row['pr'];
                $total=$th + $pr;
                $total;
                }
              }   
                $query1="SELECT sub_name from classwisesubject where class_id = $class";
                $result1=mysqli_query($connection, $query1);
                while($row1=mysqli_fetch_assoc($result1)){
                $sub = $row1['sub_name'];
                $query = "select th, pr from marklist where class = $class and section = $section and sub_id = $sub and st_id = $st ";
                 $result = mysqli_query($connection,$query);
                  while($row=mysqli_fetch_assoc($result)){ 
                  $th = $row['th'];
                  $pr = $row['pr'];
                  $total=$th + $pr;
                  $G_total = $G_total + $total;      
                  }       
                }
                 $G_value = $G_total; 
                 echo $G_value; 
                 echo $st; ?>
                 <input type = "hidden" name = "st_id[]" value = "<?php echo $st; ?>" >
                 <input type = "hidden" name = "section[]" value = "<?php echo $s_id; ?>" >
                  <input type = "hidden" name = "class[]" value = "<?php echo $c_id; ?>" >
                 <input type = "hidden" name = "exam[]" value = "<?php echo $ex; ?>" >
                 <input type = "hidden" name = "g_value[]" value = "<?php echo $G_value; ?>" > <br>
                 <?php }  ?> 
                 <input type = "submit" class = "btn btn-primary"  name = "submit" value = "View laser" >
            </form>
