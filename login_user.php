<?php
include("connection.php");

if(isset($_POST["username"])&&($_POST["password"])){
    $user=$_POST["username"];
    $password=md5($_POST["password"]);
    $sql='select * from `users` where username = "'.$user.'" AND password = "'.$password.'"';
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    if($num>0){
        $row=mysqli_fetch_assoc($result);
        $response['message']="login succesful";
        $response['key']=$row['U-key'];
        $response['id']=$row['id'];
        $response['success']=true;
        $response['name']=$row['username'];
      
    
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