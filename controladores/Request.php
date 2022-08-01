<?php
class Request{
    public $ip_public = '';
    public function __construct() {
        $this->ip_public =$this->getIp();
        foreach($this->all() as $key=>$value){
            $this->{$key} = $value;
        }
    }
    public function all()
    {
        $postBody = file_get_contents("php://input");
        $query = json_decode($postBody, true);
        return $query;
    }
    private function getIp(){
        
    if (isset($_SERVER["HTTP_CLIENT_IP"]))
    {
        return $_SERVER["HTTP_CLIENT_IP"];
    }
    elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
    {
        return $_SERVER["HTTP_X_FORWARDED_FOR"];
    }
    elseif (isset($_SERVER["HTTP_X_FORWARDED"]))
    {
        return $_SERVER["HTTP_X_FORWARDED"];
    }
    elseif (isset($_SERVER["HTTP_FORWARDED_FOR"]))
    {
        return $_SERVER["HTTP_FORWARDED_FOR"];
    }
    elseif (isset($_SERVER["HTTP_FORWARDED"]))
    {
        return $_SERVER["HTTP_FORWARDED"];
    }
    else
    {
        return $_SERVER["REMOTE_ADDR"];
    }
    }
}