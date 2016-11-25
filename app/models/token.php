<?php
    class Token extends Connection;
    private $token;
    private $user_id;
    private $expiration;

    public function __construct($email, $id, $date){
        $this->token = md5($email . $date);
        $this->user_id = $id;
        $this->expiration = $date;
    }

    public static function createToken($attributes){
        $email = array_key_exists('email', $attributes) ? $attributes['email'] :: null;
        if($email) {
            $userid = User::getId($email);
            if($userid) {
                $date = new DateTime();
                $date->add(new DateInterval(PT10M));
                $time = $date->format('Y-m-d H:i:s');
                $token = new Token($email, $userid, $time);
                return $token;
            }
            return 0;
        }
        return 0;
    }

    public static function insert(){
        $connection = self::connect;
        $stm = $connection->prepare('INSERT INTO recovery(token, expiration, user_id) VALUES (:token, :expiration, :userid)');
        $stm->BindValue(":token", $this->token, PDO::PARAM_STR);
        $stm->BindValue(":expiration", $this->token, PDO::PARAM_INT);
        $stm->BindValue(":userid", $this->token, PDO::PARAM_STR);
        return $stm->execute();
    }
