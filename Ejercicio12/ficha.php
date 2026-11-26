<?php
require __DIR__ . '/../conexion.php';





if(isset($_GET['identificador'])){
    //$recibidoId= $_GET['identificador'];
    $recibidoId=filter_var($_GET['identificador'], FILTER_VALIDATE_INT);
    if($recibidoId){
        $sql1='select id, nombre from productos
        where id=:ide';

    $stmt = $pdo->prepare($sql1);
    $darValor= $stmt->execute(['ide' => $recibidoId]);

    $info= $stmt->fetch();
    if($info){
        echo "el id {$info['id']} es el del {$info['nombre']}";
    
    }else{
        echo "no hay ningun producto con ese id";
    }
    
    
    
    }
    echo "<br>";
    echo "<a href='indice.php'>volver al listado</a>";
    
}  
?>
