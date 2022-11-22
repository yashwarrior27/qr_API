<?php
include("db.php");
if(!isset($_POST['userid'])&&($_POST['scanedid'])){
     $response['message']="please enter the id";
}
else{
    $userid=$_POST['userid'];
    $scaned=$_POST['scanedid'];

    $sql2="SELECT * FROM ids WHERE user_id = $userid AND scaned_id = $scaned";
    $result2=mysqli_query($conn,$sql2);
    if(mysqli_num_rows($result2)>0){
        $response['message']="user already scanned";
    }
    else{

    $sql="INSERT INTO `ids` (`user_id`,`scaned_id`) VALUES($userid,$scaned)";
    $result=mysqli_query($conn,$sql);
    if($result){
        $response['message']="id inserted successfully";
        $response['success']=true;
    }
    else{
        $response['message']="failed";
        $response['success']=false;
              
    }
}

}
echo json_encode($response);
?>