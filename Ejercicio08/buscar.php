<?php
//require  '../Ejercicio02/conexion.php';
require __DIR__ . '/../conexion.php';




if(isset($_POST['producto'])){

    $texto= trim($_POST["producto"]);

$sql= ('select nombre
from productos
where lower(nombre) like lower(:texto) ');

$stmt=$pdo->prepare($sql);
$stmt ->execute(['texto' => "%$texto%"]);
$productos =$stmt->fetchAll();
if (count($productos) > 0) {
    foreach($productos as $producto){
    
        echo "<p> {$producto['nombre']}</p>";
    }
}





}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <label >Buscar:</label>
        <input type="text" id="producto" name="producto">
        <button type="submit">buscar</button>
    </form>
</body>
</html>


