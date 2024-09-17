<?php

namespace Controllers;

use Exception;
use MVC\Router;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class EmailController
{
    public static function email(Router $router)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $emailAddress = $_POST['email'];
            $pdfContent = base64_decode($_POST['pdf']); 

            $mailer = new PHPMailer(true);

            $mailer->SMTPOptions = [
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true,
                ]
            ];

            try {
                $mailer->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debug output
                $mailer->isSMTP(); // Send using SMTP
                $mailer->Host = $_ENV['MAIL_HOST']; // Set the SMTP server to send through
                $mailer->SMTPAuth = true; // Enable SMTP authentication
                $mailer->Username = $_ENV['MAIL_USERNAME']; // SMTP username
                $mailer->Password = $_ENV['MAIL_PASSWORD']; // SMTP password
                $mailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Use SSL encryption
                $mailer->Port = $_ENV['MAIL_PORT']; // TCP port to connect to (465 for SSL)
                $mailer->CharSet = "UTF-8";

                $mailer->setFrom($_ENV['MAIL_FROM_ADDRESS'], $_ENV['MAIL_FROM_NAME']);
                $mailer->addAddress($emailAddress);
                $mailer->addReplyTo($_ENV['MAIL_FROM_ADDRESS'], $_ENV['MAIL_FROM_NAME']);
                $mailer->isHTML(true); 
                $mailer->Subject = 'PDF Reporte';
                $mailer->Body = 'Se adjunta el PDF generado con PHP MAILER.';
                $mailer->addStringAttachment($pdfContent, 'reporte.pdf');

                $mailer->send();
                echo "Correo enviado correctamente.";
            } catch (Exception $e) {
                echo "Error al enviar correo: " . $e->getMessage();
            }
        } else {
            echo "Método no permitido.";
        }
    }
}
