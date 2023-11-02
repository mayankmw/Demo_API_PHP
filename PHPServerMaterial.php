<?php

require('./DBControlMaterial.php');

if(isset($_REQUEST["status"]) && $_REQUEST["status"]=="1" )
{
 extract($_POST);   
 $obj = new MaterialApi();
 $result=$obj->insert($course_title,$module_title,$material_title,$material_details);
  if($result)
  $response=array("status_code"=>201,"status"=>true); 
 else
  $response=array("status_code"=>500,"status"=>false);
 
 echo json_encode($response); 
}

// if(isset($_REQUEST["status"]) && $_REQUEST["status"]=="signin" )
// {
//  extract($_POST);   
//  $obj = new DBController();
//  $result=$obj->signin($email,$password);
//  $n=mysqli_num_rows($result);
 
//  if($n>0)
//  {
//   $row=mysqli_fetch_assoc($result);       
//   $str="abdcddefddg5dgtr5hithhktl0d12d345dmn56otrthdtu6789vwxyz";   
//   $str=str_shuffle($str);
//   $token=substr($str,3,25);

//   $row['status_code']=201;
//   $row['token']=$token;
//   $response=$row; 
//  }
//  else
//   $response=array("status_code"=>500,"token"=>"error");

//   echo json_encode($response);


// }



?>
