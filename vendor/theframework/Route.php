<?php

namespace TheFramework;

class Route{
    private $url;
    private $module;
    private $action;
    private $varsNames;
    private $vars = [];

    public function __construct(string $url, string $module, string $action, array $varsNames = null){
        $this->url = $url;
        $this->module = $module;
        $this->action = $action;
        $this->varsNames = $varsNames;
    }

    public function hasVars(){
        if(empty($this->varsNames)){
            return false;
        } else {
            return true;
        }
    }

    public function match(string $url){
        $matches = [];

        if(preg_match('#^'.$this->url.'$#', $url, $matches)){
            return $matches;
        } else {
            return false;
        }
    }

    public function getUrl(){
        return $this->url;
    }

    public function getModule(){
        return $this->module;
    }   

    public function getAction(){
        return $this->action;
    }

    public function getVarsNames(){
        return $this->varsNames;
    }

    public function getVars(){
        return $this->vars;
    }

    public function setUrl(string $url){
        $this->url = $url;
    }

    public function setModule(string $module){
        $this->module = $module;
    }

    public function setAction(string $action){
        $this->action = $action;
    }

    public function setVarsNames(array $varsNames){
        $this->varsNames = $varsNames;
    }

    public function setVars(array $vars){
        $this->vars = $vars;
    }
}