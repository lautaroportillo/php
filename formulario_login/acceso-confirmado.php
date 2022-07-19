<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_POST) {

    $usuario = $_POST["txtUsuario"];
    $clave = $_POST["txtClave"];

    if ($usuario == "admin" && $clave == "123456") {
        header("location: ");
    }
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>acceso-confirmado</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12 py-5">
                <h1>Bienvenid@ al sistema</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="" method="POST">
                    <div class="alert alert-primary" role="alert">
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quasi praesentium totam accusamus quas a sequi, laborum repudiandae modi, voluptatibus temporibus enim inventore illo quam sed commodi animi, laboriosam doloremque dolorum.</p>
                    </div>
                    <div class="py-3">
                        <button class="btn btn-primary" type="submit">Salir</button>
                    </div>

                </form>
            </div>
        </div>
    </main>

</body>

</html