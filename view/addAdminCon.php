<?php


function addAdmin($post){

$db=mysqli_connect("localhost","root","root","west-pub");


$name=$post["name"];
$surname=$post["surname"];
$phone=$post["phone"];
$lawazim=$post["level"];
$login=$post["login"];
$password=$post["password"];
$date=date('Y-m-d');
$time=date('H:m');

$sql_ad="SELECT * FROM `workers` WHERE `phone`='$phone' or `login`='$login' or `password`='$password' ";
$response=mysqli_query($db,$sql_ad);
for($admins = []; $v=$response->fetch_assoc();$admins[]=$v);

if (empty($admins)) {
    $new_admin="INSERT INTO `workers`(`name`,`surname`,`phone`,`level`,`date`,`time`,`login`,`password`)  VALUES('$name','$surname','$phone','$lawazim','$date','$time','$login','$password' )";
    mysqli_query($db,$new_admin);
    header("Location: allAdmin.php");
    ?>
<p style=" color:blue">Bazaga qosildi</p>
    <?php
}else{
    ?>
   <p style="color:red;"><i> Magliwmat qaytalangan ! </i></p> 
    <?php
}


}









?>