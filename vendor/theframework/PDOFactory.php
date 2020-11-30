<?php

namespace TheFramework;

class PDOFactory{
    static public function getMysqlConnexion(){
        $db = new \PDO('mysql:host=localhost;dbname=db_framework', 'root', '');
        $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        return $db;
    }
}