<?php

namespace TheFramework;

class Router{
    private $routes = [];
    const ROUTE_NOT_FOUND = 404;

    public function addRoute(Route $route){
        $this->routes[] = $route;
    }

    public function getRoute(string $url){
        foreach($this->routes as $route){

            $matches = $route->match($url);

            if($matches != false){

                $vars;
                $varsName = $route->getVarsNames();

                if($route->hasVars()){
                    for($i = 0; $i < count($varsName) ;$i++ ){
                        $vars[$varsName[$i]] = $matches[$i+1];
                    }
    
                    $route->setVars($vars);
                }
                return $route;
            }
        }
        throw new \RuntimeException("Route non trouvée", Router::ROUTE_NOT_FOUND);   
    }
}