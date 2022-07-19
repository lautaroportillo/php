<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if($_POST){

    $nombre = $_POST["txtUsuario"];
    $dni = $_POST["txtDni"];
    $telenofo = $_POST ["txtTelefono"];
    $edad = $_POST ["txtEdad"];

    if($nombre == "lautaro" && $dni == "41546887" && $telefono == "1136402445" && $edad == "22"){
        header("Location: resultado.php");
    } else {
        $mensaje = "Valido para usuarios registrados.";
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulario de datos personales</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Formulario de datos personales</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <form action="resultado.php" method="POST">
                    <div class="py-3">
                        <label for="txtUsuario">Nombre:</label>
                        <input class="form-control" type="text" name="txtUsuario" id="txtUsuario">
                    </div>
                    <div class="py-3">
                        <label for="txtDNI">DNI:</label>
                        <input class="form-control" type="text" name="txtDNI" id="txtDNI">
                    </div>
                     <div class="py-3">
                        <label for="txtTelefono">Telefono:</label>
                        <input class="form-control" type="text" name="txtTelefono" id="txtTelefono">
                    </div>
                    <div class="py-3">
                        <label for="txtEdad">Edad:</label>
                        <input class="form-control" type="text" name="txtEdad" id="txtEdad">
                    </div>
                    <div class=" col-12 text-center py-3">
                        <a href="index.php" button class="btn btn-primary" type="submit">ENVIAR</button></a>
                    </div>   
                </form>
            </div>
        </div>
    </main>  
</body>
</html>