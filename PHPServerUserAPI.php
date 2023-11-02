<?php

require('./DBController.php');

if(isset($_REQUEST["status"]) && $_REQUEST["status"]=="update" )
{
 extract($_POST);   
 $obj = new DBController();
 $n=$obj->update($first_name,$middle_name,$last_name,$email,$mobile,$alt_mobile,$address1,$address2,$country,$state,$city,$gender,$pincode,$profile_icon_name);
 if($n>0)
  $response=array("status_code"=>201,"status"=>true); 
 else
  $response=array("status_code"=>500,"status"=>false);
 
 echo json_encode($response); 
}

if(isset($_REQUEST["status"]) && $_REQUEST["status"]=="manageuserstatus" )
{
 extract($_POST);
 $obj = new DBController();
 if($action=="active" || $action=="inactive")
 {
  $n=$obj->updateStatus($email,$action);
  if($n>0)
   $response=array("status_code"=>201,"update_status"=>true);
  else
   $response=array("status_code"=>500,"update_status"=>false); 
 } 
 else
 {
   $n=$obj->delete($email);
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
 $obj = new DBController();
 $result=$obj->fetchOne($email,$role);
 $n=mysqli_num_rows($result);
 
 if($n>0)
 {
  $row=mysqli_fetch_assoc($result);       
  $response=array("status_code"=>201,"status"=>true,"userDetails"=>$row);
 }
 else
  $response=array("status_code"=>500,"status"=>false);

  echo json_encode($response); 
}

if(isset($_REQUEST["status"]) && $_REQUEST["status"]=="fetch" )
{
 $obj = new DBController();
 $result=$obj->fetch();
 $n=mysqli_num_rows($result);
 
 if($n>0)
 {
  $userDetails=array(); 
  while($row=mysqli_fetch_assoc($result))       
  {
   array_push($userDetails,$row);   
  }
  $response=array("status_code"=>201,"status"=>true,"userDetails"=>$userDetails);
 }
 else
  $response=array("status_code"=>500,"status"=>false);

  echo json_encode($response); 
}


if(isset($_REQUEST["status"]) && $_REQUEST["status"]=="signup" )
{
 extract($_POST);   
 $obj = new DBController();
 $result=$obj->insert($first_name,$middle_name,$last_name,$email,$password,$mobile,$gender);
 if($result)
  $response=array("status_code"=>201,"status"=>true); 
 else
  $response=array("status_code"=>500,"status"=>false);
 
 echo json_encode($response); 
}

if(isset($_REQUEST["status"]) && $_REQUEST["status"]=="signin" )
{
 extract($_POST);   
 $obj = new DBController();
 $result=$obj->signin($email,$password);
 $n=mysqli_num_rows($result);
 
 if($n>0)
 {
  $row=mysqli_fetch_assoc($result);       
  $str="abdcddefddg5dgtr5hithhktl0d12d345dmn56otrthdtu6789vwxyz";   
  $str=str_shuffle($str);
  $token=substr($str,3,25);

  $row['status_code']=201;
  $row['token']=$token;
  $response=$row; 
 }
 else
  $response=array("status_code"=>500,"token"=>"error");

  echo json_encode($response);


}



?>
