<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Si existe el archivo invitados lo abrimos y cargamos una variable del tipo array
//los DNI permitidos
if(file_exists("invitados.txt")){
    $archivo = fopen("invitados.txt", "r");
    $aDocumentos = fgetcsv($archivo, 0, ",");

} else {
    //Sino el array queda como un array vacio
    $aDocumentos = array();
}




if($_POST){
    
    if(isset($_POST["btnProcesar"])){
        $aDocumento = $_REQUEST["txtDocumento"];
        //Si el DNI ingresado se encuentra en la lista se mostrara un mensaje de bienvenido
        if(in_array($documento, $aDocumentos)){
            $mensaje = "Bienvenido";
        } else { 
            //Sino un mensaje de No se encuentra en la lista de invitados.
            $mensaje = "no se encuentra en la lista de invitados.";
        }    

    }

    if(isset($_POST["btnVip"])){
        $codigo = $_REQUEST["txtCodigo"];
        //Si el codigo "verde" entonces mostrara Su código de acceso es ....
        if($codigo == "verde"){
            $mensaje = "su codigo de acceso es " . rand(1000, 9999);
        } else{
            $mensaje = "Sino Ud. no tiene pase VIP";
        }



        //Sino Ud. no tiene pase VIP
    }
}






?>