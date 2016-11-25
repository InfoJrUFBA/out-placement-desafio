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
        public $start_date;
        public $end_date;
        public $level;

        function __construct($attributes = array()) {
            if(!empty($attributes)) {
                $this->id = array_key_exists('id', $attributes) ? $attributes['id'] : "";
            }
        }
    }
