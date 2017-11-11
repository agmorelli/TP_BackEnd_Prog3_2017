<?php
require_once 'Empleado.php';


class EmpleadoApi extends Empleado
{
 	public function TraerUno($request, $response, $args) {
     	$id=(int)$args['id'];

    	$empleado=Empleado::TraerUnEmpleado($id);
     	$newResponse = $response->withJson($empleado, 200);  

		 
    	return $newResponse;
    }


     public function TraerTodos($request, $response, $args) {
      	$listaEmpleados=Empleado::TraerEmpleadosBD();
		  
     	$newResponse = $response->withJson($listaEmpleados, 200);  
    	return $newResponse;
    }


      public function CargarUno($request, $response, $args) {
     	 $ArrayDeParametros = $request->getParsedBody();
        
        $nombre= $ArrayDeParametros['nombre'];
        $apellido= $ArrayDeParametros['apellido'];
        $turno= $ArrayDeParametros['turno'];
		$mail= $ArrayDeParametros['mail'];
		$clave= $ArrayDeParametros['clave'];
		$perfil= $ArrayDeParametros['perfil'];
		$fechaCreacion= $ArrayDeParametros['fechaCreacion'];


        $archivos = $request->getUploadedFiles();
        $carpetaDestino="./fotos/";
        $nombreAnterior=$archivos['foto']->getClientFilename();
        $extension= explode(".", $nombreAnterior)  ;
        $extension=array_reverse($extension);
		$nuevaUbicacion=$carpetaDestino.$nombre.$apellido.".".$extension[0];
		
		$empleado = new Empleado($nombre, $apellido, $turno, $clave, $mail, $perfil, $fechaCreacion, $nuevaUbicacion);
		
		$empleado->GuardarEmpleadoBD();    
		
		$archivos['foto']->moveTo($nuevaUbicacion);
   

        $response->getBody()->write("Empleado Guardado");

        return $response;
    }


      public function BorrarUno($request, $response, $args) {
     	$ArrayDeParametros = $request->getParsedBody();
     	$id=(int)$ArrayDeParametros['id'];
		 var_dump($id);
     	$cantidadDeBorrados=Empleado::BorrarUnEmpleado($id);
     	
     	
     	$objDelaRespuesta= new stdclass();
	    $objDelaRespuesta->cantidad=$cantidadDeBorrados;
	    if($cantidadDeBorrados>0)
	    	{
	    		 $objDelaRespuesta->resultado="algo borro!!!";
	    	}
	    	else
	    	{
	    		$objDelaRespuesta->resultado="no Borro nada!!!";
	    	}
	    $newResponse = $response->withJson($objDelaRespuesta, 200);  
		var_dump($newResponse);
      	return $newResponse;
    }
     
     /*public function ModificarUno($request, $response, $args) {
     	//$response->getBody()->write("<h1>Modificar  uno</h1>");
     	$ArrayDeParametros = $request->getParsedBody();
	    //var_dump($ArrayDeParametros);    	
	    $micd = new cd();
	    $micd->id=$ArrayDeParametros['id'];
	    $micd->titulo=$ArrayDeParametros['titulo'];
	    $micd->cantante=$ArrayDeParametros['cantante'];
	    $micd->año=$ArrayDeParametros['anio'];

	   	$resultado =$micd->ModificarCdParametros();
	   	$objDelaRespuesta= new stdclass();
		//var_dump($resultado);
		$objDelaRespuesta->resultado=$resultado;
		return $response->withJson($objDelaRespuesta, 200);		
    }*/


}