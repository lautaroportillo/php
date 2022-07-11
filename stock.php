<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

$stock = 800;
if ($stock > 0) {

echo "hay stock";

} else {
    echo "no hay stock";
}

?>