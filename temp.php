<?php
include("connection.php");
if(isset($_POST['tid'])&&($_POST['uid'])&&($_POST['name'])){
$tid=$_POST['tid'];
$name=$_POST['name'];
$uid=$_POST['uid'];
$sql="INSERT INTO `temp`(`T_id`, `name`, `u_id`) VALUES ('$tid','$name','$uid')";
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
    $response['message']="please enter the required data.";
    $response['success']=false;
}

echo json_encode($response);
?>