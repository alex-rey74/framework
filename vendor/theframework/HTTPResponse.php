<?php

namespace TheFramework;

class HTTPResponse extends ApplicationComponent{
    private $page;

    public function addHeader(string $header){
        header($header);
    }

    public function redirect(string $location){
        header("Location:".$location);
        exit();
    }

    public function redirect404(){
        $this->page = new Page($this->app);
        $this->page->setContentFile(__DIR__.'/../../errors/404.html');

        $this->addHeader('HTTP/1.0 404 Not Found');

        $this->send();
    }

    public function send(){
        exit($this->page->getGeneratedPage());
    }

    public function setCookie(string $name, string $value = "", int $expire = 0, string $path = "", string $domain = "", bool $secure = false, bool $httponly = true){
        setcookie($name, $value, $expire, $path, $domain, $secure, $httponly);
    }

    public function setPage(Page $page){
        $this->page = $page;
    }
}