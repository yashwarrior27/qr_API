<?php
include("connection.php");
 
if(isset($_POST['id'])&&$_POST['id']!=""){
 
    $id=$_POST['id'];
    $sql="DELETE FROM `temp` WHERE id=$id";
    $res=mysqli_query($conn,$sql);
    if($res){
        $response['message']="DELETE SUCCESSFULLY";
        $response['success']=true;
    }
    else{
        $response['message']="Something is wrong";
        $response['success']=false;
    }

}

else{

    $response['message']="please enter the ID";
    $response['success']=false;

}

echo json_encode($response);

?>