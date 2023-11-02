<?php
class DBController
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

 function insert($first_name,$middle_name,$last_name,$email,$password,$mobile,$gender)
 {
  date_default_timezone_set("Asia/Kolkata");
  $info=date_format(date_create(),"d F Y - h:i:s A - l");   
  $query="insert into user (user_id,first_name,middle_name,last_name,email,password,mobile,gender,role,status,info) values(NULL,'$first_name','$middle_name','$last_name','$email','$password','$mobile','$gender','user',1,'$info')";
  return mysqli_query($this->con,$query);
 }

 function signin($email,$password)
 {
  $query="select * from user where email='$email' && password='$password' && status=1";    
  return mysqli_query($this->con,$query);
 }

function fetch()
 {
  $query="select * from user where role='user'";    
  return mysqli_query($this->con,$query);
 }

 function fetchOne($email,$role)
 {
  $query="select * from user where email='$email' && role='$role'";    
  return mysqli_query($this->con,$query);
 }

 function updateStatus($email,$action)
 {   
  if($action=="active")   
   $query="update user set status=1 where email='$email'";
  else
   $query="update user set status=0 where email='$email'";     
  mysqli_query($this->con,$query);
  return mysqli_affected_rows($this->con);
 }

 function delete($email)
 {
  $query="delete from user where email='$email'";     
  mysqli_query($this->con,$query);
  return mysqli_affected_rows($this->con);
 }

 function update($first_name,$middle_name,$last_name,$email,$mobile,$alternate_mobile,$address1,$address2,$country,$state,$city,$gender,$pincode,$profile_icon_name)
 {
  $query="update user set first_name='$first_name',middle_name='$middle_name',last_name='$last_name',mobile='$mobile',alt_mobile='$alt_mobile',address1='$address1',address2='$address2',country='$country',state='$state',city='$city',gender='$gender',pincode='$pincode',profile_icon_name='$profile_icon_name' where email='$email'";    
  mysqli_query($this->con,$query);
  return mysqli_affected_rows($this->con);
 }



}
?>
