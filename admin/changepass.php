<?php


session_start();
include 'auth.php';
$re = mysqli_query($dbhandle,"select * from user where username = '".$_SESSION['username']."'  " );
echo mysqli_error($dbhandle);
if(mysqli_num_rows($re) > 0)
{

} 
else
{

session_destroy();
header("location: index.php");
}


$oldpass=md5($_POST['currentPassword']);
$useremail=$_SESSION['username'];
$newpassword=md5($_POST['newPassword']);
$sql=mysqli_query($dbhandle,"SELECT password FROM user where password='$oldpass' && username='$useremail'");
$num=mysqli_fetch_array($sql);
if($num>0)
{
$dbhandle=mysqli_query($dbhandle,"UPDATE user SET user.password='$newpassword' where user.username='$useremail'");
header('location:user_profile.php?sucess=1');

}
else
{
    header('location:user_profile.php?failed=1');

}


  




?>