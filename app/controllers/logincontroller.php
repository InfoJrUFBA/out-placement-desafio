<?php
require_once '../models/user.php';
require_once '../models/token.php';
require_once '../helpers/mailer.php';

class LoginController {
    public static function recover(){
        if(!empty($_POST['email'])){
            $token = Token::createToken($_POST);
            if($token){
                try{
                    var_dump($user_id = User::getId($_POST['email']));
                    if(/*Token::tokenExists($user_id)*/ $user_id){
                        $token->deleteByUser($user_id);
                        $token->insert();
                        die();
                    } else{
                        $token->insert();
                    }
                    $hash = $token->token;
                    Email::sendEmail(
                    '<html>
                    <body>
                    <br />
                        <a href="http://' . "localhost" . '/views/changepassword.php?t=' . $token . '"> Clique aqui para alterar a senha </a>
                    <br />
                    </body>
                </html>', $_POST['email'], "Recuperação de senha");
                } catch(PDOException $e) {
                    echo $e->getMessage();
                }
            }
        } else {

        }
    }
}
    $postActions = array('login', 'logout', 'recover');

    if (isset($_POST['action']) && in_array($_POST['action'], $postActions)) {

        LoginController::$_POST['action']();
    }
    else {
        header('Location:../views/login.php');
    }
