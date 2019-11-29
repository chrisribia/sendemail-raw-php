<?php
if(isset($_POST["submit"])){
// Checking For Blank Fields..
if($_POST["first_name"]==""||$_POST["email"]==""||$_POST["phone_no"]==""||$_POST["make"]=="--Make--"||$_POST["model"]=="--model--"||$_POST["transmision"]=="--Transmision--" ||$_POST["from"]=="--From--"||$_POST["to"]=="--To--"||$_POST["from"]=="--From--"||$_POST["title"]=="--Title--"||$_POST["country"]=="--Country--"){
echo "Fill All Fields..";
}else{
// Check if the "Sender's Email" input field is filled out
$first_name=$_POST['first_name'];
$phone_no=$_POST['phone_no'];
$email=$_POST['email'];
$message=$_POST['message'];
// Sanitize E-mail Address
$email =filter_var($email, FILTER_SANITIZE_EMAIL);
// Validate E-mail Address
$email= filter_var($email, FILTER_VALIDATE_EMAIL);
if (!$email){
echo "Invalid Sender's Email";
}
else{
$subject = "Car search";
$phone_no = $_POST['phone_no'];
$message = "Name: ".$_POST['first_name']." Phone Number :".$_POST['phone_no'] . " Make:".$_POST['make']." Model :".$_POST['model']. " Transmission :".$_POST['trasmision']." From :".$_POST['from']." To :".$_POST['to']." Title : ".$_POST['title']." Country :".$_POST['country'];
$headers = 'From:'. $email . " "; // Sender's Email
//$headers .= 'Cc:'. $email2 . "rn"; // Carbon copy to Sender
// Message lines should not exceed 70 characters (PHP rule), so wrap it
$message = wordwrap($message, 70);
// Send Mail By PHP Mail Function
mail("chrisribia@gmail.com", $subject, $message,  $headers);
header('Location: index.php');
$_SESSION['order']= "Your mail has been sent successfuly ! Thank you for your Order";
}
}
}
?>
