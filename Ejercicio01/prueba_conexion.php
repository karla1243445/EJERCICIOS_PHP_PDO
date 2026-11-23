<?php

header('Content-Type: text/plain; charset=utf-8');
require __DIR__ . '/conexion.php';

$driver = $pdo->getAttribute(PDO::ATTR_DRIVER_NAME);
$assocActivo = "";




$actual = $pdo->getAttribute(PDO::ATTR_DEFAULT_FETCH_MODE);

if ($actual === PDO::FETCH_ASSOC) {
    $assocActivo = 'sí';
} else {
    $assocActivo = 'no';
}




echo "Conectado con el driver: $driver\n";
echo "Modo de extracción ASSOC activo: $assocActivo\n";

