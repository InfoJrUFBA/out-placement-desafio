<?php
    class Token extends Connection;
    private $idtoken;
    private $users_id;
    private $expiration_date;

    public function __construct($email, $id, $date){
        $this->token = md5($email . $date);
        $this->users_id = $id;
        $this->expiration_date = $date;
    }

    public static function createToken($attributes){
        $email = array_key_exists('email', $attributes) ? $attributes['email'] :: null;
        if($email) {
            $user_id = User::getId($email);
            if($id) {
                $date = new DateTime();
                $date->add(new DateInterval(PT10M));
                $time = $date->format('Y-m-d H:i:s');
                $token = new Token($email, $user_id, $time);
                return $token;
            }
            return 0;
        }
        return 0;
    }

    public static function insert(){
        $connection = self::connect;

    }
