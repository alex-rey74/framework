<?php

namespace TheFramework;

class HTTPRequest extends ApplicationComponent{

    public function getCookie(string $key){
        if(isset($_COOKIE[$key])){
            return $_COOKIE[$key];
        } else{
            return null;
        }
    }

    public function cookieExists(string $key){
        if(isset($_COOKIE[$key])){
            return true;
        } else{
            return false;
        }
    }

    public function getQuery(string $key){
        if(isset($_GET[$key])){
            return $_GET[$key];
        } else{
            return null;
        }
    }

    public function queryExists(string $key){
        if(isset($_GET[$key])){
            return true;
        } else{
            return false;
        }
    }

    public function getPost(string $key){
        if(isset($_POST[$key])){
            return $_POST[$key];
        } else{
            return null;
        }
    }

    public function postExists(string $key){
        if(isset($_POST[$key])){
            return true;
        } else{
            return false;
        }
    }

    public function getRequestURI(){
        return $_SERVER['REQUEST_URI'];
    }

    public function getMethod(){
        return $_SERVER['REQUEST_METHOD'];
    }
}