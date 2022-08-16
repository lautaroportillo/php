<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (file_exists("archivo.txt")) {
    //si el archivo existe, carlo la tarea en la variable aTareas
    $strJson = file_get_contents("archivo.txt");
    $aTareas = json_decode($strJson, true);
} else {
    //Si el archivo no existe es por que no hay tareas
    $aTareas = array();
}

if (isset($_GET["id"]) && $_GET["id"] >= 0) {
    $id = $_GET["id"];
} else {
    $id = "";
}

if ($_POST) {
    $titulo = $_POST["txtTitulo"];
    $prioridad = $_POST["txtPrioridad"];
    $usuario = $_POST["txtUsuario"];
    $estado = $_POST["txtEstado"];
    $descripcion = $_POST["txtDescripcion"];

    if ($id >= 0) {
        //Estoy editando una tarea
        $aTareas[$id] = array(
            "fecha" => $aTareas[$id]["fecha"],
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
    file_put_contents("archivo.txt", $strJson);
}
if (isset($_GET["do"]) && $_GET["do"] == "eliminar") {
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
        </div>
        <div class="row pb-3">
            <div>
                <form method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="py-1 col-4">
                            <label for="lstPrioridad">Prioridad</label>
                            <select name="lstPrioridad" id="lstPrioridad" class="form-control" required>
                                <option value="" disabled selected>Selecionar</option>
                                <option value="Alta" <?php echo isset($aTareas[$id]) && $aTareas[$id]["prioridad"] == "Alta" ? "selected" : ""; ?>>Alta</option>
                                <option value="Media" <?php echo isset($aTareas[$id]) && $aTareas[$id]["prioridad"] == "Media" ? "selected" : ""; ?>>Media</option>
                                <option value="Baja" <?php echo isset($aTareas[$id]) && $aTareas[$id]["prioridad"] == "Baja" ? "selected" : ""; ?>>Baja</option>
                            </select>
                        </div>
                        <div class="py-1 col-4">
                            <label for="lstUsuario">Usuario</label>
                            <select name="lstUsuario" id="lstUsuario" class="form-control" required>
                                <option value="" disabled selected>Selecionar</option>
                                <option value="Ana" <?php echo isset($aTareas[$id]) && $aTareas[$id]["usuario"] == "Ana" ? "selected" : ""; ?>>Ana</option>
                                <option value="Bernabe" <?php echo isset($aTareas[$id]) && $aTareas[$id]["usuario"] == "Bernabe" ? "selected" : ""; ?>>Bernabe</option>
                                <option value="Daniela" <?php echo isset($aTareas[$id]) && $aTareas[$id]["usuario"] == "Daniela" ? "selected" : ""; ?>>Daniela</option>
                            </select>
                        </div>
                        <div class="py-1 col-4">
                            <label for="lstEstado">Estado</label>
                            <select name="lstEstado" id="lstEstado" class="form-control" required>
                                <option value="" disabled selected>Selecionar</option>
                                <option value="Sin asignar" <?php echo isset($aTareas[$id]) && $aTareas[$id]["estado"] == "Sin asignar" ? "selected" : ""; ?>>Sin asignar</option>
                                <option value="Asignado" <?php echo isset($aTareas[$id]) && $aTareas[$id]["estado"] == "Asignado" ? "selected" : ""; ?>>Asignado</option>
                                <option value="En proceso" <?php echo isset($aTareas[$id]) && $aTareas[$id]["estado"] == "En proceso" ? "selected" : ""; ?>>En proceso</option>
                                <option value="Terminado" <?php echo isset($aTareas[$id]) && $aTareas[$id]["estado"] == "Terminado" ? "selected" : ""; ?>>Terminado</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 py-1">
                            <label for="txtTitulo">Titulo</label>
                            <textarea name="txtTitulo" id="txtTitulo" required></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 py-1">
                            <label for="txtDescripcion">Descripcion</label>
                            <textarea name="txtDescripcion" id="txtDescripcion" required></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 py-1 text-center">
                            <button type="submit" id="btnEnviar" name="btnEnviar" class="form-control"></button>
                        </div>
                    </div>
                    <div class=" col-12 my-3 text-center">
                        <button type="submit" name="btnGuardar" class="btn btn-primary text-white">Guardar</button>
                        <button type="submit" name="btnNuevo" class="btn btn-secondary text-white">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
        <?php if(count($aTareas)): ?>
            <div class="row">
                <div class="col-12 pt-3">
                    <table class="table table-hover border">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Fecha de insercion</th>
                                <th>Título</th>
                                <th>Prioridad</th>
                                <th>Usuario</th>
                                <th>estado</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($aTareas as $pos => $tarea) : ?>
                                <tr>
                                    <td><?php echo $pos ?></td>
                                    <td><?php echo $tarea["fecha"]; ?></td>
                                    <td><?php echo $tarea["titulo"]; ?></td>
                                    <td><?php echo $tarea["prioridad"]; ?></td>
                                    <td><?php echo $tarea["usuario"]; ?></td>
                                    <td><?php echo $tarea["estado"]; ?></td>
                                    <td>
                                        <a href="?id=<?php echo $pos; ?>&do=editar" class="btn btn-secundary"><i class="fa-solid fa-pencil"></i></a>
                                        <a href="?=<?php echo $pos; ?>&do=eliminar" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php else : ?>
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-info" role="alert">
                        Aún no se han cargado tareas.
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </main>
</body>
</html>