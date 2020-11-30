<?php

namespace TheFramework;

class Page extends ApplicationComponent{
    private $contentFile;
    private $vars = [];

    const VAR_NOT_FOUND = 4;

    public function addVar(string $var, $value){
        if(empty($var) || !is_string($var)){
            throw new \Exception('Var n\'existe pas', Page::VAR_NOT_FOUND);
        }
        $this->vars[$var] = $value;
    }

    public function setContentFile(string $content){
        $this->contentFile = $content;
    }

    public function getGeneratedPage(){
        if(!\file_exists($this->contentFile)){
            throw new \RuntimeException("La vue spécifiée n'existe pas");
        }

        extract($this->vars);
        $user = $this->app->getUser();

        ob_start();
        require $this->contentFile;

        $content = ob_get_clean();

        ob_start();

        require __DIR__.'/../../src/apps/'. $this->app->getName().'/templates/layout.php';
        return ob_get_clean();
    }
}