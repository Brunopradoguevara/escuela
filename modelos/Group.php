<?php
 include_once($_SERVER['DOCUMENT_ROOT']."/config/conexion.php"); 
 /* include_once($_SERVER['DOCUMENT_ROOT']."/cursoPHP/escuela/config/conexion.php");  */

 class Group extends Conexion{
    protected $table = "group_";
   // protected $hiden = ["fecha_cumpleaños"];
    protected $show =["pk_id","nomber_group","size_group","fk_grade"]; 
    protected $primary_key = "pk_id";
    protected $data =["pk_id","nomber_group","size_group","fk_grade"]; 
   
}

/* $nuevoItem = new Group();


var_dump($nuevoItem->all()); */