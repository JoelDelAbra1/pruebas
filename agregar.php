<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <?php
    if(isset($_POST['enviar'])){ //presiona el boton
        include("conexion.php");    
        $cedula = $_POST['cedula'];
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        
        $sql="INSERT INTO personita(cedula, nombre, apellidos) 
        VALUES ('$cedula', '$nombre', '$apellidos')";
        $resultado = mysqli_query($conexion,$sql);
        if($resultado){
            echo" <script languaje = 'JavaScript'>
            alert('Los datos fueron guardados');
            location.assign('index.php');
            </script>";
        }else{
            echo" <script languaje = 'JavaScript'>
            alert('ERROR: Los datos NO fueron guardados');
            location.assign('index.php');
            </script>";
        }
        mysqli_close($conexion);
    }else{

    }
    ?>
<form action="" method="POST">
        <input type="text" name="cedula" placeholder="Cedula">
        <input type="text" name="nombre" placeholder="Nombre">
        <input type="text" name="apellidos" placeholder="Apellidos">
        <button type="submit" name="enviar">Enviar</button>
        <a href="index.php">Regresar</a>
</body>
</html>