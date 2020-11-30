<?php

namespace TheFramework;

session_start();

class User{
    public function setAttribute(string $attr, $value){
        if(!empty($attr)){
            $_SESSION[$attr] = $value;
        }
    }

    public function getAttribute(string $attr){
        if(isset($_SESSION[$attr])){
            return $_SESSION[$attr];
        }

        return null;
    }

    public function setAuthenticated(bool $auth){
        $_SESSION['is_auth'] = $auth;
    }

    public function isAuth(){
        if(isset($_SESSION['is_auth'])){
            return $_SESSION['is_auth'];
        }

        return false;
    }

    public function setFlash(string $msg){
        if(!empty($msg)){
            $_SESSION['Flash'] = $msg;
        }
    }

    public function hasFlash(){
        if(isset($_SESSION['Flash']) && !empty($_SESSION['Flash'])){
            return true;
        }

        return false;
    }

    public function getFlash(){
        $flash = $_SESSION['Flash'];

        unset($_SESSION['Flash']);

        return $flash;
    }
}