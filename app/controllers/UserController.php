<?php
    require_once('../models/user.php');
    public static function create(){
        if ($_POST['name'] != '' && $_POST['email'] != '' &&  $_POST['rg'] != ''  &&  $_POST['cpf'] != '' && $_POST['address'] != '' && $_POST['registration'] != '' && $_POST['marital_status'] != '' && $_POST['phone'] != '' && $_POST['course'] != '' && $_POST['jr_ocupation'] != '' && $_POST['start_date'] != '' && $_POST['end_date'] != '' && $_POST['current_business'] != '' && $_POST['current_ocupation'] != '' ) {
            $user = new User($_REQUEST);
            try {
                (empty($user->id)) ? $user->create() : $user->updatePassword();
            }
            catch(pdoexception $e) {
                $_SESSION['msg'] = 'Erro!';
                echo $_SESSION['msg'];
                //die();
            }
        }
    }

    $postAction = ('create','update','updatePassword','delete');

    if(isset($_POST['action']) && in_array($_POST['action'], $postAction)) {
        UserController::$_POST['action']();
    }
