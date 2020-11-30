<?php

namespace TheFramework;

class Entity implements \ArrayAccess{
    protected $id = null;
    protected $errors = [];

    public function __construct(array $data = []){
        $this->hydrate($data);
    }

    public function hydrate(array $data){
        foreach($data as $key => $value){
            $method = 'set'. $key;

            if(is_callable([$this, $method])){
                $this->$method($value);
            }
        }
    }

    public function isNew(){
        if(isset($this->id) || !empty($this->id)){
            return false;
        }
        return true;
    }

    public function getErrors(){
        return $this->errors;
    }

    public function getId(){
        return $this->id;
    }

    public function setId(int $id){
        $this->id = $id;
    }

    public function offsetUnset($offset){
        throw new \Exception('Impossible de supprimer une valeur quelconque');
    }

    public function offsetExists( $offset){
        $method = 'get'. ucfirst($offset);

        return isset($this->$offset) && is_callable([$this, $method]);
    }

    public function offsetGet( $offset){
        $method = 'get'. \ucfirst($offset);

        if($this->offsetExists($offset)){
            return $this->$method();
        }
    }

    public function offsetSet( $offset, $value){
        $method = 'set'. ucfirst($offset);

        if(isset($this->$offset) && is_callable([$this, $method])){
            $this->$method($value);
        }
    }
}