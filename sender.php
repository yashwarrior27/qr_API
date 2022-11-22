<?php
include("connection.php");
if(isset($_POST['sid'])&&($_POST['uid'])){
$sid=$_POST['sid'];
$uid=$_POST['uid'];
$sql="INSERT INTO `sender`( `s_id`, `u_id`) VALUES ('$sid','$uid')";
$res=mysqli_query($conn,$sql);
if($res){
    $response['message']="Record added successfully.";
    $response['success']=true;
}
else{
    $response['message']="Something is Wrong. ";
    $response['success']=false;
}
}
else{
    $response['message']="please enter required IDs.";
    $response['success']=false;
}

echo json_encode($response);
?>