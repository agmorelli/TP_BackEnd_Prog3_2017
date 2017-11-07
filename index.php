<?php
//use \Psr\Http\Message\ServerRequestInterface as Request; //define un alias
//use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';
require 'clases/AccesoDatos.php';
require 'clases/EmpleadoApi.php';

//$config['displayErrorDetails'] = true;
//$config['addContentLengthHeader'] = false;



$app = new \Slim\App(/*["settings" => $config]*/);

$app->group('/empleados', function () {
 
  $this->get('/', \EmpleadoApi::class . ':TraerTodos');
 
  $this->post('/', \EmpleadoApi::class . ':CargarUno');

  $this->get('/{id}', \EmpleadoApi::class . ':TraerUno');

  $this->delete('/', \cdApi::class . ':BorrarUno');

  /*$this->put('/', \cdApi::class . ':ModificarUno');*/
  
});


  
  
/*$app->get('/traerTodos', function($request, $response){
 // return Empleado::TraerEmpleadosBD();
  
  //$response->write($empleados);
  

});*/


/*
$app->group('/cd', function () {
 
  $this->get('/', \cdApi::class . ':traerTodos');
 
  $this->get('/{id}', \cdApi::class . ':traerUno');

  $this->post('/', \cdApi::class . ':CargarUno');

  $this->delete('/', \cdApi::class . ':BorrarUno');

  $this->put('/', \cdApi::class . ':ModificarUno');
  
})->add($VerificadorDeCredenciales);
*/
/* codifgo que se ejecuta antes que los llamados por la ruta*/
/*$app->add(function ($request, $response, $next) {
  $response->getBody()->write('<p>Antes de ejecutar UNO </p>');
  $response = $next($request, $response);
  $response->getBody()->write('<p>Despues de ejecutar UNO</p>');

  return $response;
});

$app->add(function ($request, $response, $next) {
  $response->getBody()->write('<p>Antes de ejecutar DOS </p>');
  $response = $next($request, $response);
  $response->getBody()->write('<p>Despues de ejecutar DOS</p>');

  return $response;
});
// despues de esto y llamando a la ruta cd/, el resultaso es este :*/
/*
Antes de ejecutar Dos ***
Antes de ejecutar UNO ***
TrearTodos
***Despues de ejecutar UNO
***Despues de ejecutar Dos
*/
/*habilito el CORS para todos*/
/*$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
            ->withHeader('Access-Control-Allow-Origin', 'http://localhost:4200')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
});


*/




$app->run();