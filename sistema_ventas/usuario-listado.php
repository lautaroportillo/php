<?php

include_once "config.php";
include_once "entidades/usuario.php";
$pg = "Listado de Usuarios";

$usuario = new Usuario();
$aUsuario = $usuario->obtenerTodos ();

include_once("header.php");

?>


    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Listado de Usuarios</h1>
        <div class="row">
            <div class="col-12 mb-3">
                <a href="tipoproducto-formulario.php" class="btn btn-primary mr-2">Nuevo</a>
            </div>
        </div>
        <table class="table table-hover border">
            <tr>
                <th>Usuario</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>correo</th>
                <th>Acciones</th>
            </tr>
            <?php foreach($aUsuario as $usuario): ?>
                <tr>
                    <td><?php echo $usuario->nombre; ?></td>
                    <td><a href="usuario-formulario.php?id=<?php echo $usuario->idusuario;?>">Editar</a></td>
                </tr>
                <?php endforeach; ?>
        </table>
    </div>
    <?php include_once("footer.php"); ?>