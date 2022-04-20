<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class MailerController extends BaseController
{
    // ========== [ Compose Email ] ================
    public function composeEmail($user, $email, $token) {
        $mail = new PHPMailer(true);

        //Enable SMTP debugging.
        $mail->SMTPDebug = 3;                               
        //Set PHPMailer to use SMTP.
        $mail->isSMTP();            
        //Set SMTP host name                          
        $mail->Host = "smtp.gmail.com";
        //Set this to true if SMTP host requires authentication to send email
        $mail->SMTPAuth = true;                          
        //Provide username and password     
        $mail->Username = "mohabmamdouh0706@gmail.com";                 
        $mail->Password = "07063003RaniaMamdouh@#$";                           
        //If SMTP requires TLS encryption then set it
        $mail->SMTPSecure = "tls";                           
        //Set TCP port to connect to
        $mail->Port = 587;                                   

        $mail->From = "alhandasya@company.com";
        $mail->FromName = "Al Handasya";

        $mail->addAddress($email, $user);

        $mail->isHTML(true);

        $mail->Subject = "Reset Password";
        $mail->Body = view('mails.forgetPassword', ['user' => $user, 'email' => $email, 'link' => route('showResetPasswordForm', ['token' => $token]), 'token' => $token])->render();

        try {
            $mail->send();
            return redirect(route('showForgetPasswordForm'));
        } catch (Exception $e) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }
    }
}
