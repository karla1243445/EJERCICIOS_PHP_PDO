
<?php
//require  '../Ejercicio02/conexion.php';
require __DIR__ . '/../conexion.php';
$arrayErrores=[];
// validacion de existencia de datos datos
if (isset($_POST['nombre'], $_POST['categoria'],
 $_POST['precio'], $_POST['stock'])) {

$validarNombre=trim($_POST['nombre']);
$validarCategoria= trim($_POST['categoria']);
$validarPrecio = filter_var($_POST['precio'], FILTER_VALIDATE_FLOAT);
$validarstock = filter_var($_POST['stock'], FILTER_VALIDATE_INT);


    if($validarNombre===""){
        $arrayErrores[]="ell campo nombre esta vacio";
    }

    if($validarCategoria===""){
        $arrayErrores[]="el campo categoria esta vacio";
    }


    if ($validarPrecio < 0.01) {
        $arrayErrores[] = 'el precio debe ser mayor a 0,01';
    }

 
   
    if ($validarstock < 0) { 
        $arrayErrores[] = 'el stock debe ser mayor a 1';
    }

    if(count($arrayErrores)>0){
        //mostrar los errores
        echo "<h3>Tu formulario tiene errores:</h3>";
        foreach($arrayErrores as $error){
            echo $error;
            echo '<br>';
        }

    }else{
        
        $insertar = 'insert into productos (nombre, categoria, precio, stock) 
            values (:nombre, :categoria, :precio, :stock)';
    
        $stmt = $pdo->prepare($insertar);
        $fila = $stmt->execute(['nombre'=> $validarNombre, 
                               'categoria' => $validarCategoria,
                               'precio'=> $validarPrecio, 
                               'stock' => $validarstock
                               
        ]);

       echo "<p>Producto guardado correctamente.</p>";
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
    
   <form action="" method="post">
        
    <label for="nombre">Nombre:</label><br>
    <input type="text" id="nombre" name="nombre">
    <br>
    <label for="categoria">Categoría:</label><br>
    <input type="text" id="categoria" name="categoria">
    <br>
    <label for="precio">Precio:</label><br>
    <input type="text" id="precio" name="precio">
    <br>
    <label for="stock">Stock:</label><br>
    <input type="text" id="stock" name="stock">
    <br>
    <button type="submit">Guardar producto</button>
    </form>

</body>
</html>


