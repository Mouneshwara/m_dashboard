<?php
include_once "config.php";
$email=$_POST['Email'];
$sql="select count(*) as count from mst_employee where Email='$email' ";
$res=mysqli_query($con,$sql);

while($row = mysqli_fetch_array($res))
 {
   $count=$row['count'];
 }
if($count>0)
$msg="Email Already Exists please enter new one";
else $msg="";
echo $msg;
?>