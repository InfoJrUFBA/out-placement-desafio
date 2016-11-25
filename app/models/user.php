<?php

    class User extends Connect {

        public $id;
        public $name;
        public $marital_status;
        public $course;
        public $registration;
        public $rg;
        public $organ;
        public $cpf;
        public $email;
        public $password;
        public $address_id;
        public $position_id;
        public $company_id;
        public $start_date;
        public $end_date;
        public $level;

        function __construct($attributes = array()) {
            if(!empty($attributes)) {
                $this->id = array_key_exists('id', $attributes) ? $attributes['id'] : "";
                $this->name = array_key_exists('name', $attributes) ? $attributes['name'] : "";
                $this->marital_status = array_key_exists('marital_status', $attributes) ? $attributes['marital_status'] : "";
                $this->course = array_key_exists('course', $attributes) ? $attributes['course'] : "";
                $this->registration = array_key_exists('registration', $attributes) ? $attributes['registration'] : "";
                $this->rg = array_key_exists('rg', $attributes) ? $attributes['rg'] : "";
                $this->organ = array_key_exists('organ', $attributes) ? $attributes['organ'] : "";
                $this->cpf = array_key_exists('cpf', $attributes) ? $attributes['cpf'] : "";
                $this->email = array_key_exists('email', $attributes) ? $attributes['email'] : "";
                $this->password = array_key_exists('password', $attributes) ? $attributes['password'] : "";
                $this->address_id = array_key_exists('address_id', $attributes) ? $attributes['address_id'] : "";
                $this->position_id = array_key_exists('position_id', $attributes) ? $attributes['position_id'] : "";
                $this->company_id = array_key_exists('company_id', $attributes) ? $attributes['company_id'] : "";
                $this->start_date = array_key_exists('start_date', $attributes) ? $attributes['start_date'] : "";
                $this->end_date = array_key_exists('end_date', $attributes) ? $attributes['end_date'] : "";
                $this->level = array_key_exists('level', $attributes) ? $attributes['level'] : "";
            }
        }

        public function create() {
            $connect = self::start();
            $stm = $connect->prepare('INSERT INTO `user`(`name`, `marital_status`, `course`, `registration`, `rg`, `organ`, `cpf`, `email`, `password`, `address_id`, `position_id`, `company_id`, `start_date`, `end_date`, `level`) VALUES(:name, :marital_status, :course, :registration, :rg, :organ, :cpf, :email, :password, :address_id, :position_id, :company_id, :start_date, :end_date, :level)');
            $stm->bindValue(':name', $this->name, PDO::PARAM_STR);
            $stm->bindValue(':marital_status', $this->marital_status, PDO::PARAM_INT);
            $stm->bindValue(':course', $this->course, PDO::PARAM_STR);
            $stm->bindValue(':registration', $this->registration, PDO::PARAM_STR);
            $stm->bindValue(':rg', $this->rg, PDO::PARAM_STR);
            $stm->bindValue(':organ', $this->organ, PDO::PARAM_STR);
            $stm->bindValue(':cpf', $this->cpf, PDO::PARAM_STR);
            $stm->bindValue(':email', $this->email, PDO::PARAM_STR);
            $stm->bindValue(':password', $this->password, PDO::PARAM_INT);
            $stm->bindValue(':address_id', $this->address_id, PDO::PARAM_INT);
            $stm->bindValue(':position_id', $this->position_id, PDO::PARAM_INT);
            $stm->bindValue(':company_id', $this->company_id, PDO::PARAM_INT);
            $stm->bindValue(':start_date', $this->start_date, PDO::PARAM_STR);
            $stm->bindValue(':end_date', $this->end_date, PDO::PARAM_STR);
            $stm->bindValue(':level', $this->level, PDO::PARAM_INT);
            return $stm->execute();
        }
    }
