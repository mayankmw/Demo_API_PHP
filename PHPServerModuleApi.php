<?php

require('./DBControllerModule.php');

if(isset($_REQUEST["status"]) && $_REQUEST["status"]=="addmodule")
{
 extract($_POST);   
 $obj = new DBControllerModule();
 $result=$obj->insert($mdoule_title,$course_title,$module_details,$module_icon_name);
 if($result)
  $response=array("status_code"=>201,"status"=>true); 
 else
  $response=array("status_code"=>500,"status"=>false);
 
 echo json_encode($response); 
}

?>
