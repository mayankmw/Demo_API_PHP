<?php
class DBControllerCourse
{
 private $con;

 function __construct()
 {
  $db_host="localhost";
  $db_username="root";
  $db_password="";
  $db_name="Capstone";
  $this->con=mysqli_connect($db_host,$db_username,$db_password,$db_name) or die("<h1>Problem in db connection....</h1>");
 }

 function insert($course_title,$age_group,$duration_period,$price,$effective_date,$about_course,$course_description,$introduction,$keywords,$course_icon_name)
 {
  date_default_timezone_set("Asia/Kolkata");
  $info=date_format(date_create(),"d F Y - h:i:s A - l");   
  $query="insert into course (course_id,course_title,age_group,duration_period,price,effective_date,about_course,course_description,introduction,keywords,course_icon_name,status,info) values(NULL,'$course_title','$age_group','$duration_period','$price','$effective_date','$about_course','$course_description','$introduction','$keywords','$course_icon_name',1,'$info')";
  return mysqli_query($this->con,$query);
 }

 function fetch()
 {
  $query="select * from course";    
  return mysqli_query($this->con,$query);
 }

function fetchOne($course_id)
 {
  $query="select * from course where course_id='$course_id'";    
  return mysqli_query($this->con,$query);
 }

 function updateStatus($course_id,$action)
 {   
  if($action=="active")   
   $query="update course set status=1 where course_id='$course_id'";
  else
   $query="update course set status=0 where course_id='$course_id'";     
  mysqli_query($this->con,$query);
  return mysqli_affected_rows($this->con);
 }


 function update($course_title,$age_group,$duration_period,$price,$effective_date,$about_course,$course_description,$introduction,$keywords,$course_icon_name)
 {
  $query="update course set course_title='$course_title',age_group='$age_group',duration_period='$duration_period',about_course='$about_course',course_description='$course_description',introduction='$introduction',keywords='$keywords',course_icon_name='$course_icon_name' where course_id='$course_id'";    
  mysqli_query($this->con,$query);
  return mysqli_affected_rows($this->con);
 }
}
?>
