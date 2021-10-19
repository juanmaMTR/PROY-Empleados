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
        <title>Listado</title>
    </head>
    <body>
        <h1>Listado de Empleados</h1>
        <form action="#" method="post">
            <label for="dni">DNI: </label>
            <input type="text" name="dni" id="dni"/>
            <select name="filtrado" id="filtrado">
                <option value="ASC">Nombre (A-Z)</option>
                <option value="DESC">Nombre (Z-A)</option>
            </select>
            <input type="submit" value="Listar">
        </form>
        <?php
            if($_POST){
                if(trim($_POST['dni'])==""){
                    $consulta="SELECT * FROM empleados ORDER BY Nombre ".$_POST['filtrado'].";";
                }else{
                    $consulta="SELECT * FROM empleados WHERE DNI LIKE '".$_POST['dni']."%' ORDER BY Nombre ".$_POST['filtrado'].";";
                }
                $resultado=$conexion->query($consulta);
                echo '<table>';
                while($fila=$resultado->fetch_assoc()){
                    echo '<p>'.$fila['DNI'].': '.$fila['Nombre'].'</p>';
                    echo '<p><a href="borrar.php?dni='.$fila['DNI'].'">Borrar</a><br />';
                    echo '<a href="modificar.php?dni='.$fila['DNI'].'">Modificar</a></p>';
                }
                
            }
        ?>
        <a href="../index.html">Volver al índice</a>
    </body>
</html>