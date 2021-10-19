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
        <title>Alta</title>
    </head>
    <body>
        <h1>Dar de alta</h1>
        <form name="alta" action="#" method="POST">
            DNI: <input type="text" name="dni" /><br />
            Nombre: <input type="text" name="nombre" /><br />
            Correo: <input type="text" name="correo" /><br />
            Teléfono: <input type="text" name="telefono" /><br /><br />
            <input type="submit" value="Enviar" name="enviar" />
            <input type="reset" value="Borrar" />
        </form>
    </body>
</html>
<?php
    if(isset($_POST['enviar'])){
        $consulta="INSERT INTO empleados (DNI,Nombre,Correo,Telefono) VALUES ('".$_POST['dni']."','".$_POST['nombre']."','".$_POST['correo']."','".$_POST['telefono']."');";
        echo 'Consulta enviada correctamente';
    }     
?>