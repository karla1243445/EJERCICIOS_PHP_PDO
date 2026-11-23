<?php
const MODO_DESARROLLO = true;
$config = [
    'host'    => '127.0.0.1',
    'puerto'  => 3306,
    'bd'      => 'tienda_pdo',
    'usuario' => 'root',
    'clave'   => '',
];

$dsn = "mysql:host={$config['host']};port={$config['puerto']};dbname={$config['bd']};charset=utf8mb4";

$opciones = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $config['usuario'], $config['clave'], $opciones);
} catch (PDOException $e) {
    error_log($e->getMessage());
    if (MODO_DESARROLLO) {
        exit($e->getMessage());
    } else {
        exit('Servicio no disponible. Inténtalo más tarde.');
    }
}



