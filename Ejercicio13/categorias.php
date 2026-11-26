<?php
require __DIR__ . '/../conexion.php';



if(isset($_GET['categoria'])){
    $categoriaRecibida= $_GET['categoria'];

    $sql2= 'select nombre
            from productos
            where categoria= :cate';

    $stmt2= $pdo->prepare($sql2);
    $darValores= $stmt2->execute(['cate' => $categoriaRecibida]);
    $productos = $stmt2->fetchAll(PDO::FETCH_COLUMN);
    echo "PRODUCTOS DE LA CATEGORIA: ". $categoriaRecibida;
    echo "<br>";
    foreach($productos as $producto){
        echo $producto;
        echo "<br>";
    }
    
}else{
    

$sql1='select categoria from productos group by categoria';

$stmt= $pdo->query($sql1);

$filas= $stmt->fetchAll(PDO::FETCH_COLUMN);
// $filas = $stmt->fetchAll(PDO::FETCH_COLUMN);
// o tmb recorrer $filas as $fila echo $fila['categoria']
echo "CATEGORIAS";
echo "<ul>";
foreach($filas as $fila){
    echo "<li><a href= 'categorias.php?categoria={$fila}'>$fila</a></li>";
    echo "<br>";
}
echo "</ul>";
}

?>