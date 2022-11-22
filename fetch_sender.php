<?php
include("connection.php");

if(isset($_POST['uid'])&&$_POST['uid']!=""){

    $uid=$_POST['uid'];
    $sql="SELECT * FROM `sender` WHERE `u_id`=$uid";
    $res=mysqli_query($conn,$sql);
    $r=mysqli_num_rows($res);
    if($r>0){
        $a=[];
        while($row=mysqli_fetch_assoc($res)){
            $data['id']=$row['id'];
            $data['s_id']=$row['s_id'];
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
    $response['message']="please enter the required ID.";
    $response['success']=false;
}

echo json_encode($response);


?>