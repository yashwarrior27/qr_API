<?php
require ("db.php");

if(!$_REQUEST['name']||!$_REQUEST['username']||!$_REQUEST['email']||!$_REQUEST['password']||!$_REQUEST['mobile']){

    $response['message']='Please Fill in all Required Fields!';
}
else{
$name = $_REQUEST['name'];
$username = $_REQUEST['username'];
$email = $_REQUEST['email'];
$password = $_REQUEST['password'];
$mobile = $_REQUEST['mobile'];
if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $response['message']='please enter the valid email';
}
else {
$sql1='SELECT * FROM `register` WHERE email = "'.$email.'" OR username = "'.$username.'"';
$result1=mysqli_query($conn,$sql1);
if(mysqli_num_rows($result1)>0){
    $response['message']= "Email or username already exists";
}
if(strlen($password) > 8){
    $response['message']="password must 8 character or more";
}
if(!filter_var($mobile,FILTER_VALIDATE_INT)){
    $response['message']="enter the valid number";
}
else{
 
    $sql='INSERT INTO `register`(`name`,`username`,`email`,`password`,`mobile_no`) VALUES ("'.$name.'","'.$username.'","'.$email.'","'.$password.'","'.$mobile.'")';
  $result=mysqli_query($conn,$sql);
 if($result){
    $response['message']="registration is  succesful";
}
else{
    $response['message']="registration is failed";
}
}
}
}
echo json_encode($response);
?>