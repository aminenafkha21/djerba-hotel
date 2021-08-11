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

	$sql2 = "UPDATE booking
	SET payment_status='".$_POST['paymentstatus']."', first_name='".$_POST['firstname']."', 
    last_name='".$_POST['lastname']."', email ='".$_POST['email']."', 
    telephone_no ='".$_POST['telephone']."', city='".$_POST['city']."', 
    total_adult='".$_POST['adults']."', total_children='".$_POST['childrens']."', 
    postcode='".$_POST['postcode']."', state='".$_POST['state']."',
     country='".$_POST['country']."',
     add_line1='".$_POST['add_line1']."',add_line2='".$_POST['add_line2']."',
     special_requirement='".$_POST['req']."'
	WHERE booking_id=".$_GET['booking'].";" ;
	$result2 = mysqli_query($dbhandle,$sql2);

    header("Refresh: 3;url=edit_booking.php?booking=".$_GET['booking']."");
    echo "<!DOCTYPE html>\n";
echo "<html lang=\"en\"><head><meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\n";
echo "\n";
echo "    <!-- Bootstrap core CSS -->\n";
echo "    <link href=\"css/bootstrap.min.css\" rel=\"stylesheet\">\n";
echo "    <!-- Custom styles for this template -->\n";
echo "    <link href=\"css/dashboard.css\" rel=\"stylesheet\">\n";
echo "	<link href=\"css/style.css\" rel=\"stylesheet\">\n";
echo "	<link rel=\"stylesheet\" href=\"css/fontello.css\">\n";
echo "    <link rel=\"stylesheet\" href=\"css/animation.css\"><!--[if IE 7]><link rel=\"stylesheet\" href=\"css/fontello-ie7.css\"><![endif]-->\n";
echo "    \n";
echo "<body>\n";
echo "<div class=\"container\">\n";
echo "	<div class=\"row\">\n";
echo "		<div class=\"col-xs-3\">\n";
echo "		</div>\n";
echo "		<div class=\"col-xs-6 \">\n";
echo "		<h4> Success. Please wait few seconds for redirection...<i class=\"icon-spin4 animate-spin\" style=\"font-size:28px;\"></i></h4>\n";
echo "		\n";
echo "		</div>\n";
echo "		<div class=\"col-xs-3\">\n";
echo "		</div>\n";
echo "	</div>\n";
echo "</div>\n";
echo "\n";
echo "\n";
echo "</body></html>";

	
	



    ?>