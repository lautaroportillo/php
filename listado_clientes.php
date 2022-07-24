<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


session_start();

if(isset($_SESSION["listadoClientes"])){
    //Si existe la variable de session listadoClientes asigno su contenido a aClientes
    $aClientes = $_SESSION["listadoClientes"];
}else{
    $aClientes = array();
}

if ($_POST){

    //Asignamos en variables los datos que vienen del formulario
    $nombre = $_POST["txtNombre"];
    $dni = $_POST["txtDni"];
    $telefono = $_POST["txtTelefono"];
    $edad = $_POST["txtEdad"];

//creamos un array que contendra el listado de clientes

$aClientes[] = array("nombre" => $nombre,
                     "dni" => $dni,
                      "telefono" => $telefono,
                       "edad" => $edad
);
//actualiza el contenido de variable de session
$_SESSION["listadoClientes"] = $aClientes;

}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Listado de clientes</title>
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Listado de clientes</h1>
            </div>
            <div class="row">
                <div class="col-4">
                    <form method="POST">
                        <div class="my-3">
                            <table for="">Nombre:</table>
                            <input type="text" id="txtNombre" name="txtNombre" class="form-control">
                        </div>
                        <div class="my-3">
                            <table for="">DNI:</table>
                            <input type="text" id="txtDni" name="txtDni" class="form-control">
                        </div>
                        <div class="my-3">
                            <table for="">Telefono:</table>
                            <input type="text" id="txtTelefono" name="txtTelefono" class="form-control">
                        </div>
                        <div class="my-3">
                            <table for="">Edad:</table>
                            <input type="text" id="txtEdad" name="txtEdad" class="form-control">
                        </div>
                        <div class="my-3">
                            <button type="submit" name="btnEnviar" class="btn btn-primary text-white">ENVIAR</button>
                            <button type="submit" name="btnEliminar" class="btn btn-danger text-white">ELIMINAR</button>
                        </div>
                    </form>
                </div>
                <div class="col-8">
                    <table class="table table-hover border shadow py-5 px-">
                        <thead>
                            <tr>
                                <th>Nombre:</th>
                                <th>DNI:</th>
                                <th>Telefono:</th>
                                <th>Edad:</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($aClientes as $cliente): ?>
                            <tr>
                                <td><?php echo $cliente["nombre"]; ?></td>
                                <td><?php echo $cliente["dni"]; ?></td>
                                <td><?php echo $cliente["telefono"]; ?></td>
                                <td><?php echo $cliente["edad"]; ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</body>

</html>