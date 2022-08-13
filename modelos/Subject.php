<?php

include_once($_SERVER['DOCUMENT_ROOT']."/config/conexion.php");
   
 class Subject extends Conexion{
    protected $table = "subject";
   // protected $hiden = ["fecha_cumpleaños"];
    protected $show = ["teacher","pk_id","name_subjects"];
    protected $primary_key = "pk_id";
    protected $data =["pk_id","teacher","name_subjects"]; 
   
}

/* $nuevoItem = new Subject(); */


/* var_dump($nuevoItem->all());
var_dump($nuevoItem->delete(3)); */

 /*  $datas=array('pk_id'=>2,'teacher'=>"Pedrito",'name_subjects'=>"quimica");
   var_dump($nuevoItem->update($datas,2));   */ 



     /* $datos=array('pk_id'=>9,'teacher'=>"Pepe",'name_subjects'=>"Fisic");
   var_dump($nuevoItem->create($datos));     */
   








/* public function update(string $cambio,string $subject,int $id){
    $sql = "UPDATE ".$this->table." SET teacher =?, name_subjects = ?  WHERE ". $this->primary_key. "= ?";
    $query = $this->db->prepare($sql);
    if(!empty($id)){  
      $execute = $query->execute([$cambio,$subject,$id]);
        if($execute){
         return true;
        }
     } 
     return false;
  }

  public function create(int $id,string $cambio,string $subject){ 
    $sql = "INSERT INTO ".$this->table." VALUES (?,?,?)";
    $query = $this->db->prepare($sql);
    if(!empty($id)){
      $execute = $query->execute([$id,$cambio,$subject]);
        if($execute){
         return true;
        }
     } 
     return false;
  } */