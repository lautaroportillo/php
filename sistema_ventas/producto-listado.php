<?php

include_once "config.php";
include_once "entidades/producto.php";
$pg = "Listado de tipo de productos";

$producto = new Producto();
$aProductos = $producto->obtenerTodos ();

include_once("header.php");

?>


    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Listado de Productos</h1>
        <div class="row">
            <div class="col-12 mb-3">
                <a href="tipoproducto-formulario.php" class="btn btn-primary mr-2">Nuevo</a>
            </div>
        </div>
        <table class="table table-hover border">
            <tr>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
            <?php foreach($aProductos as $producto): ?>
                <tr>
                    <td><img src="files/<?php echo $producto->imagen; ?>" class="img-thumbnail"></td>
                    <td><?php echo $producto->nombre; ?></td>
                    <td><?php echo $producto->cantidad; ?></td>
                    <td>$ <?php echo number_format($producto->precio, 2, ",", "."); ?></td>
                    <td style="width: 110px;">
                        <a href="producto-formulario.php?id=<?php echo $producto->idproducto;?>">Editar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
        </table>
    </div>
    <?php include_once("footer.php"); ?>