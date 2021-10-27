<!DOCTYPE html>
<?php
    //Juan Manuel Toscano Reyes
    require 'config_bd.php'; //Llamo al archivo donde están las constantes
    $conexion=mysqli_connect(SERVIDORBD,USUARIO,CONTRASENIA,BASEDATOS); //Realizo la conexión con la base de datos
?>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Juan Manuel Toscano Reyes">
        <title>Borrar</title>
    </head>
    <body>
        <h1>Borrar Datos</h1>
        <?php
            $url=$_SERVER['REQUEST_URI'];
            //echo $url;
            $components=parse_url($url);
            parse_str($components['query'],$results);
            //echo ($results['dni']);

            $consulta="SELECT * FROM empleados WHERE DNI LIKE '".$results['dni']."';";
            $resultado=$conexion->query($consulta);
            while($fila=$resultado->fetch_assoc()){
                echo '<p>'.$fila['DNI'].': '.$fila['Nombre'].'&nbsp&nbsp&nbsp';
            }
            echo '<p>¿Desea borrar los datos de este perfil?</p>';
            echo '<form name="borrar" action="#" method="POST">';
            echo '<input type="submit" value="Aceptar" name="aceptar" />';
            echo '<input type="submit" value="Cancelar" name="cancelar" />';
            echo '</form>';
            if(isset($_POST['aceptar'])){
                $consulta="DELETE FROM empleados WHERE DNI LIKE '".$results['dni']."';";
                $resultado=$conexion->query($consulta);
                echo '<a href="../index.html">Volver al índice</a>';
            }
            if(isset($_POST['cancelar'])){
                echo '<a href="../index.html">Volver al índice</a>';
            }
            
        ?>
        
    </body>
</html>