<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// Definicion de pacientes
$aPacientes=array();

$aPacientes[] = array(
    "dni" => "33.765.012",
    "nombre" => "Ana acuña",
    "edad" => 45,
    "peso" => 81.50
);
$aPacientes[] = array(
    "dni" => "33.765.012",
    "nombre" => "Ana acuña",
    "edad" => 45,
    "peso" => 81.50
);
$aPacientes[] = array(
    "dni" => "33.765.012",
    "nombre" => "Ana acuña",
    "edad" => 45,
    "peso" => 81.50
);
$aPacientes[] = array(
    "dni" => "33.765.012",
    "nombre" => "Ana acuña",
    "edad" => 45,
    "peso" => 81.50
);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12">
               <h1>Listado de paciente</h1> 
            </div>
        </div>
        <div class="row">
            <table class="table table-hover border">
                <thead>
                    <tr>
                        <th>dni</th>
                        <th>nombre</th>
                        <th>edad</th>
                        <th>peso</th>
                    </tr>
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

    </main>
    
</body>
</html>