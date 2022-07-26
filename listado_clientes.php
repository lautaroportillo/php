<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


session_start();

if (isset($_SESSION["listadoClientes"])) {
    //Si existe la variable de session listadoClientes asigno su contenido a aClientes
    $aClientes = $_SESSION["listadoClientes"];
} else {
    $aClientes = array();
}

if ($_POST) {
    //si hace click en enviar
    if (isset($_POST["btnEnviar"])) {
        //Asignamos en variables los datos que vienen del formulario
        $nombre = $_POST["txtNombre"];
        $dni = $_POST["txtDni"];
        $telefono = $_POST["txtTelefono"];
        $edad = $_POST["txtEdad"];

        //creamos un array que contendra el listado de clientes

        $aClientes[] = array(
            "nombre" => $nombre,
            "dni" => $dni,
            "telefono" => $telefono,
            "edad" => $edad
        );
        //actualiza el contenido de variable de session
        $_SESSION["listadoClientes"] = $aClientes;
    }
    //si hace click en eliminar
    if (isset($_POST["btnEliminar"])) {
        session_destroy();
        $aClientes = array();
    }
}

if (isset($_GET["pos"])) {
    //Recupero el dato que viene desde la query string via get
    $pos = $_GET["pos"];
    //Elimina la posicion del array indicada
    unset($aClientes[$pos]);
    //Actualizo l avariable de session con el array actualizado
    $_SESSION["listadoClientes"] = $aClientes;
    header("Location: listado_clientes.php");
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
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
                    <form method="POST" action="">
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
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($aClientes as $pos => $cliente) : ?>
                                <tr>
                                    <td><?php echo $cliente["nombre"]; ?></td>
                                    <td><?php echo $cliente["dni"]; ?></td>
                                    <td><?php echo $cliente["telefono"]; ?></td>
                                    <td><?php echo $cliente["edad"]; ?></td>
                                    <td><a href="listado_clientes.php?pos=<?php echo $pos; ?>"><i class="bi bi-trash"></i></a></td>
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