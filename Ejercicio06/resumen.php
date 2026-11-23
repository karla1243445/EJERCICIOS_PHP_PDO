<?php
require  '../Ejercicio02/conexion.php';




$consulta1 = 'select categoria, count(*) as productos,
 sum(stock) as unidades
from productos
group by categoria 
order by categoria';

$stmt = $pdo->query($consulta1);
$categorias= $stmt->fetchAll();
//cantidad de categorias
$cantidadCategorias = count($categorias);

echo "categorias con productos: $cantidadCategorias" ;
echo "<br>";

foreach($categorias as $info){
     echo "{$info['categoria']}: {$info['productos']} productos, {$info['unidades']} unidades";
     echo "<br>";
}




$consulta2 ='select sum(precio*stock) from productos';
$stmt2 = $pdo->query($consulta2);
$total = (float) $stmt2->fetchColumn();

echo "valor total: $total";





