<?php

namespace TheFramework;

abstract class Application{
    protected $httpRequest;
    protected $httpResponse;
    protected $name;
    protected $user;

    public function __construct(){
        $this->httpRequest = new HTTPRequest($this);
        $this->httpResponse = new HTTPResponse($this);

        $this->name = "";

        $this->user = new User();
        }

        abstract public function run();

        public function getController(){
            $router = new Router();

            $xml = new \DOMDocument;
            $xml->load(__DIR__.'/../../src/apps/'.$this->name.'/Config/routes.xml');

            $routes = $xml->getElementsByTagName('route');

            foreach($routes as $route){
                $vars = [];
                $url = $route->getAttribute('url');
                $module = $route->getAttribute('module');
                $action = $route->getAttribute('action');

                if($route->hasAttribute('vars')){
                    $strVars = $route->getAttribute('vars');

                    $vars = explode(',', $strVars);
                }
                
                $nRoute = new Route($url,$module, $action, $vars);

                $router->addRoute($nRoute);
            }

            try{
                $matchedRoute = $router->getRoute($this->httpRequest->getRequestURI());
            }
            catch(\RuntimeException $e){
                $this->httpResponse->redirect404();
            }

            $_GET = array_merge($_GET, $matchedRoute->getVars());

            $controllerClass = 'App\\'.$this->name.'\\Module\\'.$matchedRoute->getModule().'\\'.$matchedRoute->getModule().'Controller';
            return new $controllerClass($this, $matchedRoute->getModule(), $matchedRoute->getAction());
        }

        public function getHttpRequest(){
            return $this->httpRequest;
        }

        public function getHttpResponse(){
            return $this->httpResponse;
        }

    public function getName(){
        return $this->name;
    }

    public function getUser() {
        return $this->user;
    }
}