<?php
require __DIR__ . '/../conexion.php';
$sql1='select id, nombre from productos';
    
$stmt1= $pdo->query($sql1);
$filas = $stmt1->fetchAll();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php foreach($filas as $fila):?>
        <?php echo $fila['id']?>
    <?php endforeach;?>
</body>
</html>