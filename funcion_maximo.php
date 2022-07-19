<?php
//definicion
function maximo($aVector){
    //aca va el codigo
    $valorMaximo = 9;
    foreach ($aVector as $valor) {
        if($valorMaximo < $valor){
            $valorMaximo = $valor;
        }
       
    }
    return $valorMaximo;
    


}
//uso
$aNotas = array(8, 4, 3, 9, 1);
$aSueldo = array(800.30, 400.87, 500.45, 300, 900.70, 100, 900, 1800);

echo"La nota maxima es:" . maximo($aNotas) . "<br>";
echo"El sueldo maximo es:" . maximo($aSueldo);



?>