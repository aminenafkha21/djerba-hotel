<?php
session_start();
include "auth.php" ;

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
$_SESSION['total_amount'] = 0;

        if(!isset($_SESSION['room_id'])){
                                
            $_SESSION['room_id'] = array();
            
            $_SESSION['roomname'] = array();
            
            $_SESSION['roomqty'] = array();
            $_SESSION['total_amount'] = 0 ;
        }

        
            $result = mysqli_query($dbhandle,"select * from room");
            if(mysqli_num_rows($result) > 0){


                $count = 0;
                
                while($row = mysqli_fetch_array($result)){
                
                    if (isset($_POST["qtyroom".$row['room_id'].""])   && !empty($_POST["qtyroom".$row['room_id'].""]) )
                    { 
                        $_SESSION['room_id'][$count] = $_POST["selectedroom".$row['room_id'].""];
                        $_SESSION['roomqty'][$count] = $_POST["qtyroom".$row['room_id'].""];
                        $_SESSION['roomname'][$count] = $_POST["room_name".$row['room_id'].""];
                         $_SESSION['total_amount'] =  ( $row['rate']  * $_POST["qtyroom".$row['room_id'].""] * intval($_SESSION['total_night']) ) + $_SESSION['total_amount'] ;
                        $count = $count + 1;
                    }
                }
                                    

            }


  
            if(isset($_POST["firstname"]) ) {
                $_SESSION['firstname'] = $_POST["firstname"];

            }
            if(isset($_POST["lastname"]) ) {
                $_SESSION['lastname'] = $_POST["lastname"];

            }
            if(isset($_POST["email"]) ) {
                $_SESSION['email'] = $_POST["email"];

            }
            if(isset($_POST["phone"]) ) {
                $_SESSION['phone'] = $_POST["phone"];

                
            }
            if(isset($_POST["addressline1"]) ) {
                $_SESSION['addressline1'] = $_POST["addressline1"];

            }
            if(isset($_POST["postcode"]) ) {
                $_SESSION['postcode'] = $_POST["postcode"];

            }
            if(isset($_POST["city"]) ) {
                $_SESSION['city'] = $_POST["city"];

            }
            if(isset($_POST["state"]) ) {
                $_SESSION['state'] = $_POST["state"];

            }
            if(isset($_POST["country"]) ) {
                $_SESSION['country'] = $_POST["country"];

            }



if(isset($_POST["addressline2"]))
{
$_SESSION['addressline2'] = $_POST["addressline2"];
}else{

$_SESSION['addressline2'] = "";
}
if(isset($_POST["specialrequirements"]))
{
$_SESSION['special_requirement'] = $_POST["specialrequirements"];
}else{

$_SESSION['special_requirement'] = "";
}

$sql1=0;$sql2=0;
$sql1=mysqli_query($dbhandle,"INSERT INTO booking (booking_id, total_adult, total_children, checkin_date, checkout_date, special_requirement, payment_status, total_amount, first_name, last_name, email, telephone_no, add_line1, add_line2, city,state, postcode, country) 
VALUES (NULL, '".$_SESSION['adults']."' , '".$_SESSION['childrens']."', '".$_SESSION['checkin_db']."', '".$_SESSION['checkout_db']."', '".$_SESSION['special_requirement']."', 'pending', '".$_SESSION['total_amount']."', '".$_SESSION['firstname']."', '".$_SESSION['lastname']."', '".$_SESSION['email']."', '".$_SESSION['phone']."', '".$_SESSION['addressline1']."', '".$_SESSION['addressline2']."', '".$_SESSION['city']."', '".$_SESSION['state']."', '".$_SESSION['postcode']."', '".$_SESSION['country']."')");
echo mysqli_error($dbhandle);
$_SESSION['booking_id'] = mysqli_insert_id($dbhandle);
$countt = 0;
foreach ($_SESSION['room_id'] as &$value0   ) {
            if( $_SESSION['roomqty'][$countt] == null ) {
                unset($_SESSION['roomqty'][$countt]) ;

            }

$countt = $countt+1;
} ;
$count = 0;
foreach ($_SESSION['room_id'] as &$value0   ) {
     
$sql2=mysqli_query($dbhandle,"INSERT INTO roombook (booking_id, room_id, totalroombook, id) VALUES ('".$_SESSION['booking_id']."', '".$value0."', '".$_SESSION['roomqty'][$count]."', NULL);");

$count = $count+1;
} ;




if( $sql1 && $sql2) {
    header('Refresh: 3;url=view_booking.php');
    ?>
    <!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Titre de la page</title>
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
  <div style=" color:#999999; font-weight:300; font-size:30px; font-family:'Roboto';padding-top:20px;"> Success. Please wait few seconds for redirection...   </div>
        <a href="" style="text-decoration:none;" target="parent"><div style="  color:#999999; font-weight:300; font-size:20px; font-family:'Roboto';">Djerba-Hotel</div>
          </div>
</div>

</body>
</html>


<?php

}
else{
    header('Refresh: 3;url=checkavab.php');
    ?>
    <!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Titre de la page</title>
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
  <div style=" color:#999999; font-weight:300; font-size:30px; font-family:'Roboto';padding-top:20px;"> <span Style="color:red"> Failed. </span> Please wait few seconds for redirection...</div>
        <a href="" style="text-decoration:none;" target="parent"><div style="  color:#999999; font-weight:300; font-size:20px; font-family:'Roboto';">Djerba-Hotel</div>
          </div>
</div>

</body>
</html>
<?php
}



?>