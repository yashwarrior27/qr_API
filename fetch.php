<?php
include("db.php");

if(!$_POST['id']){
    $response['message']="please enter the id";
}
else{
$id=$_POST['id'];
$sql="SELECT * FROM register WHERE id = $id";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);

$response['name']=$row['name'];
$response['username']=$row['username'];
$response['email']=$row['email'];
$response['mobile']=$row['mobile_no'];

}

echo json_encode($response);

?>