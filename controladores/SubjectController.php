<?php

require_once($_SERVER['DOCUMENT_ROOT']."/modelos/subject.php");     


class SubjectController{
  
   
  
  static public function index(){
    $response = array(
        'code'=>200,
        'message'=>'Solicitud satisfactoria',
        'data'=> []
    );
    
    try{
        $item = new Subject();
        $response['data'] = $item->all();
        
    }catch(Exception $e){
        $response['code'] = 500;
        $response['message'] = 'Excepción capturada: '.  $e->getMessage();
    }
    return $response;
    
  } 
}
