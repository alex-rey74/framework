<?php

namespace TheFramework;

class BackController extends ApplicationComponent{
    protected $action;
    protected $module;
    protected $page;
    protected $view;
    protected $managers;

    const METHOD_NOT_FOUND = 5;

    public function __construct(Application $app, string $module, string $action){
        parent::__construct($app);

        $this->page = new Page($app);
        $this->managers = new Managers('PDO', PDOFactory::getMysqlConnexion());

        $this->setModule($module);
        $this->setAction($action);
        $this->setView($action);
    }

    public function execute(){
        $methodName = 'execute'.ucfirst($this->action);

        if(is_callable([$this, $methodName])){
            $this->$methodName($this->app->getHttpRequest());
        } else {
            throw new \RuntimeException('Cette action n\'existe pas', BackController::METHOD_NOT_FOUND);
        }
    }

    public function getPage(){
        return $this->page;
    }

    public function setModule(string $module){
        $this->module = $module;
    }

    public function setAction(string $action){
        $this->action = $action;
    }

    public function setView(string $view){
        if(!is_string($view) || empty($view)){
            throw new InvalidArgumentException('La vue doit être une chaine de caractère valide');
        }

        $this->view = $view;
        $this->page->setContentFile(__DIR__.'/../../src/apps/'. $this->app->getName().'//Module//'.$this->module.'//View/'.$this->view.'.php');
    }
}