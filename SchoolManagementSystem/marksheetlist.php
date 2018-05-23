<?php include("header.php"); ?>
<?php include("navadmin.php"); ?>
<?php include("db.php"); ?>
<div class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3" style="position: absolute;margin-top:50px;">
<h2><button class="btn btn-primary"> MARKSHEET ENTRY </button></h2>
<?php
  $class = $_GET['class'];
  $exam = $_GET['exam'];
  $sec = $_GET['section'];
  $class_query = "select class_name from class where class_id = $class";
  $class_res=mysqli_query($connection,$class_query); 
  
  while($row_class=mysqli_fetch_assoc($class_res))
  {  
    echo '<p style ="font-weight: bold;">'. 'Class Name: ' .$row_class['class_name']. '</p>';
       }
    $sec_query = "select section_name from section where section_id = $sec";
    $sec_res=mysqli_query($connection,$sec_query); 
    while($row_sec=mysqli_fetch_assoc($sec_res)){  
        echo '<p style ="font-weight: bold;">'. 'Section: ' .$row_sec['section_name']. '</p>';
        } 
        $ex_query = "select exam_type from exam where exam_id = $exam";
        $ex_res=mysqli_query($connection,$ex_query); 
        while($row_ex=mysqli_fetch_assoc($ex_res)){  
        echo '<p style ="font-weight: bold;">'. 'Exam: ' .$row_ex['exam_type']. '</p>';
        }?>  
        <div class="table-responsive">
        <table class="table">
        <thead>
          <tr>
          <th rowspan="2">Student Name</th>
           <?php
           include("db.php");
           $class = $_GET['class'];
           $query="SELECT c.sub_name,s.sub_name from classwisesubject c inner join subject s on s.sub_id = c.sub_name where class_id = $class ";
           $result=mysqli_query($connection, $query);
           while($row=mysqli_fetch_assoc($result)){
           echo '<th colspan="3" >' .$row['sub_name']. '</th>';
           } ?> 
           <th rowspan="2">Grand Total</th>
           <th rowspan="2">Percentage</th> 
           <th rowspan="2">Rank</th> 
          </tr>
          <tr>
            <?php 
            $class = $_GET['class'];
           $query="SELECT sub_name from classwisesubject where class_id = $class ";
           $result=mysqli_query($connection, $query);
           while($row=mysqli_fetch_assoc($result)){ ?>
          <th scope="col" style = "float:center; ">Theory [F.M:60 P.M:24] </th>
          <th scope="col" style = "float:center;">Practical [F.M:40 P.M:16] </th>
          <th scope="col" style = "float:center;">Total [F.M:100 P.M:40] </th>
          <?php } ?>
          </tr>
        </thead>
        <tbody>
       
        <?php
        $class = $_GET['class'];
        $section = $_GET['section'];
        $st_query="select * from student where class_id = $class and section_id = $section";
        $st_result = mysqli_query($connection,$st_query);
        while($st_row=mysqli_fetch_assoc($st_result)){
           $G_total = 0;
        echo '<tr>';
        echo '<td>' .$st_row['fname'].' ' .$st_row['lname'].'</td>';   $st = $st_row['st_id'];
              $class = $_GET['class'];
              $exam = $_GET['exam'];
              $query1="SELECT sub_name from classwisesubject where class_id = $class";
              $result1=mysqli_query($connection, $query1);
              while($row1=mysqli_fetch_assoc($result1)){
                 $sub = $row1['sub_name'];
                $query = "select th,pr from marklist where class = $class and section = $section and sub_id = $sub and st_id = $st ";
                $result = mysqli_query($connection,$query);
               while($row=mysqli_fetch_assoc($result)){ 
                echo '<td>' .$row['th'].' </td>';
                echo '<td>' .$row['pr'].' </td>';
                $th = $row['th'];
                $pr = $row['pr'];
                $total=$th + $pr;
                echo '<td>' .$total. '</td>';
               }
              }   
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
                $G_total = $G_total + $total;      
                }       
               }
                echo '<td>' .$G_total. '</td>';
                $perc = $G_total*100/300; 
                echo '<td>'. $perc .'</td>';
                $query2 = "SELECT  grand_total, FIND_IN_SET( grand_total, (
                  SELECT GROUP_CONCAT( grand_total
                  ORDER BY grand_total DESC ) 
                  FROM markstotal )
                  ) AS rank
                  FROM markstotal  where st_id = $st and class = $class and section = $section and exam = $exam";
                $result2 = mysqli_query($connection,$query2);
                while($row2=mysqli_fetch_assoc($result2)){
                  echo '<td>'. $row2['rank'] .'</td>';
              }
                } 
              

            echo '</tr>';
         ?>
       
       </tbody>
