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
        <title>Modificar</title>
    </head>
    <body>
        <h1>Modificar a un Empleado</h1>
        <?php
            $consulta="SELECT * FROM empleados WHERE DNI LIKE '".$_GET['dni']."';";
            $resultado=$conexion->query($consulta);
            $fila=$resultado->fetch_assoc();

            echo 
            '
                <form name="modificar" action="#" method="POST">
                    DNI:<input type="text" name="dni" id="dni" disabled="disabled" value="'.$fila['DNI'].'" /><br />
                    Nombre:<input type="text" name="nombre" id="nombre" value="'.$fila['Nombre'].'" /><br />
                    Correo:<input type="text" name="correo" id="correo" value="'.$fila['Correo'].'" /><br />
                </form>
            ';
        ?>
    </body>
</html>