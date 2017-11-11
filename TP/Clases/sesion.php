<?php
include_once "AccesoDatos.php";
class Sesion
{
    private $id;
    public $fechaInicio;
    public $idEmpleado;

    public function __construct($fechaInicio= NULL, $idEmpleado= NULL)
    {
        if($fechaInicio!==NULL && $idEmpleado!== NULL)
        {
        $this->fechaInicio=$fechaInicio;
        $this->idEmpleado=$idEmpleado;
        }
    }

    public function GetId()
    {
        return $this->id;
    }


    public function GuadarSesionBd()
    {
        $accesoDatos=AccesoDatos::DameUnObjetoAcceso();
        $consulta=$accesoDatos->RetornarConsulta('INSERT INTO sesiones(fechainicio, idEmpleado) VALUES (:fechaInicio, :idEmpleado)');
        $consulta->bindvalue(':fechainicio', $this->fechainicio,PDO::PARAM_STR  );
        $consulta->bindvalue(':idEmpleado', $this->idEmpleado,PDO::PARAM_STR  );

        $consulta->execute();
        return true;
    }
}
?>