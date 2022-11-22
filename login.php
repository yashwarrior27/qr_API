<?php
require ("db.php");

if(isset($_POST["username"])&&($_POST["password"])){
    $user=$_POST["username"];
    $password=base64_encode($_POST["password"]);
    $sql='select * from `register` where username = "'.$user.'" AND password = "'.$password.'"';
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    if($num>0){
        $row=mysqli_fetch_assoc($result);
        $response['message']="login succesful";
        $response['id']=$row['id'];
        $response['success']=true;
        $path="http://localhost/nature/api/im/";
        $response['qr']=$path.$row['qrimg'];
        
    
    }
    else{
        $response['message']= "username or password  is invalid" ;
        $response['success']=false;
        }

}
else{
    $response['message']= "username and password is required";
}
echo json_encode($response);
?>