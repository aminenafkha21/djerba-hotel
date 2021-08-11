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
$id = $_GET['booking'];

$sql = "DELETE FROM booking WHERE booking_id=".$id."";
$result = mysqli_query($dbhandle,$sql);
$sql = "DELETE FROM roombook WHERE booking_id=".$id."";
$result = mysqli_query($dbhandle,$sql);

header('Refresh: 3;url='.$_SERVER['HTTP_REFERER']."");

?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Deleting...</title>
  <link rel="stylesheet" href="assets/css/loading.css">
  <!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css"
  rel="stylesheet"
/>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"
></script></head>
<body>




<div align="center" class="fond">
  <div class="contener_general">
      <div class="contener_mixte"><div class="ballcolor ball_1">&nbsp;</div></div>
      <div class="contener_mixte"><div class="ballcolor ball_2">&nbsp;</div></div>
      <div class="contener_mixte"><div class="ballcolor ball_3">&nbsp;</div></div>
      <div class="contener_mixte"><div class="ballcolor ball_4">&nbsp;</div></div>
  </div>
  
  <div style="padding-top:35px;">
  <div style=" color:#999999; font-weight:300; font-size:30px; font-family:'Roboto';padding-top:20px;"> Delete Success. Please wait few seconds for redirection...</div>
        <a href="" style="text-decoration:none;" target="parent"><div style="  color:#999999; font-weight:300; font-size:20px; font-family:'Roboto';">Djerba-Hotel</div>
          </div>
</div>

</body>
</html>


