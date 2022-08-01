<?php

require_once($_SERVER['DOCUMENT_ROOT']."/modelos/Student.php");      
require_once("BaseController.php");
require_once("Request.php");


class StudentController extends BaseController{
  
    
  
   public function index(){
    $response = array(
        'code'=>200,
        'message'=>'Solicitud satisfactoria',
        'data'=> []
    );
    
    try{
        $item = new Student();
        $response['data'] = $item->all();
        
    }catch(Exception $e){
        $response['code'] = 500;
        $response['message'] = 'Excepción capturada: '.  $e->getMessage();
    }
    return $this->responseJson($response,$response["code"]);
  } 

   public function delete($params){
    $response = array(
        'code'=>201,
        'message'=>'Solicitud satisfactoria',
        'data'=> []
    );
    
    try{
        $item = new Student();
        $response['data'] = $item->delete($params["id"]);
        
    }catch(Exception $e){
        $response['code'] = 500;
        $response['message'] = 'Excepción capturada: '.  $e->getMessage();  
    }
    return $this->responseJson($response,$response["code"]);
    
  } 

   public function update(){
    $response = array(
        'code'=>202,
        'message'=>'Solicitud satisfactoria',
        'data'=> []
    );
    
    try{
        $request = new Request();
        $item = new Student();
        $response['data'] = $item->update($request->all(),$request->pk_LRN);
        
    }catch(Exception $e){
        $response['code'] = 500;
        $response['message'] = 'Excepción capturada: '.  $e->getMessage();
    }
    return $this->responseJson($response,$response["code"]);
    
  }

   public function create(){
    $request = new Request();
    $response = array(
        'code'=>203,
        'message'=>'Solicitud satisfactoria',
        'data'=> []
    );
    
    try{
        $item = new Student();
        $response['data'] = $item->create($request->all());
        
    }catch(Exception $e){
        $response['code'] = 500;
        $response['message'] = 'Excepción capturada: '.  $e->getMessage();
    }
    return $this->responseJson($response,$response["code"]);
    
  }

}

/* $item = new StudentController(); */


/* $datas=array('pk_id'=>8,'teacher'=>"Juan",'name_Students'=>"quimica"); */

/* var_dump($item->delete(2));  */
