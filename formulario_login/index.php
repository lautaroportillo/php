<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if($_POST){

    $usuario = $_POST["txtUsuario"];
    $clave = $_POST["txtClave"];

    if($usuario == "admin" && $clave == "123456"){
        header("Location: acceso-confirmado.php");
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
    <title>formulario</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Formulario</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <?php if (isset ($mensaje)); ?>
                <div class="alert alert-danger" role="alert">
                <?php echo $mensaje; ?>
              </div>
              <?php  ?> 
                <form action="" method="POST">
                    <div class="py-3">
                        <label for="txtUsuario">Usuario:</label>
                        <input class="form-control" type="text" name="txtUsuario" id="txtUsuario">
                    </div>
                    <div class="py-3">
                        <label for="txtClave">Clave:</label>
                        <input class="form-control" type="text" name="txtClave" id="txtClave">
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