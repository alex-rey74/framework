<?php

namespace TheFramework;

class Managers{
    protected $api;
    protected $dao;
    protected $managers = [];

    public function __construct($api, $dao){
        $this->api = $api;
        $this->dao = $dao;
    }

    public function getManagerOf(string $module)
    {
        if(!is_string($module) || empty($module)){
            throw new \InvalidArgumentException("Le module spécifié est invalide");
        }
        $managerName = $module.'Manager'.$this->api;


        if(!isset($this->managers[$module])){
            $manager = "\\Model\\".$managerName;

            $this->managers[$module] = new $manager($this->dao);
        }

        return $this->managers[$module];;

    }
}