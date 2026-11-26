<?php
require  '../Ejercicio02/conexion.php';



    if(isset($_GET['cat'])){
        $cat= trim($_GET['cat']);
    }else{
        $cat= "";
    }


$stmt = $pdo->prepare('SELECT nombre, precio, stock 
FROM productos 
WHERE categoria = :valorCategoria 
ORDER BY nombre');


$stmt->execute(['valorCategoria' => $cat]);

$productos = $stmt->fetchAll();
?>







<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>categoria: <?= htmlspecialchars($cat, ENT_QUOTES, 'UTF-8') ?></title>
</head>
<body>
    <h1>categoria: <?= htmlspecialchars($cat, ENT_QUOTES, 'UTF-8') ?></h1>

    <?php
if (count($productos) > 0) {
?>
    <table>
        <tr>
            <th>producto</th>
            <th>precio</th>
            <th>stock</th>
        </tr>
        <?php
        foreach ($productos as $p) {
        ?>
            <tr>
                <td><?php echo htmlspecialchars($p['nombre'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo number_format((float) $p['precio'], 2, ',', '.'); ?> €</td>
                <td><?php echo (int) $p['stock']; ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
<?php
} else {
?>
    <p>No hay productos en esta categoría.</p>
<?php
}
?>
</body>
</html>
