<?php

// 1. Общие настройки
ini_set('display_errors',1);
error_reporting(E_ALL);  

    
    $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
    $request = filter_var(trim($_POST['request']), FILTER_SANITIZE_STRING);
    
    $subject = 'Request';
    

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require_once 'PHPMailer/src/Exception.php';
    require_once 'PHPMailer/src/PHPMailer.php';
    require_once 'PHPMailer/src/SMTP.php';


    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Mailer = "smtp";

    $mail->SMTPDebug  = 0;  
    $mail->SMTPAuth   = TRUE;
    $mail->Port       = 465;
    $mail->Host       = "*******";
    $mail->Username   = "*******";
    $mail->Password   = "*******";

    $mail->IsHTML(true);
    $mail->AddAddress("********", "********");
    $mail->SetFrom($email, $name);
    $mail->AddReplyTo($email, $name);
    $mail->Subject = "Contact request from ".$name;
    $content = "<p>Request from: ".$name."<br>Email: ".$email."<br>Request: ".$request."</p>";


    $mail->MsgHTML($content); 
    if(!$mail->Send()) {
      echo "Error while sending Email.";
      var_dump($mail);
    } else {
      echo "Email sent successfully";
    }

