<?php
require  '../Ejercicio02/conexion.php';

$id= 0;
if(isset($_GET["id"]) && filter_var($_GET["id"],FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]])){
    $id=$_GET["id"];
}else{
    echo "identificador no valido";
}

$stmt = $pdo->prepare('select nombre, precio, stock, categoria
from productos
where id=:identificador');

$stmt->execute(['identificador'=>$id]);

$fila= $stmt->fetchObject();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php  if($fila === false):?>
        <h3> Producto no encontrado</h3>

    <?php  else:?>
        <h3> Producto encontrado</h3>
        <h4>Numero: <?php echo $id;  ?></h4>
        <h4>Nombre: <?php echo $fila->nombre;  ?></h4> 
        <h4>Categoria:<?php echo $fila->categoria;  ?> </h4>
        <h4>Precio con iva: <?php echo ($fila->precio) *1,21;  ?> </h4>
        <h4>Disponibilidad: 
            <?php if($fila->stock > 0){
                echo $fila->stock;
            }else{
                echo "agotado";
            }
                
            ?>
                
        
        </h4> 
        <?php endif; ?>
</body>
</html>



