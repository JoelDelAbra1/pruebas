<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<?php


    if (isset($_POST['enviar'])) {
        if(empty($_POST['cedula']) || empty($_POST['nombre'])){
            echo "<script languaje = 'javaScript'>
            alert('Cedula o nombre vacios');
            location.assign('login.php');
            </script>";
        }else{
            include("conexion.php");
            $cedula = $_POST['cedula'];
            $nombre = $_POST['nombre'];
            
            $sql= "select * from personita where  cedula ='".$cedula."' and nombre = '".$nombre."'";
            $resultado = mysqli_query($conexion,$sql);

            if($fili = mysqli_fetch_assoc($resultado)){
                echo "<script languaje = 'javaScript'>
            alert('Bienvenido');
            location.assign('index.php');
            </script>";
            }else{
                echo "<script languaje = 'javaScript'>
                alert('Cedula o nombre incorrectos');
                location.assign('login.php');
                </script>";
            }
        }
    }else{
?>
    <center>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">

        <br>
        <label for="">cedula</label>
        <input type="text" name="cedula">
        <br>
        <label for="">nombre</label>
        <input type="text" name="nombre">
        <br>
        <input type="submit" name = "enviar" value="ingresar">
        </form>
    </center>
<?php
    }
?>
</body>
</html>