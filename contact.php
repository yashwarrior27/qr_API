<?php
include("db.php");

if(!$_POST['userid'])
{
    $response['message']="please enter user id";

}
else{
    $userid=$_POST['userid'];

    $sql2="SELECT * FROM ids WHERE user_id = $userid";
    $result=mysqli_query($conn,$sql2);
    if(!mysqli_num_rows($result)>0){
      
        $response['message']="There  was no contact list"; 
    }
else{

    $sql="SELECT * FROM ids JOIN register ON ids.scaned_id=register.id WHERE ids.user_id= $userid";
    $result= mysqli_query($conn,$sql);
    $response['success']=true;
    $response['message']="data fetch successfully";
    $a=[];
    while($row=mysqli_fetch_assoc($result)){
        $data['name']=$row['name'];
        $data['email']=$row['email'];
        $data['mobile_no']=$row['mobile_no'];
        array_push($a,$data);
    
    };
$response['data']=$a;
   
}
}
echo json_encode($response);
?>