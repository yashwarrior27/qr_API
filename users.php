<?php
include("connection.php");
if(isset($_POST['key'])&&$_POST['key']!=""){
 $name=$_POST['name'];
 $pass=md5($_POST['pass']);
    $key=$_POST['key'];
 $vsql="SELECT * FROM `users` WHERE `U-key`='$key'";
    $vres=mysqli_query($conn,$vsql);
    if(mysqli_num_rows($vres)>0){
        $response['message']="key already exist";
        $response['success']=false;
    }
    else{
        $usql="SELECT * FROM `users` WHERE `username`='$name'";
        $ures=mysqli_query($conn,$usql);
        if(mysqli_num_rows($ures)>0){
            $response['message']="username already exist";
        $response['success']=false;
        }
        else{

            $sql="INSERT INTO `users`( `U-key`,`username`,`password`) VALUES ('$key','$name','$pass')";
            $result=mysqli_query($conn,$sql);
             if($result){
                $fsql="SELECT * FROM `users` WHERE `U-key`='$key'";
                $fres=mysqli_query($conn,$fsql);
                $frow=mysqli_fetch_assoc($fres);
                $response['message']="key added successfully";
                $response['id']=$frow['id'];
                $response['key']=$frow['U-key'];
                $response['username']=$frow['username'];          
                $response['success']=true;
            }
            else{
                $response['message']="something is wrong";
                $response['success']=false;
            }
        }
       
    }

}
else{
    $response['message']="please enter the key";
    $response['success']=false;
}

echo json_encode($response);
?>

