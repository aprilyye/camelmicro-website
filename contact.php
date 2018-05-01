<?php
include('includes/init.php');
include('includes/header.php');
$current_page = 'contact.php';
$contact_messages = array();

if (isset($_POST['send_message'])){
  $sender = filter_input(INPUT_POST, 'visitor_name', FILTER_SANITIZE_STRING);
  $sender_email = $_POST['visitor_email'];
  $email_content = $_POST['message'];
  $email_subject = filter_input(INPUT_POST, 'email_subject', FILTER_SANITIZE_STRING);
}


function mail_out(){
  GLOBAL $sender;
  GLOBAL $sender_email;
  GLOBAL $email_content;
  GLOBAL $email_subject;
  GLOBAL $contact_messages;
  $my_email = "izhao97@gmail.com";
  $header= "From: ".$sender." <".$sender_email.">";
  mail($my_email, $email_subject, $email_content, $header);
  array_push($contact_messages, "Your email has been sent");
}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel='stylesheet' href='styles/main.css'/>
  <title>Contact Us</title>
</head>

<body>
<?php
if (isset($_POST['send_message'])){
  mail_out();
  foreach ($contact_messages as $contact_message){
    echo "<p>" . $contact_message . "</p>";
  }
} else{
 ?>

 <h1> Contact Us </h1>
<div class = "contact">
<form name='contact_form' method = "POST" action= "contact.php">
  <input type="text" name ="visitor_name" placeholder="Your name" required>
  <input type="email" name="visitor_email" placeholder="Your email" required>
  <input type= "subject" name="email_subject" placeholder="Your subject" required>
  <textarea name="message" placeholder="Email Content" required> </textarea>
  <input type="submit" name="send_message" value="Send Message">
</form>
</div>

<?php
}
 ?>

</body>
</html>
