<?php
session_start();
include 'auth.php';
$re = mysqli_query($dbhandle,"select * from user where username = '".$_SESSION['username']."' " );
echo mysqli_error($dbhandle);
if(mysqli_num_rows($re) > 0)
{

} 
else
{

session_destroy();
header("location: index.php");
}
include "auth.php" ;
$id=$_GET['id'] ;
                    $sql = "UPDATE booking SET payment_status = 'pending' WHERE booking.booking_id=".$id."";
                    if(mysqli_query($dbhandle,$sql) ) {
                    header('location:dashboard.php') ;
                    }
                    else {
                            echo "ddddddddm" ;
                        }
                    
      

  ?>