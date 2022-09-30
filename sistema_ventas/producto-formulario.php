<?php

include_once "config.php";
include_once "entidades/producto.php";
include_once "entidades/tipoproducto.php";

$producto = new Producto();

if ($_POST) {

    if (isset($_POST["btnGuardar"])) {
        $producto->cargarFormulario($_REQUEST);

        if (isset($_GET["id"]) && $_GET["id"] > 0) {

            if ($_FILES["archivo"]["error"] === UPLOAD_ERR_OK) {
                $nombreAleatorio = date("Ymdhmsi"); //2021010420453710
                $archivo_tmp = $_FILES["imagen"]["tmp_name"];
                $nombreArchivo = $_FILES["imagen"]["name"];
                $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
                $nombreImagen = "$nombreAleatorio.$extension";


                if ($extension == "jpg" || $extension == "jpeg" || $extension == "png") {
                    //elimino la imagen anterior
                    $productoAnt = new Producto();
                    $productoAnt->idproducto = $_GET["id"];
                    $productoAnt->obtenerPorId();
                    if (file_exists("files/$productoAnt->imagen")); {
                        unlink("files/$productoAnt->imagen");
                    }
                    //Subo imagen nueva
                    move_uploaded_file($archivo_tmp, "files/$nombreImagen");
                }




                if ($extension == "jpg" || $extension == "jpeg" || $extension == "png") {
                    $nombreImagen = "$nombreAleatorio.$extension";
                    move_uploaded_file($archivo_tmp, "files/$nombreImagen");
                }
                $producto->imagen = $nombreImagen;
            } else {
                $productoAnt = new Producto();
                $productoAnt->idproducto = $_GET["id"];
                $productoAnt->obtenerPorId();
                $producto->imagen = $productoAnt->imagen;
            }

            $producto->actualizar();
            $msg["texto"] = "actualizado correctamente";
            $msg["codigo"] = "alert-success";
        } else {
            $nombreAleatorio = date("Ymdhmsi"); //2021010420453710
            $archivo_tmp = $_FILES["archivo"]["tmp_name"];
            $nombreArchivo = $_FILES["archivo"]["name"];
            $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
            $nombreImagen = "$nombreAleatorio.$extension";

            if ($extension == "jpg" || $extension == "jpeg" || $extension == "png") {
                $nombreImagen = "$nombreAleatorio.$extension";
                move_uploaded_file($archivo_tmp, "file/$nombreImagen");
            }
            $producto->imagen = $nombreImagen;

            $producto->insertar();
            $msg["texto"] = "insertado correctamente";
            $msg["codigo"] = "alert-success";
        }
    } else  if (isset($_POST["btnBorrar"])) {
        $producto->cargarFormulario($_REQUEST);
        $producto->obtenerPorId();
        if (file_exists("files/$producto->imagen")); {
            unlink("files/$producto->imagen");
        }
        $producto->eliminar();
        header("Location: tipoproducto-listado.php");
    }
}

if (isset($_GET["id"]) && $_GET["id"] > 0) {
    $producto->cargarFormulario($_REQUEST);
    $producto->obtenerPorId();
}

$tipoProducto = new TipoProducto();
$aTipoProductos = $tipoProducto->obtenerTodos();


include_once "header.php";


?>

<div class="container-fluid">


    <h1 class="h3 mb-4 text-gray-800">Productos</h1>
    <?php if (isset($msg)) : ?>
        <div class="row">
            <div class="col-12">
                <div class="alert <?php echo $msg["codigo"]; ?>" role="alert">
                    <?php echo $msg["texto"]; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-12 mb-3">
            <a href="producto-listado.php" class="btn btn-primary mr-2">Listado</a>
            <a href="producto-formulario.php" class="btn btn-primary mr-2">Nuevo</a>
            <button type="submit" class="btn btn-success mr-2" id="btnGuardar" name="btnGuardar">Guardar</button>
            <button type="submit" class="btn btn-danger" id="btnBorrar" name="btnBorrar">Borrar</button>
        </div>
    </div>
    <div class="row">
        <div class="col-6 form-group">
            <label for="txtNombre">Nombre</label>
            <input type="text" required="" class="form-control" name="txtNombre" id="txtNombre" value="<?php echo $producto->nombre; ?>">
        </div>
        <div class="col-6 form-group">
            <label for="txtNombre">Tipo de Producto</label>
            <select name="lstTipoProducto" id="lstTipoProducto" class="form-control selectpicker">
                <option value="" disabled selected>Seleccionar</option>
                <?php foreach ($aTipoProductos as $tipoProducto) : ?>
                    <?php if ($producto->fk_idtipoproducto == $tipoProducto->idtipoproducto) : ?>
                        <option selected value="<?php echo $tipoProducto->idtipoproducto; ?>"><?php echo $tipoProducto->nombre; ?></option>
                    <?php else : ?>
                        <option value="<?php echo $tipoProducto->idtipoproducto; ?>"><?php echo $tipoProducto->nombre; ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-6 form-group">
            <label for="txtCantidad">Cantidad</label>
            <input type="number" required="" class="form-control" name="txtCantidad" id="txtCantidad" value="<?php echo $producto->cantidad; ?>">
        </div>
        <div class="col-6 form-group">
            <label for="txtPrecio">Precio</label>
            <input type="text" class="form-control" name="txtPrecio" id="txtPrecio" value="<?php echo $producto->precio; ?>">
        </div>
        <div class="col-12 form-group">
            <label for="txtDescripcion">Descripción</label>
            <textarea type="text" name="txtDescripcion" id="txtDescripcion"><?php echo $producto->descripcion; ?></textarea>
        </div>
        <div class="col-6 form-group">
            <label for="fileImagen">Imagen</label>
            <input type="file" class="form-control-file" name="archivo" id="archivo">
            <?php if ($producto->imagen != "") : ?>
                <img src="file/<?php echo $producto->imagen; ?>" class="img-thumbnail">
            <?php endif; ?>
        </div>
    </div>

</div>

<script>
    classicEditor
        .create(document.querySelector('#txtDescripcion'))
        .catch(error => {
            console.error(error);
        });
</script>
<?php include_once "footer.php"; ?>