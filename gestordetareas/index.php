<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (file_exists("archivo.txt")){
    //si el archivo existe, carlo la tarea en la variable aTareas
    $strJson = file_get_contents("archivo.txt");
    $aTareas = json_decode($strJson, true);
} else{
    //Si el archivo no existe es por que no hay tareas
    $aTareas = array();
}

if(isset ($_GET["id"]) && $_GET["id"] >= 0){
    $id = $_GET["id"];
} else{
    $id = "";
}

if($_POST){
    $titulo = $_POST["txtTitulo"];
    $prioridad = $_POST["txtPrioridad"];
    $usuario = $_POST["txtUsuario"];
    $estado = $_POST["txtEstado"];
    $descripcion = $_POST["txtDescripcion"];

    if($id >= 0){
        //Estoy editando una tarea
        $aTareas[$id] = array(
            "fecha" => $aTareas [$id]["fecha"],
            "prioridad" => $prioridad,
            "usuario" => $usuario,
            "estado" => $estado,
            "descripcion" => $descripcion
        );

    } else {
        //Estoy insertando una tarea
        $aTareas[$id] = array(
            "fecha" => date("d/m/y"),
            "prioridad" => $prioridad,
            "usuario" => $usuario,
            "estado" => $estado,
            "descripcion" => $descripcion
        );
    }

    //convertir el array de aTareas en json
    $strJson = json_encode($aTareas);

    //Almacenar en un archivo.txt el json con file_put_contents
    file_put_contents("archivo.txt" , $strJson);
}
if(isset($_GET["do"]) && $_GET["do"] == "eliminar") {
    unset($aTareas[$id]);

    //convertir aTareas en json
    $strJson = json_encode($aTareas);

    //Almacenar el json en el archivo
    file_put_contents("archivo.txt", $strJson);

    header("Location: index.php");

}






?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>Gestor de Tareas</title>
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Gestor de Tareas</h1>
            </div>
            <div class="row">
                <div class="col-12">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="col-12 my-3">
                            <div class="col-4">
                            <table for="">Prioridad:</table>
                            <input type="text" id="txtNombre" name="txtNombre" class="form-control" required value="">
                        </div>
                        <div class="col-4">
                            <table for="">Usuario:</table>
                            <input type="text" id="txtNombre" name="txtNombre" class="form-control" required value="">
                        </div>
                            
                            <table for="">Estado:</table>
                            <input type="text" id="txtNombre" name="txtNombre" class="form-control" required value="">
                        </div>
                        <div class=" col-12 my-3">
                            <table for="">Titulo:</table>
                            <input type="text" id="txtTelefono" name="txtTelefono" class="form-control" value="">
                        </div>
                        <div class="my-3">
                            <table for="">Descripción:</table>
                            <input type="text" id="txtmensaje" name="txtmensaje" class="form-control" required value="">
                        </div>
                       
                        <div class=" col-12 my-3 text-center">
                            <button type="submit" name="btnGuardar" class="btn btn-primary text-white">Guardar</button>
                            <button type="submit" name="btnNuevo" class="btn btn-secondary text-white">Cancelar</button>
                        </div> 
                    </form>
                </div>
               
            </div>
        </div>
    </main>
</body>

</html>