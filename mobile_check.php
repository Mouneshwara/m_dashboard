<?php
//include_once 'Connection.php';
$mobile=$_POST['Mobile_Number'];
$sql="select count(*) as count from mst_employee where MobileNumber='$mobile' ";
$res=mysqli_query($con,$sql);
while($row = mysqli_fetch_array($res))
{
  $count=$row['count'];
}
if($count>0)
  $msg="mobile number Already Exists please enter new one";
else $msg="";
echo $msg;