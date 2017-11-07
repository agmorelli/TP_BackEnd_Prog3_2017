<?php
include_once "AccesoDatos.php";

class Empleado
{
    private $id;
    public $nombre;
    public $apellido;
    public $turno;
    public $clave;
    public $mail;
    public $perfil;
    //public $estado;
    public $fechaCreacion;
    public $foto;

    /*public function __construct($nombre=NULL, $apellido=NULL, $turno=NULL, $clave=NULL, $mail=NULL, $perfil=NULL, $fechaCreacion=NULL, $foto=NULL)
    {
        if ($nombre !== NULL && $apellido!==NULL && $turno !== NULL && $clave !== NULL && $mail!==NULL && $perfil !== NULL && $fechaCreacion !== NULL && $foto !== NULL) 
        {

        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->turno=$turno;
        $this->clave=$clave;
        $this->mail=$mail;
        $this->perfil=$perfil;
        $this->fechaCreacion=$fechaCreacion;
        $this->foto=$foto;
      

        }
        

    }*/

    public function GetId()
    {
        return $this->id;
    }
    public function SetId( $id)
    {
        $this->id=$id;
    }

    public function GetNombre()
    {
        return $this->nombre;
    }

    public function GetTurno()
    {
        return $this->turno;
    }

    public function GetClave()
    {
        return $this->clave;
    }

    public static function TraerEmpleadosBD()
    {
        $accesoDatos=AccesoDatos::DameUnObjetoAcceso();
        $consulta=$accesoDatos->RetornarConsulta("SELECT * FROM empleados");
        $consulta->execute();
        $listaEmpleados=array();
        while($empleado=$consulta->FetchObject("Empleado"))
        {
            array_push($listaEmpleados,$empleado);
        }
        

        return $listaEmpleados;
    }


    public function GuardarEmpleadoBD()
    {


        $accesoDatos=AccesoDatos::DameUnObjetoAcceso();
        $consulta=$accesoDatos->RetornarConsulta('INSERT INTO empleados(nombre, apellido, turno, clave, mail, perfil, fechaCreacion, foto) VALUES (:nombre, :apellido, :turno, :clave, :mail, :perfil, :fechaCreacion, :foto)');
        $consulta->bindvalue(':nombre', $this->nombre,PDO::PARAM_STR  );
        $consulta->bindvalue(':apellido', $this->apellido,PDO::PARAM_STR  );
        $consulta->bindvalue(':turno', $this->turno,PDO::PARAM_STR  );
        $consulta->bindvalue(':clave', $this->clave,PDO::PARAM_LOB  );
        $consulta->bindvalue(':mail', $this->mail,PDO::PARAM_STR  );
        $consulta->bindvalue(':perfil', $this->perfil,PDO::PARAM_STR  );
        $consulta->bindvalue(':fechaCreacion', $this->fechaCreacion,PDO::PARAM_STR  );
        $consulta->bindvalue(':foto', $this->foto,PDO::PARAM_STR  );
        $consulta->execute();
        return true;
        
        
    }
/*
    public static function ModificarPorId($nombre, $id)
    {
        $accesoDatos=AccesoDatos::DameUnObjetoAcceso();
        $consulta=$accesoDatos->RetornarConsulta('UPDATE empleados SET nombre=:nombre WHERE id=:id');
        $consulta->bindvalue(':nombre', $nombre,PDO::PARAM_STR  );
        $consulta->bindvalue(':id', $id,PDO::PARAM_INT  );
        $consulta->execute();
        
        
    }*/


    public static function TraerUnEmpleado($id)
    {
        $accesoDatos=AccesoDatos::DameUnObjetoAcceso();
        $consulta=$accesoDatos->RetornarConsulta('SELECT * FROM `empleados` WHERE id=:id');
        $consulta->bindvalue(':id', $id,PDO::PARAM_INT);
        $consulta->execute();
        $empleado=$consulta->FetchObject("Empleado");
        
        return $empleado;

    }

   /* public static function SuspenderEmpleado($nombre)
    {
        $accesoDatos=AccesoDatos::DameUnObjetoAcceso();
        $consulta=$accesoDatos->RetornarConsulta('UPDATE empleados SET estado=Suspendido WHERE nombre=:nombre');
        $consulta->bindvalue(':nombre', $nombre,PDO::PARAM_STR );
        $consulta->execute();
    }

    //////// METODOS PARA ARCHIVOS TXT ////////

    public function GuardarEmpleadoTxt()
    {
        $archivo= fopen("Empleados.txt","a");
        
        fwrite($archivo,$this->ToString());
        
        fclose($archivo);
}

    }

    public static function ToString()
    {
        return $this->nombre ."-". $this->$apellido ."-". $this->turno ."-". $this->clave ."-". $this->mail ."-". $this->perfil ."-". $this->fechaCreacion ."-". $this->foto ."-". "\r\n";
    }


*/




}

?>