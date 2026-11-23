<?php

require __DIR__ . '/conexion.php';
$sql= 
    'SELECT nombre, categoria,precio, stock
    from productos
    order by precio desc'
;


foreach($pdo->query($sql) as $fila){
$precio = number_format((float) $fila['precio'], 2, ',', '.');
echo "{$fila['nombre']} ({$fila['categoria']}): {$precio}  - {$fila['stock']}.\n";

}



$totalProductos= $pdo->query('SELECT COUNT(*) FROM productos')->fetchColumn();



echo "total de productos:$totalProductos"; 
