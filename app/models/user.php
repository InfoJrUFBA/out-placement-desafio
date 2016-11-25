<?php

    class User extends Connect {

        public $id;
        public $name;
        public $email
        public $rg;
        public $cpf;
        public $address;
        public $registration;
        public $marital_status;
        public $phone;
        public $course;
        public $jr_ocupation
        public $start_date;
        public $end_date;
        public $current_business;
        public $current_occupation;
        public $projects;
        public $password;

        function __construct($attributes = array()) {
            if(!empty($attributes)) {
                $this->id = array_key_exists('id', $attributes) ? $attributes['id'] : "";
                $this->name = array_key_exists('name', $attributes) ? $attributes['name'] : "";
                $this->email = array_key_exists('email', $attributes) ? $attributes['email'] : "";
                $this->rg = array_key_exists('rg', $attributes) ? $attributes['rg'] : "";
                $this->cpf = array_key_exists('cpf', $attributes) ? $attributes['cpf'] : "";
                $this->address = array_key_exists('address', $attributes) ? $attributes['address'] : "";
                $this->registration = array_key_exists('registration', $attributes) ? $attributes['registration'] : "";
                $this->registration = array_key_exists('registration', $attributes) ? $attributes['registration'] : "";
                $this->marital_status = array_key_exists('marital_status', $attributes) ? $attributes['marital_status'] : "";
                $this->phone = array_key_exists('phone', $attributes) ? $attributes['phone'] : "";
                $this->course = array_key_exists('course', $attributes) ? $attributes['course'] : "";
                $this->jr_occupation = array_key_exists('jr_occupation', $attributes) ? $attributes['jr_occupation'] : "";
                $this->start_date = array_key_exists('start_date', $attributes) ? $attributes['start_date'] : "";
                $this->end_date = array_key_exists('end_date', $attributes) ? $attributes['end_date'] : "";
                $this->current_business = array_key_exists('current_business', $attributes) ? $attributes['current_business'] : "";
                $this->current_occupation = array_key_exists('current_occupation', $attributes) ? $attributes['current_occupation'] : "";
                $this->projects = array_key_exists('projects', $attributes) ? $attributes['projects'] : "";
                $this->projects = array_key_exists('projects', $attributes) ? $attributes['projects'] : "";
                $this->password = array_key_exists('password', $attributes) ? $attributes['password'] : "";
            }
        }
    }
