<?php
require_once($_SERVER['DOCUMENT_ROOT']."/config/routing.php");

require_once($_SERVER['DOCUMENT_ROOT']."/controladores/SubjectController.php");

$router = new Routing();

$router->add('/',function(){
  echo "Hola Mundo - Esta es una ruta simple";
});

//de esta manera llamamos una funcion dentro de una clase
//class @ method
$router->add('/subject','SubjectController@index');

$router->run();

?>