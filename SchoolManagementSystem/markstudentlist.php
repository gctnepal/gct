<?php include("header.php"); ?>
<?php include("navadmin.php"); ?>
<div class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3" style="position: absolute;margin-top:50px;">
<center><h2><button class="btn btn-primary">LIST OF MARKSHEET</button></h2></center>
        <div class="table-responsive">
        <table class="table table-striped">
        <thead>
        <tr>
        <th>Student Name</th>
        <th>Class</th>
        <th>Section</th>
        <th>Exam</th>
        <th>Subject</th>
        <th>Full Mark</th>
        <th>Pass Mark</th>
        <th>Obtained Mark</th>
        </tr>
        </thead>
    <tbody>
    <?php
    include("db.php");
    $class= $_GET['class'];
    $section= $_GET['section'];
    $query="SELECT m.entry_id,m.f_m,m.p_m,m.o_m,s.fname,s.lname,c.class_name,a.section_name,e.exam_type,s1.sub_name from markentry m inner join student s on s.st_id = m.student inner join class c on c.class_name = m.class inner join section a on a.section_name = m.section inner join exam e on e.exam_id=m.exam inner join classwisesubject s1 on s1.cs_id = m.subject WHERE c.class_id = $class and a.section_id = $section ";
    $result=mysqli_query($connection, $query);

  while($row=mysqli_fetch_assoc($result)){
    echo '<tr>';
    echo '<td>'.$row['fname'].' '.$row['lname'].'</td>';
    echo '<td>'.$row['class_name'].'</td>';
    echo '<td>'.$row['section_name'].'</td>';
    echo '<td>'.$row['exam_type'].'</td>';
    echo '<td>'.$row['sub_name'].'</td>';
    echo '<td>'.$row['f_m'].'</td>';
    echo '<td>'.$row['p_m'].'</td>';
    echo '<td>'.$row['o_m'].'</td>';
    echo '</tr>';
  }
  ?>
</tbody>
</table>
<?php include("footer.php"); ?>