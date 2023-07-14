<?php
ob_start();

// check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // collect form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  //$subject = $_POST['subject'];
  $message = $_POST['message'];
  $subject = 'New message from your website'; 

  // set recipient email address
  $to = "Prakash_2651@yahoo.co.in";

  // set email headers
  $headers = "From: " . $name . "<" . $email . ">\r\n";
  $headers .= "Reply-To: " . $email . "\r\n";
  $headers .= "Content-type: text/html\r\n";

  // build email content
  $email_content = "<strong>Name:</strong> " . $name . "<br>";
  $email_content .= "<strong>Email:</strong> " . $email . "<br>";
  $email_content .= "<strong>Subject:</strong> " . $subject . "<br>";
  $email_content .= "<strong>Message:</strong> " . $message;

  // send email
  $send_mail = mail($to, $subject, $email_content, $headers);

  if($send_mail) {
    // redirect to thank you page
    header('Location: ' . $_POST['_next']);
    exit();
  } else {
    // set error message
    $error_message = "Failed to send message. Please try again later.";
  }

}

// output error message if there is any
if(isset($error_message)) {
  echo "<h2>Error: " . $error_message . "</h2>";
}

ob_end_flush();
?>
