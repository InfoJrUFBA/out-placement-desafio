<?php
    require_once('../vendors/PHPMailer/class.phpmailer.php');
    class Mailer {
        public static function sendEmail($msg, $email, $topic){
            foreach (file('../.email-config') as $line) {
                list($key, $value) = explode(':', $line, 2) + [NULL, NULL];
                $conf[trim($key)] = trim($value);
            }

            $mail = new PHPMailer(true);
            $mail->IsSMTP();
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = $conf['SMTPSecure'];
            $mail->Host = $conf['Host'];
            $mail->Port = $conf['Port'];
            $mail->Username = $conf['Email'];
            $mail->Password = $conf['Password'];
            $mail->AddAddress($email);
            $mail->SetFrom($conf['Email'], 'Recuperação de Senha');
            $mail->Subject = $topic;
            $mail->MsgHTML($msg);
            $mail->Send();
        }
    }
?>
