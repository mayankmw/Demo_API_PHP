<?php

require('./DBControllerCourse.php');

if(isset($_REQUEST["status"]) && $_REQUEST["status"]=="addcourse" )
{
 extract($_POST);   
 $obj = new DBControllerCourse();
 $result=$obj->insert($course_title,$age_group,$duration_period,$price,$effective_date,$about_course,$course_description,$introduction,$keywords,$course_icon_name);
 if($result)
  $response=array("status_code"=>201,"status"=>true); 
 else
  $response=array("status_code"=>500,"status"=>false);
 
 echo json_encode($response); 
}

if(isset($_REQUEST["status"]) && $_REQUEST["status"]=="fetch" )
{
 $obj = new DBControllerCourse();
 $result=$obj->fetch();
 $n=mysqli_num_rows($result);
 
 if($n>0)
 {
  $courseDetails=array(); 
  while($row=mysqli_fetch_assoc($result))       
  {
   array_push($courseDetails,$row);   
  }
  $response=array("status_code"=>201,"status"=>true,"courseDetails"=>$courseDetails);
 }
 else
  $response=array("status_code"=>500,"status"=>false);

  echo json_encode($response); 
}

if(isset($_REQUEST["status"]) && $_REQUEST["status"]=="managecoursestatus" )
{
 extract($_POST);
 $obj = new DBControllerCourse();
 if($action=="active" || $action=="inactive")
 {
  $n=$obj->updateStatus($course_id,$action);
  if($n>0)
   $response=array("status_code"=>201,"update_status"=>true);
  else
   $response=array("status_code"=>500,"update_status"=>false); 
 } 
 else
 {
   $n=$obj->delete($course_id);
   if($n>0)
    $response=array("status_code"=>201,"delete_status"=>true);
   else
    $response=array("status_code"=>500,"delete_status"=>false);
 } 
 echo json_encode($response);
}

if(isset($_REQUEST["status"]) && $_REQUEST["status"]=="fetchOne" )
{
 extract($_GET); 
 $obj = new DBControllerCourse();
 $result=$obj->fetchOne($course_id);
 $response=mysqli_num_rows($result);
 
 echo json_encode($response);
 }

if(isset($_REQUEST["status"]) && $_REQUEST["status"]=="update" )
{
 extract($_POST);   
 $obj = new DBControllerCourse();
 $n=$obj->update($course_title,$age_group,$duration_period,$price,$effective_date,$about_course,$course_description,$introduction,$keywords,$course_icon_name);
 if($n>0)
  $response=array("status_code"=>201,"status"=>true); 
 else
  $response=array("status_code"=>500,"status"=>false);
 
 echo json_encode($response); 
}

?>
