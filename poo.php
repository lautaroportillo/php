<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


class persona{
    public $dni;
    public $nombre;
    public $edad;
    public $nacionalidad;

    public function imprimir(){}

}
class Alumno extends Persona{
    public $legajo;
    public $notaPortfolio;
    public $notaPhp;
    public $notaProyecto;

    public function __construct(){
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

    public function imprimir(){}
    public function imprimirEspecalidadesHabilitadas(){}
  
}

$alumno = new Alumno();
$alumno->dni = "41546887";
$alumno->nombre = "Lautaro Portillo";
$alumno->notaPhp = 9;
$alumno->notaPortfolio = 8;
$alumno->notaProyecto = 8;
$alumno->imprimir();

?>