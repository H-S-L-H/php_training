<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  require 'C:/Apache24/htdocs/tutorials/tutorial_10/PHPMailer-master/src/Exception.php';
  require 'C:/Apache24/htdocs/tutorials/tutorial_10/PHPMailer-master/src/PHPMailer.php';
  require 'C:/Apache24/htdocs/tutorials/tutorial_10/PHPMailer-master/src/SMTP.php';

function send_mail($recipient,$subject,$message)
{

  $mail = new PHPMailer();
  $mail->IsSMTP();

  $mail->SMTPDebug  = 0;  
  $mail->SMTPAuth   = TRUE;
  $mail->SMTPSecure = "tls";
  $mail->Port       = 587;
  $mail->Host       = "smtp.gmail.com";
  $mail->Username   = "hansulinnhtet@gmail.com";
  $mail->Password   = "mdyfqmjoqttorryo";

  $mail->IsHTML(true);
  $mail->AddAddress($recipient, "esteemed customer");
  $mail->SetFrom("hansulinnhtet@gmail.com", "My website");
  $mail->Subject = $subject;
  $content = $message;

  $mail->MsgHTML($content); 
  if(!$mail->Send()) {
    echo "Error while sending Email.";
    echo "<pre>";
    var_dump($mail);
    return false;
  } else {
    echo "Email sent successfully";
    return true;
  }

}

?>