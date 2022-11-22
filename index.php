<?php
 include("conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista</title>
    <script type="text/javascript">
        function confirmar(){
            return confirm('Estas seguro de eliminar');
        }
    </script>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">

    <table>
        <tr>
            <th colspan="5"><h1>Lista</h1></th>
        </tr>
        <tr>
            <td>
                <label for="">cedula:</label>
                <input type="text" name = 'cedula'>
            </td>
            <td>
                <label for="">nombre:</label>
                <input type="text" name = 'nombre'>
            </td>
            <td>
                <input type="submit" name="enviar" value =  "BUSCAR">
            </td>
            <td>
                <a href="index.php">Mostrar todos</a>
            </td>
            <td><a href="agregar.php">Nuevo Alumno</a></td>
        </tr>
        <tr></tr>
        <tr></tr>
    </table>

    </form>

    <table>
    <thead> 
      <tr>
            <th>Cedula</th>
            <th>nombre</th>
            <th>apellidos</th>
            <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if(isset($_POST['enviar'])){
            $cedula = $_POST['cedula'];
            $nombre = $_POST['nombre'];
            //$apellidos = $_POST['apellidos'];

            if(empty($_POST['cedula']) && empty($_POST['nombre'])){
                echo "<script languaje = 'Javascript'>
                alert('Ingresa el nombre o el apellido');
                location.assign('index.php');
                </script>
                ";
            }else {
                if (empty($_POST['nombre'])) {
                    $sql="select * from personita where cedula =" .$cedula; 
                }
                if (empty($_POST['cedula'])) {
                    $sql="select * from personita where nombre like '%" .$nombre."%'";
                }
                if (!empty($_POST['cedula']) && !empty($_POST['nombre'])) {
                    $sql="select * from personita where cedula =".$cedula." and nombre like '%".$nombre."%'";
                }
            }
            
            $resultado=mysqli_query($conexion,$sql);
            while($filas=mysqli_fetch_assoc($resultado)){
                ?>
                <tr>
            <td><?php echo $filas['cedula'] ?></td>
            <td><?php echo $filas['nombre'] ?></td>
            <td><?php echo $filas['apellidos'] ?></td>
            <td>
            <?php echo "<a href='editar.php?cedula=".$filas['cedula']."'>Editar</a>"; ?>
                --
                <?php echo "<a href='eliminar.php?cedula=".$filas['cedula']."'>Eliminar</a>"; ?>
            </td>
        </tr>

    <?php
            }
        }else{
            $sql="select * from personita";
            $resultado=mysqli_query($conexion,$sql);
            while($filas=mysqli_fetch_assoc($resultado)){
        ?>
        <tr>
            <td><?php echo $filas['cedula'] ?></td>
            <td><?php echo $filas['nombre'] ?></td>
            <td><?php echo $filas['apellidos'] ?></td>
            <td>
            <?php echo "<a href='editar.php?cedula=".$filas['cedula']."'>Editar</a>"; ?>
                --
                <?php echo "<a href='eliminar.php?cedula=".$filas['cedula']."'>Eliminar</a>"; ?>
            </td>
        </tr>
        <?php
            }
        }
        ?>
      </tbody>
    </table>
</body>
</html>