<?php
include("db.php");
if(!$_POST['userid']&& !$_POST['scanedid']){
    $response['message']="please enter ids";
}
else{
 
    $userid=$_POST['userid'];
    $scanedid=$_POST['scanedid'];

    $sql1="SELECT * FROM ids  WHERE user_id=$userid AND scaned_id=$scanedid";
    $result1=mysqli_query($conn,$sql1);
    if(!mysqli_num_rows($result1)>0){
        $response['message']="there were no records";
    }
    
    else{

    $sql="DELETE FROM ids WHERE user_id=$userid AND scaned_id=$scanedid";
    $result=mysqli_query($conn,$sql);
    if($result){
        $response['message']="delete succesfully";
        $response['success']=true;
    }
    else{
        $response['message']="delete failed";
        $response['success']=false;
    }

}
}
echo json_encode($response);
?>