<?php
require_once 'user.php';
require_once '../helpers/connect.php';

class Token extends Connect{
    private $token;
    private $user_id;
    private $expiration;

    public function __construct($email, $id, $date){
        $this->token = md5($email . $date);
        $this->user_id = $id;
        $this->expiration = $date;
    }

    public static function createToken($attributes){
        $email = array_key_exists('email', $attributes) ? $attributes['email'] : null;
        if($email) {
            $userid = User::getId($email);
            if($userid) {
                $date = new DateTime();
                $date->add(new DateInterval('PT10M'));
                $time = $date->format('Y-m-d H:i:s');
                $token = new Token($email, $userid, $time);
                return $token;
            }
            return 0;
        }
        return 0;
    }

    public function insert(){
        $connect = self::start();
        $stm = $connect->prepare('INSERT INTO recovery(token, user_id, expiration) VALUES (:token, :id, :expiration)');
        $stm->BindValue(":token" , $this->token, PDO::PARAM_STR);
        $stm->BindValue(":id" , $this->user_id, PDO::PARAM_INT);
        $stm->BindValue(":expiration", $this->expiration, PDO::PARAM_STR);
        return $stm->execute();
    }

    public static function deleteByUser($id){
        $connect = self::start();
        $stm = $connect->prepare('DELETE FROM recovery WHERE user_id=:id LIMIT 1');
        $stm->BindValue(':id', $id, PDO::PARAM_STR);
        return $stm->execute();
    }

}
