<?php

// Core Class
// URL and controller
// Url formatter

class Core{
    protected $currentController = 'PagesController';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct(){
        $url = $this->getUrl();
        if(file_exists(CONTROLLER_ROOT . ucwords($url[0]) .'Controller.php')){
            $this->currentController = ucwords($url[0]) . 'Controller';
            unset($url[0]);

        }
        require_once CONTROLLER_ROOT . $this->currentController .'.php';

        $this->currentController = new $this->currentController;
        if(isset($url[1])){
            if(method_exists($this->currentController,$url[1])){
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }
        $this->params = $url ? array_values($url) : [];

        call_user_func_array([$this->currentController,$this->currentMethod],$this->params);

    }
    public function getUrl(){
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'],'/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/',$url);
            return $url;
        }
    }
}