<?php
 include_once($_SERVER['DOCUMENT_ROOT']."/config/conexion.php"); 
  /* include_once($_SERVER['DOCUMENT_ROOT']."/cursoPHP/escuela/config/conexion.php");  */

 class Student extends Conexion{
    protected $table = "student";
   // protected $hiden = ["fecha_cumpleaños"];
    protected $show = ["pk_LRN","name","last_name","gender","nationality","average","phone_number","birth_day","fk_group_"];
    protected $primary_key = "pk_LRN";
    protected $data =["pk_LRN","name","last_name","gender","nationality","average","phone_number","birth_day","fk_group_"]; 
}

/* $nuevoStudent = new Student();


var_dump($nuevoStudent->all());

var_dump($nuevoStudent->delete(3)); 

$datos=array(1,"Bruno","Prado","5","mex","9.6","9998398305","1998-10-11",2);
var_dump($nuevoStudent->create($datos));  */  