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
                    DNI:<input type="text" name="dni" id="dni" value="'.$fila['DNI'].'" /><br />
                    Nombre:<input type="text" name="nombre" id="nombre" value="'.$fila['Nombre'].'" /><br />
                    Correo:<input type="text" name="correo" id="correo" value="'.$fila['Correo'].'" /><br />
                    Teléfono:<input type="text" name="telefono" id="telefono" value="'.$fila['Telefono'].'" /><br />
                    <input type="submit" value="Modificar" name="modificar" />
                    <input type="submit" value="Cancelar" name="cancelar" />
                </form>
            ';
            if(isset($_POST['modificar'])){
                $consulta='UPDATE empleados SET dni = "'.$_POST['dni'].'", nombre = "'.$_POST['nombre'].'", correo = "'.$_POST['correo'].'", telefono = "'.$_POST['correo'].'" WHERE idEmpleado = '.$fila['IdEmpleado'].';';
                $resultado=$conexion->query($consulta);
                echo '<a href="../index.html">Volver al índice</a>';
                echo 'Datos modificados';
            }
            if(isset($_POST['cancelar'])){
                echo '<a href="../index.html">Volver al índice</a>';
            }
        ?>
    </body>
</html>