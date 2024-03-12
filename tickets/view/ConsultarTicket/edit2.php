<?php

session_start();
require_once 'connect.php';
$usuario = $_SESSION['username'];

$id = $_POST['id'];
$reasignar = $_POST['reasignar'];
$estado = $_POST['estado'];
$fecha = $_POST['fecha'];



switch($reasignar){
    case "Brenda Jimena Alarcon Vargas":
        $mesa="manager";
        break;
    case "Jose Antonio Renovato Hiedra":
    case "Juan Ramon Lira Hernandez":
     case "Juan Pablo Barcenas Iturbe":    
     case "Juan Pablo Barcenas Iturbe":        
       case "Diego Dominguez Zacapala":      
            case "Hector Miguel Ornelas Flores":  
         

        $mesa = "Desarrollo de software";
            break;
    case "Yaressi Rodriguez":
        $mesa = "soporte infraestructura";
                break;
               
                   
    default:
        $mesa = "soporte infraestructura";
break;
}

$insert = "UPDATE tickets SET agente='$reasignar',estado='$estado',f_cierre='$fecha',mesa='$mesa' WHERE id_ticket = '$id'";

$query = mysqli_query($conexion,$insert);




if ($query) {
     $_SESSION['mensaje'] = 'Datos editados con éxito';
    header("https://ti.grupoccima.com/tickets/view/Home/");
    echo '
    <script>
        setTimeout(function() {
            window.history.go(-2);
        }, 500);
    </script>';
} else {
    $_SESSION['mensaje'] = 'Error en el registro de datos.';
    header("https://ti.grupoccima.com/tickets/view/Home/");
    echo '
    <script>
        setTimeout(function() {
            window.history.go(-2);
        }, 500);
    </script>';


}
?>

