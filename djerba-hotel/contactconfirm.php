
<?php
     include "auth.php" ; 

  
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    $toEmail = "aminenafkha@gmail.com";
    $mailHeaders = "From: " . $name . "<". $email .">\r\n";
    if(mail($toEmail, $subject, $message, $mailHeaders)) {
        echo "Vos informations de contact sont enregistrées avec succés.";

    }else{
        echo "Vos informations de contact sont enregistrées avec succés.";

    }
  


        $result = mysqli_query($dbhandle, "INSERT INTO contact (name,email,subject,message) VALUES 
                ('".$_POST["name"]."','".$_POST["email"]."','".$_POST["subject"]."','".$_POST["message"]."')");
            if($result){
                header('location:contact.php?success=1') ;
            }else{
                header('location:contact.php?success=2') ;
            }
           


?>