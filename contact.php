<?php
include('connexion.php');
$errors = '';
$myemail = 'alexist.prequal2021@gmail.com';//<-----Put Your email address here.
if(empty($_POST['name'])  || 
   empty($_POST['email']) || 
   empty($_POST['tel']) || 
   empty($_POST['message']))
{
    $errors .= "\n Error: all fields are required";
}

$name = $_POST['name']; 
$email = $_POST['email']; 
$message = $_POST['message']; 
$tel = $_POST['tel']; 


{
    $errors .= "\n Error: Invalid email address";
}
if( empty($errors))

{

$query = "INSERT INTO `contact` (nom, email, tel, message) VALUES ('$name', '$email', '$tel', '$message')";
$result = mysqli_query($connection, $query); 

$to = $myemail;

$email_subject = "Contact form submission: $name";

$email_body = "You have received a new message. ".

" Here are the details:\n Name: $name \n ".

"Email: $email\n Message \n $message";

$headers = "From: $myemail\n";

$headers .= "Reply-To: $email";

mail($to,$email_subject,$email_body,$headers);

//redirect to the 'thank you' page

header('Location: contact.html');

}
?>