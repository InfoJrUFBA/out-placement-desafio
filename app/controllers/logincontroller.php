<?php
    public static function recover(){
        if(!empty($_POST['email'])){
            $token = Token::createToken($_POST);
            if($token){
                try{
                    $user_id = User::getId($_POST['email']);
                    if(Token::tokenExists($user_id)){
                        $token->deleteByUser();
                        $token->insert();
                    } else{
                        $token->insert();
                    }
                    $hash = $token->token;
                }
            }
        } else {

        }
    }
