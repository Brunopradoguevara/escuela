<?php

 abstract class Conexion{
  public $db = null;
  protected $table;
  protected $show;
  protected $primary_key;
  protected $data;

  function __construct(){
    $credentials = require $_SERVER['DOCUMENT_ROOT']."/configuration.php";
    $host = $credentials['dataBase']['host'];
    $dbname = $credentials['dataBase']['dbname'];
    $username = $credentials['dataBase']['username'];
    $pass = $credentials['dataBase']['pass']; 
    

  try {
      $conn = new PDO ("mysql:host=$host;dbname=$dbname",$username,$pass);
      /* echo "Se conecto correctamente a la base de datos"; */
      $this->db = $conn;
  } catch (PDOException $exp) {
      echo "No se logro conectar correctamente con la base de datos: $dbname, error: $exp";
  }
  return $conn;
}
 
  public function all(){
    $sql ="select ".implode(',' , $this->show)." from ".$this->table;
    $query =$this->db->query($sql);
    return $query->fetchAll();
  }
  public function delete($id){
    $sql = "delete from ".$this->table." where ".$this->primary_key. "= ?"  ;
    $query = $this->db->prepare($sql);
    if(!empty($id)){
     $execute = $query->execute([$id]);
       if($execute){
        return true;
       }
    } 
    return false;
  }
  
  public function update($new_data,$id){
    $item=[];
    
    foreach($this->data as $key){
     if($new_data[$key]){
       array_push($item,$new_data[$key]);
     }
    };
    array_push($item,$id);
    $sql = "UPDATE ".$this->table." SET ".implode('=?,' , $this->data)."=? WHERE ". $this->primary_key. "= ?";
    $query = $this->db->prepare($sql);
    if(!empty($id)){  
      $execute = $query->execute($item);
        if($execute){
         return true;
        }
     } 
     return false;
  }

  public function create($new_data){ 
     $valores=[];
     $item=[];
     foreach($this->data as $key){
      $valor= "?";
      if($new_data[$key]){
        array_push($valores,$valor);
        array_push($item,$new_data[$key]);
      }
     };
    $sql = "INSERT INTO ".$this->table." (".implode(',' , $this->data).") " ."VALUES(".implode(',', $valores).")";
    $query = $this->db->prepare($sql);
    if(!empty($item[0])){
      $execute = $query->execute($item);
        if($execute){
         return true;
        }
     } 
     return false;
  }
  
  /* abstract protected function select();
  abstract protected function update();
  abstract protected function create(); */

}
/* $sql = "UPDATE users SET name=?, surname=?, sex=? WHERE id=?";
$stmt= $pdo->prepare($sql);
$stmt->execute([$name, $surname, $sex, $id]); */



?>