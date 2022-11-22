<?php
include("db.php");
$sql="select * from slide_header";
$result=mysqli_query($conn,$sql);

while($row=mysqli_fetch_assoc($result)){

echo json_encode($row)."\n";
}
?>

<!-- function RandomString()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randstring = '';
        for ($i = 0; $i < 10; $i++) {
            $randstring =$randstring.$characters[rand(0, strlen($characters)-1)];
        }
        return $randstring;
    } -->
    <!-- // $token= substr($mobile,5).RandomString(); -->