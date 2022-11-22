<?php
include("db.php");
include("qrscanner/phpqrcode/qrlib.php");

 if(!$_POST['name']||!$_POST['username']||!$_POST['email']||!$_POST['password']||!$_POST['mobile']){
 
    $response['message']='Please Fill in all Required Fields!';

 }

 else{
  
  $name=$_POST['name'];
  $username=$_POST['username'];
  $email=$_POST['email'];
  $password=base64_encode($_POST['password']);
  $mobile=$_POST['mobile'];
  $qrimg=$username.".png";

  $sql='SELECT * FROM `register` WHERE email = "'.$email.'"';
  $result=mysqli_query($conn,$sql);
  if(mysqli_num_rows($result)>0){
    $response['message']= "Email are already exists";
  }
  else{
    $sql1='SELECT * FROM `register` WHERE username = "'.$username.'"';
    $result1=mysqli_query($conn,$sql1);
    if(mysqli_num_rows($result1) >0){
        $response['message']= "username are already exists";
    }
    else{
        $sql2='SELECT * FROM `register` WHERE mobile_no = "'.$mobile.'"';
        $result2=mysqli_query($conn,$sql2);
        if(mysqli_num_rows($result2)>0){
            $response['message']= "mobile number are already exists";
        }
        else{


        $sql3='INSERT INTO `register`(`name`,`username`,`email`,`password`,`mobile_no`,`qrimg`) VALUES ("'.$name.'","'.$username.'","'.$email.'","'.$password.'","'.$mobile.'","'.$qrimg.'")';
        $result3=mysqli_query($conn,$sql3);
        

       if($result3){
               $sql4="SELECT * FROM register WHERE username = '$username'";
               $result4=mysqli_query($conn,$sql4);
               $row2=mysqli_fetch_assoc($result4);
               $tes=$row2['id'];
               $us=$row2['username'];
               $folder="im/";
               QRcode::png($tes,$folder.''.$us.'.png',QR_ECLEVEL_L,5);
          $response['message']="registration is  succesful";
          $response['username']="$username";
          $response['id']=$row2['id'];
          $response['success']=true;
          $path="http://localhost/nature/api/im/";
          $response['qr']=$path.$qrimg;
      }
      else{
          $response['message']="registration is failed";
          $response['false']=false;
      }
    }
    }
  }


 }


 echo json_encode($response);






?>