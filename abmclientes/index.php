<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


//preguntar si existe en archivo
if(file_exists("archivo.txt")){
    //Vamos a leerlo y almacenamos el contenido en jsonClientes
    $jsonClientes = file_get_contents("archivo.txt");
    //Convertir jsonClientes en un array llamado aClientes
    $aClientes = json_decode($jsonClientes, true);
} else{    
//si existe el archivo
    //Creamos un aClientes inicializado como un array vacío
    $aClientes = array();
}


if($_POST){
    $dni = trim($_POST["txtDni"]);
    $nombre = trim($_POST["txtNombre"]);
    $telefono = trim($_POST["txtTelefono"]);
    $correo = trim($_POST["txtCorreo"]);


    $aClientes[] = array("dni" => $dni,
                         "nombre" => $nombre,
                         "telefono" => $telefono,
                         "correo" => $correo);
                         
//convertir el array de clientes a jsonclientes
    $aClientes = json_encode($aClientes);


//almacenar el string jsonclientes en el "archivo.txt

     file_put_contents("archivo.txt", $jsonClientes);

}


if(isset($_GET["do"]) && $_GET["do"] == "editar"){
$pos = isset($_GET["pos"]) && $_GET["pos"] >= 0? $_GET["pos"]:"";
print_r($aClientes[$pos]["cocumento"]);
}
if(isset($_GET["do"]) && $_GET["do"] == "eliminar"){
    $pos = isset($_GET["pos"]) && $_GET["pos"] >= 0? $_GET["pos"]:"";
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
                    <form method="POST" enctype="multipart/form-data">
                        <div class="my-3">
                            <table for="">Nombre:</table>
                            <input type="text" id="txtNombre" name="txtNombre" class="form-control" required value="<?php $aClientes[$pos]["nombre"]; ?>">
                        </div>
                        <div class="my-3">
                            <table for="">DNI:</table>
                            <input type="text" id="txtDni" name="txtDni" class="form-control" required value="<?php $aClientes[$pos]["dni"]; ?>">
                        </div>
                        <div class="my-3">
                            <table for="">Telefono:</table>
                            <input type="text" id="txtTelefono" name="txtTelefono" class="form-control" value="<?php $aClientes[$pos]["telefono"]; ?>">
                        </div>
                        <div class="my-3">
                            <table for="">Correo:</table>
                            <input type="text" id="txtCorreo" name="txtCorreo" class="form-control" required value="<?php $aClientes[$pos]["correo"]; ?>">
                        </div>
                        <div>
                            <label for="">Archivo adjunto</label>
                            <input type="file" name="archivo" id="archivo" accept=".jpg, .jpeg, .png">
                            <small class="d-block">Archivos admitidos: .jpg, .jpeg, .png</small>
                        </div>
                        <div class="my-3">
                            <button type="submit" name="btnGuardar" class="btn btn-primary text-white">Guardar</button>
                            <button type="submit" name="btnNuevo" class="btn btn-danger text-white">Nuevo</button>
                        </div> 
                    </form>
                </div>
                <div class="col-8">
                    <table class="table table-hover border shadow py-5 px-">
                        <thead>
                            <tr>
                                <th>Imagen</th>
                                <th>Nombre:</th>
                                <th>DNI:</th>
                                <th>Telefono:</th>
                                <th>Correo:</th>
                                <th>Acciones</th>
                            </tr>
                            <?php foreach ($aClientes as $pos => $cliente): ?>
                            <tr>
                              <td></td>
                              <td><?php echo $cliente["nombre"]; ?></td>
                              <td><?php echo $cliente["dni"]; ?></td>
                              <td><?php echo $cliente["correo"]; ?></td>
                              <td>
                                  <a href="index.php?pos=<?php echo $pos; ?>&do=editar"><i class="fa-solid fa-pencil"></i></a>
                                  <a href="index.php?pos=<?php echo $pos; ?>&do=eliminar"><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>

                           <?php endforeach; ?>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </main>
</body>

</html>