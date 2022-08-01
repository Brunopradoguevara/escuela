<?php
include_once($_SERVER['DOCUMENT_ROOT']."/config/conexion.php"); 
/* include_once($_SERVER['DOCUMENT_ROOT']."/cursoPHP/escuela/config/conexion.php"); */

 class Grade extends Conexion{
    protected $table = "grade";
   // protected $hiden = ["fecha_cumpleaños"];
    protected $show = ["name_grade","pk_id"];
    protected $primary_key = "pk_id";
    protected $data =["pk_id","name_grade","fk_subject"]; 
}

/* $nuevoItem = new Grade(); */


/* var_dump($nuevoItem->all()); */