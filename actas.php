<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$aAlumnos = array();
$aAlumnos[] = array("nombre" => "Juan Perez", "notas" => array(9, 8));
$aAlumnos[] = array("nombre" => "Ana valle", "notas" => array(4, 9));
$aAlumnos[] = array("nombre" => "Gonzalo Roldán", "notas" => array(7, 6));
$aAlumnos[] = array("nombre" => "gabriel luna", "notas" => array(8, 7));

function promediar($aNotas){
    $sumaTotal = 0;

    foreach ($aNotas as $nota) {
        $sumaTotal = $sumaTotal + $nota;
    }
    $promedio = $sumaTotal / count($aNotas);

    return $promedio;
}


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acta</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1>Actas</h1>
            </div>
            <div class="row">
                <table class="table table-hover border">
                    <thead>
                        <tr>
                            <th>Alumno</th>
                            <th>Nota 1</th>
                            <th>Nota 2</th>
                            <th>Promedio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($aAlumnos as $alumno) : ?>
                            <tr>
                                <td><?php echo $alumno["nombre"]; ?></td>
                                <td><?php echo $alumno["notas"][0]; ?></td>
                                <td><?php echo $alumno["notas"][1]; ?></td>
                                <td><?php echo promediar($alumno["notas"]); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

</body>

</html>