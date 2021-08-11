
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

$to      = $_POST['to'];
$subject = $_POST['subject'];
$message ="<html><body>";
$message .$_POST['textadmin'];
$message .="</body></html>";
$headers  ="From: aminenafkha21@gmail.com";
$headers .= "Cc:afgh@somedomain.com \r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html\r\n";

if (mail($to, $subject, $message, $headers)) {
    echo "Mail Sent.";
    header('location:email_compose.php') ;
}
else {
    echo "failed";
}


?>