<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function contar($aArray)
{
    $contador = 0;
    foreach ($aArray as $item) {
        $contador++;
    }
    return $contador;
}



$aNotas = array(9, 8, 9.50, 4, 7, 8);

$aPacientes = array();
$aPacientes[] = array(
    "dni" => "33.765.012",
    "nombre" => "Ana Acuña",
    "edad" => 45,
    "peso" => 81.50,
);
$aPacientes[] = array(
    "dni" => "23.684.385",
    "nombre" => "Gonzalo Bustamante",
    "edad" => 66,
    "peso" => 79,
);
$aPacientes[] = array(
    "dni" => "11.568.778",
    "nombre" => "Martín Perez",
    "edad" => 26,
    "peso" => 77,
);

$aProductos = array();
$aProductos[] = array(
    "nombre" => "Smart TV 55\" 4K UHD",
    "marca" => "Hitachi",
    "modelo" => "554KS20",
    "stock" => 60,
    "precio" => 58000,
);
$aProductos[] = array(
    "nombre" => "Samsung Galaxy A30 Blanco",
    "marca" => "Samsung",
    "modelo" => "Galaxy A30",
    "stock" => 0,
    "precio" => 22000,
);
$aProductos[] = array(
    "nombre" => "Aire Acondicionado Split Inverter Frío/Calor Surrey 2900F",
    "marca" => "Surrey",
    "modelo" => "553AIQ1201E",
    "stock" => 5,
    "precio" => 45000,
);

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Empleados</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <main class="container">
        <dvi class="row">
            <div class="col-12 text-center">
                <h1 class="py-5">Listado de empleados</h1>
            </div>
            <div class="row">
                <div class="col-12">
                    <table class="table table-hover border">
                        <thead>
                            <tr>
                                <th>DNI</th>
                                <th>Nombre</th>
                                <th>Sueldo</th>
                        </thead>
                        <tbody>


                        <?php foreach ($pacientes as $paciente ) {?>
                        <tr>
                        <td><?php echo $aPacientes [$i] ["dni"]; ?></td>
                        <td><?php echo $aPacientes [$i] ["nombre"]; ?></td>
                        <td><?php echo $aPacientes [$i] ["edad"]; ?></td>
                        <td><?php echo $aPacientes [$i] ["peso"]; ?></td>
                    </tr>
                    <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p>La sumatoria de los precios de los productos es: <?php echo $sumatoriaprecios ?></p>

                    </div>

                </div>
            </div>
        </dvi>
    </main>
</body>

</html>
