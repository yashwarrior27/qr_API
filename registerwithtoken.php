<?php
include("con2.php");


if(isset($_POST['name'])&&($_POST['mobile'])&&($_POST['pass'])&&($_POST['location'])){
    $name=$_POST['name'];
    $mobile=$_POST['mobile'];
    $pass=$_POST['pass'];
    $location=$_POST['location'];
    
    $vsql="SELECT * FROM `register` WHERE mobile=$mobile";
    $vres=mysqli_query($conn,$vsql);
    if(mysqli_num_rows($vres)>0){
        $response['message']="Number already exist";
        $response['success']=false;
    }
    else{
        $isql="INSERT INTO `register`(`name`, `mobile`, `password`, `location`) VALUES ('$name','$mobile','$pass','$location')";
        $ires=mysqli_query($conn,$isql);
        if($ires){
    
            $token=md5($mobile).time();
            $tsql="UPDATE `register` SET `token`='$token' WHERE mobile = $mobile";
            $tres=mysqli_query($conn,$tsql);
            if($tres){
                $response['message']="Record added successfully";
                $response['success']=true;
                $response['token']=$token;
            }
            else{
                $response['message']="token can't generated";
                $response['success']=false;
            }
        }
        else{
            $response['message']="Something is wrong";
            $response['success']=false;
        }
    }

    

}
else{
    $response['message']="please enter the required fields";
    $response['success']=false;
}

   echo json_encode($response);
   
    ?>
