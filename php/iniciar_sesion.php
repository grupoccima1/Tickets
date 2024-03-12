<?php

require 'connect.php';
session_start();

// Obtener la versi¨®n de PHP
$php_version = phpversion();

$usuario = $_POST['usuario'] ?? '';
$pass = $_POST['password'] ?? '';

$q = "SELECT COUNT(*) as contar FROM usuarios WHERE usuario = '$usuario' and password = '$pass' ";
$consulta = mysqli_query($conexion, $q);
$array = mysqli_fetch_array($consulta);

// Agregar la versi¨®n de PHP al array
$array['version_php'] = $php_version;

if($array['contar'] > 0){
    $_SESSION['username'] = $usuario;
    echo "<script>window.location='./../login.php'</script>";
} else {
    echo '<script>
            alert("Datos incorrectos");
            window.history.go(-1);
          </script>';
}

?>
