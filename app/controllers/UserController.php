<?php
    require_once('../models/user.php');

    class UserController {
        public static function create(){
            if ($_POST['name'] != '' && $_POST['marital_status'] != '' &&  $_POST['course'] != ''  &&  $_POST['registration'] != '' && $_POST['rg'] != '' && $_POST['organ'] != '' && $_POST['cpf'] != '' && $_POST['email'] != '' && $_POST['password'] != '' && $_POST['address_id'] != '' && $_POST['position_id'] != '' && $_POST['company_id'] != '' && $_POST['start_date'] != '' && $_POST['end_date'] != '' && $_POST['level'] != '' ) {
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
    }
    $postAction = array('create','update','updatePassword','delete');

    if(isset($_POST['action']) && in_array($_POST['action'], $postAction)) {
        UserController::$_POST['action']();
    }

