<?php
class DBControllerModule
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

 function insert($mdoule_title,$course_title,$module_details,$module_icon_name)
 {   
  $query="insert into module (module_id,module_title,course_title,module_details,module_icon_name,status) values(NULL,'$module_title','$course_title','$module_details','$module_icon_name',1)";
  return mysqli_query($this->con,$query);
 }
}
?>
