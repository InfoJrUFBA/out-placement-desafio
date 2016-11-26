<?php
    if(!isset($_SESSION)){
        session_start();
    }
    require_once('../models/user.php');

    if (empty($_POST['email']) || empty($_POST['password'])) {
        header("Location: ../views/index.php");
        $_SESSION['message'] = 'Dados em branco';
        exit;
    }
    else{
        $user = User::selectLogin($_POST['email'], $_POST['password']);
        if($user == false){
            $_SESSION['message'] = 'Credenciais não conferem';
            header("Location: ../views/index.php");
        }else{
            $_SESSION['userId'] = $user['id'];
            $_SESSION['userName'] = $user['name'];
            $_SESSION['userEmail'] = $user['email'];
            header("Location: ../views/add-user.php");
        }

    }
