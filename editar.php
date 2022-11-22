<?php
include("conexion.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editar</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <?php
    if(isset($_POST['enviar'])){
        $cedula = $_POST['cedula'];
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $sql="update personita set nombre='".$nombre."', apellidos='".$apellidos."' where cedula='".$cedula."'";
        $resultado = mysqli_query($conexion,$sql);
        if($resultado){
            echo" <script languaje = 'JavaScript'>
            alert('Los datos fueron actualizados');
            location.assign('index.php');
            </script>";
        }else{
            echo" <script languaje = 'JavaScript'>
            alert('ERROR: Los datos NO fueron actualizados');
            location.assign('index.php');
            </script>";
        }
        mysqli_close($conexion);
    }else{

        $cedula=$_GET['cedula']; //recupera el valor del otro
        $sql="select * from personita where cedula = '".$cedula."'";
        $resultado = mysqli_query($conexion,$sql);

        $fila= mysqli_fetch_assoc($resultado);
        $cedula= $fila["cedula"];
        $nombre= $fila["nombre"];
        $apellidos= $fila["apellidos"];

        mysqli_close($conexion);
    
    ?>
    <h1>editar</h1>
    <form action="" method="post">

        <input type="text" name="cedula" placeholder="Cedula" value="<?php echo $cedula; ?>"> <br>
        <input type="text" name="nombre" placeholder="Nombre" value="<?php echo $nombre; ?>"> <br>
        <input type="text" name="apellidos" placeholder="Apellidos" value="<?php echo $apellidos; ?>">
        <a href="index.php">Regresar</a>
        <button type="submit" name="enviar">Enviar</button>

    </form>
    <?php
    } 
    ?>
</body>
</html>