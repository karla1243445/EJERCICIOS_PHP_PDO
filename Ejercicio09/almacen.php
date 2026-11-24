<?php
require __DIR__ . '/../conexion.php';
require __DIR__ . '/Producto.php';

$sql='select id, nombre, precio, stock
from productos
where categoria="Almacenamiento"
order by id';


$stmt=$pdo->query($sql);


$fila=$stmt->fetchObject(Producto::class);
while($fila !== false){
if($fila->estaAgotado()){
    echo "<br>";
        echo "agotado";
        echo "<br>";
    }else{
        echo "{$fila->valorStock()}";
    }
    $fila=$stmt->fetchObject(Producto::class);
}




?>