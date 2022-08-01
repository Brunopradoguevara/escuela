<?php

class Routing 
{

    private $_uri = array();
    private $_action = array();
    private $_method = array();

    public function post($uri, $action = null){
        $this->add($uri, $action, 'POST');
    }
    public function get($uri, $action = null){
        $this->add($uri, $action,  'GET');
    }
    public function delete($uri, $action = null){
        $this->add($uri, $action,  'DELETE');
    }
    public function put($uri, $action = null){
        $this->add($uri, $action,  'PUT');
    }
    public function patch($uri, $action = null){
        $this->add($uri, $action,  'PATCH');
    }
    public function add($uri, $action = null, $method) 
    {
        $this->_uri[] = '/' . trim($uri, '/');

        if ($action != null) 
        {
            $this->_action[] = $action;
            $this->_method[] = $method;
        }
    }

    public function run() 
    {
    

        foreach ($this->_uri as $key => $value) 
        {
             //recibimos los datos de la url
        $route = $_SERVER['REQUEST_URI'];
        if (strpos($route, '?')) {
            $route = strstr($route, '?', true);
        }
        //validamos si tiene parametros
        $urlRule = preg_replace('/:([^\/]+)/', '(?<\1>[^/]+)', $value);
        $urlRule = str_replace('/', '\/', $urlRule);
        $parameters = null;
        preg_match_all('/:([^\/]+)/', $value, $parameterNames);
    
    
        if (preg_match('/^' . $urlRule . '\/*$/s', $route, $matches)) {
            if($_SERVER['REQUEST_METHOD'] == $this->_method[$key]){
                $parameters = array_intersect_key($matches, array_flip($parameterNames[1]));
                $action = $this->_action[$key];
                $this->runAction($route, $action, $parameters);
            }else{
                header('Content-Type: application/json');
                header('HTTP/1.1 405 Method Not Allowed');
            }
        
        }
        
        }
    }

    private function runAction($url, $action, $parameters) 
    {
    
        //validamos si es una función o una clase

        if($action instanceof \Closure)
        {
            if(!empty($parameters)){
                $action($parameters);
            }else{
                $action();
            }
            $action();
        }  
        else 
        {
            $params = explode('@', $action);
            $obj = new $params[0];
            if(!empty($parameters)){
                $obj->{$params[1]}($parameters);
            }
            else{
                $obj->{$params[1]}();
            }
        }
    }

}
?>
