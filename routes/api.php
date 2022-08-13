<?php

require 'config/routing.php';
require 'controladores/SubjectController.php';
require 'controladores/studentController.php';
 require 'controladores/groupController.php';
require 'controladores/gradeController.php';  

$router = new Routing();

$router->get('/', function(){
  echo "Hola Mundo - Esta es una ruta simple";
});

//de esta manera llamamos una funcion dentro de una clase
//class @ method

/* Subject */
$router->get('/api/subject','SubjectController@index');

$router->post('/api/subject/delete/:id','SubjectController@delete');

$router->post('/api/subject/create','SubjectController@create');

$router->put('/api/subject/update','SubjectController@update');

/* Student */
$router->get('/api/student','StudentController@index');

$router->post('/api/student/delete/:id','StudentController@delete');

$router->post('/api/student/create','StudentController@create');

$router->put('/api/student/update','StudentController@update');

/* Group */
$router->get('/api/group','GroupController@index');

$router->post('/api/group/delete/:id','GroupController@delete');

$router->post('/api/group/create','GroupController@create');

$router->put('/api/group/update','GroupController@update');

/* Grade */
$router->get('/api/grade','GradeController@index');

$router->post('/api/grade/delete/:id','GradeController@delete');

$router->post('/api/grade/create','GradeController@create');

$router->put('/api/grade/update','GradeController@update');





$router->run();

?>