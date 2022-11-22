<?php
$cedula=$_GET['cedula'];
include('conexion.php');
$sql="delete from personita where cedula = '".$cedula."'";
$resultado = mysqli_query($conexion,$sql);
if($resultado){
    echo" <script languaje = 'JavaScript'>
            alert('Los datos fueron eliminados');
            location.assign('index.php');
            </script>";
}else{
    echo" <script languaje = 'JavaScript'>
            alert('ERROR: Los datos NO fueron eliminados');
            location.assign('index.php');
            </script>";
}
?>