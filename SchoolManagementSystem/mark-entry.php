       <?php
      include("db.php");
      if(isset($_POST['submit']))
      {
      $no = $_POST['number'];
      for($i=0;$i<$no;$i++){
        $query = "select st_id,th,pr from marklist where sub_id = '".$_POST['sub'][$i]."' and class = '".$_POST['class'][$i]."' and section = '".$_POST['section'][$i]."' ";
        $value = mysqli_num_rows(mysqli_query($connection, $query));
         if($value==0){
          for($i=0;$i<$no;$i++){
           $sql = "INSERT INTO marklist(st_id,sub_id,th,pr,class,section,exam) values('".$_POST['st_id'][$i]."','".$_POST['sub'][$i]."','".$_POST['thmark'][$i]."','".$_POST['prmark'][$i]."','".$_POST['class'][$i]."','".$_POST['section'][$i]."','".$_POST['exam'][$i]."')";
         $insertionResult=mysqli_query($connection,$sql) or die("Something went wrong"); 
            }
          }
        else{
         $a = $_POST['thmark'][$i];
          $b = $_POST['prmark'][$i];
          $c= $_POST['st_id'][$i];  
         $sql = "UPDATE marklist SET th = '$a', pr ='$b' WHERE sub_id = '".$_POST['sub'][$i]."' and st_id = $c";
         $insertionResult=mysqli_query($connection,$sql) or die("Something went wrong");
         }
        }
      }
      ?>
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
        while($row_class=mysqli_fetch_assoc($class_res)){  
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
       <form data-toggle="validator" role="form" method ="post" class="needs-validation" novalidate>  
        <div class="table-responsive">
        <table class="table">
        <thead>
          <tr>
          <th rowspan="2">Student Name</th>
           <?php
           include("db.php");
           $class = $_GET['class'];
           $subject = $_GET['subject'];
           $query="select sub_id,sub_name from subject where sub_id = $subject ";
           $result=mysqli_query($connection, $query);

           while($row=mysqli_fetch_assoc($result)){
           echo '<th colspan="2" >' .$row['sub_name']. '</th>';
           } ?>
             
          </tr>
          <tr>
          <th scope="col" style = "float:center; ">Theory [F.M:60 P.M:24] </th>
          <th scope="col" style = "float:center;">Practical [F.M:40 P.M:16] </th>
          </tr>
        </thead>
        <tbody>
        <?php
        include("db.php");
        $class= $_GET['class'];
        $section= $_GET['section'];
        $query="select st_id,fname,lname from student where class_id = $class and section_id = $section ";
        $result=mysqli_query($connection, $query);
        $num_res = mysqli_num_rows($result);
         ?>
        <input type="hidden" name="number" value = "<?php echo $num_res;  ?>" > 
        <?php
        while($row=mysqli_fetch_assoc($result)){
        echo '<tr>';   
        echo '<td>'.$row['fname'].' '.$row['lname']. '</td>';
        $st = $row['st_id'];
        echo '<input type="hidden" name="st_id[]" value = "'.$st.'" >';
        include("markscheck.php"); 
        $sub = $_GET['subject'];
        $exam = $_GET['exam'];
        $class = $_GET['class'];
        $section = $_GET['section']; 
        echo '<td>'.'<input type="hidden" name="sub[]" value = "' .$sub.'" >'. '</td>';
        echo '<td>'.'<input type="hidden" name="exam[]" value = "'.$exam.'" >'. 
          '<input type="hidden" name="class[]" value = "'.$class.'">'. 
          '<input type="hidden" name="section[]" value = "'.$section.'" >'.' </td>';
        echo '</tr>'; 
         ?>
         <?php } ?>
        </tbody>
        </table>
        <div class="form-group col-sm-10">
            <input type="submit" name="submit" class=" btn btn-primary" value= "Save">
          </div>
         </form>
       </div>
     <?php include("footer.php"); ?>
