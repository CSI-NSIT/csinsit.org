<?php

if(isset($_POST['email'])) {
 
     
    $email_to = "web.csinsit@nsitonline.in";
 
    $email_subject = "$_POST['subject']";

 function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
 $email_from=$_POST['email'];    
 
    $email_message .= "Name: ".clean_string($_POST['name'])."\n";
 
    $email_message .= "Email: ".clean_string($_POST['email'])."\n";
 
    $email_message .= "Message: ".clean_string($_POST['message'])."\n";
     
 
// email headers
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);  
 
?>
 
<?php
 
}
 
?>