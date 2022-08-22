<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Persona{
    protected $dni;
    protected $nombre;
    protected $correo;
    protected $celular;


    public function __get($propiedad) {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor) {
        $this->$propiedad = $valor;
    }
}

class Cliente extends Persona{
    private $aTarjetas = array();
    private $bActivo = true;
    private $fechaAlta;
    private $fechaBaja;

    public function __construct()
    {
        $this->aTarjetas = array ();
        $this->bActivo = true;
        $this->fechaAlta;
    }

    public function __get($propiedad) {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor) {
        $this->$propiedad = $valor;
    }

    public function agregarTarjeta($tarjeta){

        $this->tarjeta [] = $tarjeta;
    }

    public function darDeBaja($fecha){
        $this->fechaBaja = date_format(date_create($fecha), "d/m/Y");
        $this->bActivo = false; //Baja logica
    }


    public function imprimir(){

    }
}

class Tarjeta{
   private $nombreTitular;
   private $numero;
   private $fechaEmision;
   private $fechaVto;
   private $tipo;
   private $cvv; 

   const VISA = "VISA";
   const MASTERCARD = "Mastercard";
   const AMEX = "America Express";
   const CABAL = "CABAL";

   public function __get($propiedad) {
    return $this->$propiedad;
}

public function __set($propiedad, $valor) {
    $this->$propiedad = $valor;
}
}


//Desarrollo del programa
$cliente1 = new Cliente();
$cliente1->dni = "35123789";
$cliente1->nombre = "Ana Valle";
$cliente1->correo = "ana@correo.com";
$cliente1->celular = "1156781234";
$tarjeta1 = new Tarjeta(Tarjeta::VISA, "4223750778806383", "01/2023", "275");
$tarjeta2 = new Tarjeta(Tarjeta::AMEX, "347572886751981", "07/2027", "136");
$tarjeta3 = new Tarjeta(Tarjeta::MASTERCARD, "5415620495970009", "12/2024", "742");
$cliente1->agregarTarjeta($tarjeta1);
$cliente1->agregarTarjeta($tarjeta2);
$cliente1->agregarTarjeta($tarjeta3);

$cliente2 = new Cliente();
$cliente2->dni = "48456876";
$cliente2->nombre = "Bernabe Paz";
$cliente2->correo = "bernabe@correo.com";
$cliente2->celular = "1145326787";
$cliente2->agregarTarjeta(new Tarjeta(Tarjeta::VISA, "4969508071710316", "08/2025", "865"));
$cliente2->agregarTarjeta(new Tarjeta(Tarjeta::MASTERCARD, "5149107669552238", "04/2025", "554"));
$cliente->darDeBaja(Date("23/8/2022"));

?>