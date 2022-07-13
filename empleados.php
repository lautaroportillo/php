<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


//definicion de empleados
$aEmpleados = array();
$aEmpleados[] = array("dni" => 33300123, "nombre" => "David Garcia", "bruto" => 85000.30);
$aEmpleados[] = array("dni" => 40874456, "nombre" => "Ana Del Valle", "bruto" => 90000);
$aEmpleados[] = array("dni" => 67567565, "nombre" => "Andres Perez", "bruto" => 100000);
$aEmpleados[] = array("dni" => 75744545, "nombre" => "Victoria Luz", "bruto" => 70000);


function calcularNeto($bruto)
{
    return $bruto - ($bruto * 0.17);
}


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
            <div class="col-12 text-center py-5">
                <h1>Listado de empleados</h1>
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


                            <?php foreach ($aEmpleados as $empleado) {
                                print_r($empleado);
                                exit;
                            ?>
                                <tr>
                                    <td><?php echo $empleado["dni"]; ?></td>
                                    <td><?php echo mb_strtoupper($empleado  ["nombre"]); ?></td>
                                    <td>$<?php echo number_format ($empleado  ( CalcularNeto( $empleado ["bruto"])), 2 , ".", ","); ?></td>
                                </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p>cantidad de empleados activos: <?php echo count($aEmpleados);?></p>

                    </div>

                </div>
            </div>
        </dvi>
    </main>
</body>

</html>