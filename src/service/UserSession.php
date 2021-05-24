<?php

namespace geunadamiano\usm\service;

use geunadamiano\usm\model\UserModel;

class UserSession {

    public function __construct(){
        session_start();
    }

    public function login(String $email, String $password)
    {
        $um = new UserModel();
        $user = $um->login($email,$password);

        if(!is_null($user)){
            $_SESSION['user-autenticated'] = $user;
            return $user;
        }else{
            unset($_SESSION['user-autenticated']);
        }
    }

    public function isAutenticated()
    {

        if (isset($_SESSION['user-autenticated'])){
            return false;
        }else{
            return true;
        }
        
    }

    public function logout(){
        //session_destroy
        unset($_SESSION['user-autenticated']);
    }

    public function redirect(){

        if(!$this->isAutenticated()){
            header('location: login_user.php');
        };

    }
}