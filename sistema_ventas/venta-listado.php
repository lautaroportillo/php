<?php

include_once "config.php";
include_once "entidades/venta.php";
$pg = "Listado de tipo de productos";

$venta = new Venta();
$aVentas = $venta->obtenerTodos ();

include_once("header.php");

?>


    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Listado de Ventas</h1>
        <div class="row">
            <div class="col-12 mb-3">
                <a href="venta-formulario.php" class="btn btn-primary mr-2">Nuevo</a>
            </div>
        </div>
        <table class="table table-hover border">
            <tr>
                <th>Fecha</th>
                <th>Cantidad</th>
                <th>Producto</th>
                <th>Cliente</th>
                <th>total</th>
                <th>Acciones</th>
            </tr>
            <?php foreach($aVentas as $venta): ?>
                <tr>
                    <td><?php echo date_format(date_create($venta->fecha), "d/m/Y H:m"); ?></td>
                    <td><?php echo $venta->cantidad; ?></td>
                    <td><a href="producto-formulario.php?id=<?php echo $venta->fk_idproducto;?>"><?php echo $venta->fk_idproducto;?></a></td>
                    <td><a href="cliente-formulario.php?id=<?php echo $venta->fk_idcliente;?>"><?php echo $venta->fk_idcliente;?></a></td>
                    <td>$ <?php echo number_format($venta->total, 2, ',', '.'); ?></td>
                    <td>
                        <a href="venta-formulario.php?id=<?php echo $venta->idventa;?>"><i class="fas fas-"</a>
                    </td>
                </tr>
                <?php endforeach; ?>
        </table>
    </div>
    <?php include_once("footer.php"); ?>