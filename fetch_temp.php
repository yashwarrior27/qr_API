<?php
include("connection.php");
if(isset($_POST['uid'])&&$_POST['uid']!=""){
    $uid=$_POST['uid'];
    $sql="SELECT * FROM `temp` WHERE `u_id`=$uid";
    $res=mysqli_query($conn,$sql);
    if(mysqli_num_rows($res)>0){
        $a=[];
        while($row=mysqli_fetch_assoc($res)){
            $data['id']=$row['id'];
            $data['T_id']=$row['T_id'];
            $data['name']=$row['name'];
            $data['u_id']=$row['u_id'];
            array_push($a,$data);
        }
        $response['success']=true;
        $response['data']=$a;
    }
   

    else{
        $response['message']="No data found.";
    $response['success']=false;
    }

}
else{
    $response['message']="please enter the required data.";
    $response['success']=false;
}

echo json_encode($response);


?>