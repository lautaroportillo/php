<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$iva = 21;
$precioSinIva = 0;
$precioConIva = 0;
$ivaCantidad = 0;


if ($_POST) {
    $iva = $_POST["lstiva"];
    $precioSinIva = ($_POST["txtPrecioSinIva"]) > 0 ?  $precioSinIva = $_POST["txtPrecioSinIva"] : 0;
    $precioConIva = ($_POST["txtPrecioConIva"]) > 0 ?  $precioConIva = $_POST["txtPrecioConIva"] : 0;
    print_r($_POST);

    //dado un importa sin IVA, precio con IVA = importe * (21/100+1)
    if ($precioSinIva > 0) {
        $precioConIva = $precioSinIva * ($iva / 100 + 1);
    }


    //dado un importe con IVA, Precio sin IVA = importe / (21/100+1)

    if ($precioSinIva > 0) {
        $precioSinIva = $precioConIva / ($iva / 100 + 1);
    }


    $ivaCantidad =   $precioConIva -  $precioSinIva;
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
    <title>Calcular IVA</title>
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Calculadora de IVA</h1>
            </div>
            <div class="row">
                <div class="col-6">
                    <form method="POST">
                        <div>
                            <label for="">IVA</label>
                            <select name="lstIva" id="lstIva">
                                <option value="10.5">10.5</option>
                                <option value="19">19</option>
                                <option value="21">21</option>
                                <option value="27">27</option>
                            </select>
                        </div>
                        <div class="my-3">
                            <table for="">Precio sin IVA</table>
                            <input type="text" id="textSinIva" name="txtPrecioSinIva" class="form-control">
                        </div>
                        <div class="my-3">
                            <table for="">Precio con IVA</table>
                            <input type="text" id="textConIva" name="txtPrecioConIva" class="form-control">
                        </div>
                        <div class="my-3">
                            <button class="btn btn-primary my-3">CALCULAR</button>
                        </div>
                    </form>

                </div>
                <div class="col-6">
                    <table class="table table-hover border py-5">
                        <tr>
                            <th>IVA</th>
                            <td><?php echo number_format($iva, 2, ",", "."); ?></td>

                        </tr>
                        <tr>
                            <th>Precio sin IVA</th>
                            <td><?php echo number_format($precioSinIva, 2, ",", "."); ?></td>
                        </tr>
                        <tr>
                            <th>Precio con IVA</th>
                            <td><?php echo number_format($precioConIva, 2, ",", "."); ?></td>
                        </tr>
                        <tr>
                            <th>IVA Cantidad</th>
                            <td><?php echo number_format($ivaCantidad, 2, ",", "."); ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </main>
</body>

</html>