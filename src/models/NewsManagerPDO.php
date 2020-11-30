<?php

namespace Model;

use TheFramework\Application;

class NewsManagerPDO extends NewsManager{

    public function getAll(int $limit = -1, int $offset = -1){
        $rep = [];
        $query = 'SELECT * FROM news';

        if($limit != -1){
           $query =  $query.' LIMIT '. $limit;
        }

        if($offset != -1){
            $query =  $query.' OFFSET '. $offset;
        }

        $result = $this->dao->query($query);
        $rep = $result->fetchAll(\PDO::FETCH_CLASS, 'Entity\News');

        $result->closeCursor();
        
        return $rep;
    }

    public function getById(int $id)
    {
        $query = $this->dao->prepare('SELECT * FROM news WHERE id = :id');
        $query->bindValue(':id', $id);

        $query->setFetchMode(\PDO::FETCH_CLASS, 'Entity\News');
        $query->execute();

        return $query->fetch();
    }
}