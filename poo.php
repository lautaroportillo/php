<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


class persona{
    protected $dni;
    protected $nombre;
    protected $edad;
    protected $nacionalidad;

    public function imprimir(){}

}
//Programa
class Alumno extends Persona{
    public $legajo;
    public $notaPortfolio;
    public $notaPhp;
    public $notaProyecto;

    public function __construct()
    {
      $this->notaPortfolio = 0.0;
        $this->notaPhp = 0.0;
        $this->notaProyecto = 0.0;  
    }

    public function imprimir(){
        echo "DNI:" . $this->dni . "<br>";
        echo "Nombre:" . $this->nombre . "<br>";
        echo "Edad:" . $this->edad . "<br>";
        echo "Nacionalidad:" . $this->nacionalidad . "<br>";
        echo "Nota PHP: " . $this->notaPhp . "<br>";
        echo "Nota Portfolio: " . $this->notaPortfolio . "<br>";
        echo "Nota Proyecto: " . $this->notaProyecto . "<br>";
        echo "Promedio:" . number_format($this->calcularPromedio(), 2, ".", ",") . "<br><br>";
    }


    public function calcularPromedio(){       
        return($this->notaPhp + $this->notaPortfolio + $this->notaProyecto)/3;
    }
}
    
    
class Docente extends Persona
{
    public $especialidad;
    const ESPECIALIDAD_WP = "Wordpress";
    const ESPECIALIDAD_ECO = "Economía aplicada";
    const ESPECIALIDAD_BBDD = "Base de datos";

    public function __construct($dni="", $nombre="", $edad="", $nacianalidad=""){
        $this->dni = $dni;
    }
   

    public function __destruct()
    {
        echo "Destruyendo el objeto" . $this->nombre . "<br>";
    }

    public function setDni($dni){ $this->dni = $dni; }
    public function getDni(){ return $this->dni; }

    public function setNombre($nombre){ $this->nombre = $nombre;}
    public function getNombre(){ return $this->nombre; }
    
    public function setNacionalidad($nacionalidad){ $this->nacionalidad = $nacionalidad; }
    public function getNacionalidad(){ return $this->nacionalidad; }
    
    public function setEdad($edad){ $this->edad = $edad; }
    public function getEdad(){ return $this->edad; }


    public function imprimir(){}


    public function imprimirEspecalidadesHabilitadas(){
        echo "Un docente puede tener las siguientes especialidades:<br>";
        echo "Especialidad 1:";
        echo "especialidad 2:";
        echo "Especialidad 3:";
    }
  
}

$alumno1 = new Alumno();
$alumno1->dni = "41546887";
$alumno1->nombre = "Lautaro Portillo";
$alumno1->notaPhp = 9;
$alumno1->notaPortfolio = 8;
$alumno1->notaProyecto = 8;
$alumno1->imprimir();

$alumno2 = new Alumno();
$alumno2->dni = "41546887";
$alumno2->nombre = "Lautaro Portillo";
$alumno2->notaPhp = 9;
$alumno2->notaPortfolio = 8;
$alumno2->notaProyecto = 8;
$alumno2->imprimir();



?>