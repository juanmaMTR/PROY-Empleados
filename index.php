<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>BD_Empleados</title>
    </head>
    <body>
        <?php
            require 'config_bd.php'; //Llamo al archivo donde están las constantes
            $conexion=mysqli_connect(SERVIDORBD,USUARIO,CONTRASENIA,BASEDATOS); //Realizo la conexión con la base de datos
            echo '<h1>Dar de alta</h1>';
            if(isset($_POST['enviar']){
                echo 
                '
                    <form name="alta" action="#" method="POST">
                        DNI: <input type="text" name="dni" /><br />
                        Nombre: <input type="text" name="nombre" /><br />
                        Correo: <input type="text" name="correo" /><br />
                        Teléfono: <input type="text" name="telefono" /><br /><br />
                        <input type="submit" value="Enviar" name="enviar" />
                        <input type="reset" value="Borrar" />
                    
                    </form>
                ';
            }else{
                $consulta='INSERT INTO empleados () VALUES ("","$_POST['dni']","$_POST['nombre']","$_POST['correo']","$_POST['telefono']");';
                try{
                    $resultado=mysqli_query($conexion,$consulta);
                    $fila=mysqli_fetch_array($resultado);
                    while($fila){
                        echo '<br />';
                        echo $fila['IdEmpleado'].' ';
                        echo $fila['DNI'].' ';
                        echo $fila['Nombre'];
                        echo $fila['Correo'];
                        echo $fila['Telefono'];
                        $fila=mysqli_fetch_array($resultado);
                    }
                }catch(Exception $e){
                    echo 'Excepción capturada';
                }
            }
            
        ?>
    </body>
</html>