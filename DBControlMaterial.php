<?php
class MaterialApi
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

 function insert($course_title,$module_title,$material_title,$material_details)
 {
     
  $query="insert into materials (material_id,course_title,module_title,material_title,material_details) 
  values(Null,'$course_title','$module_title','$material_title','$material_details')";
  return mysqli_query($this->con,$query);
 }


}
?>
