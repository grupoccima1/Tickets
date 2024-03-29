
<?php
require_once "./../php/connect.php";
?>


<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCIMAIT | Registrar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/fcdf70aeb7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="shortcut icon" type="image/x-icon" href="../img/icons/logo-icon.ico">
</head>

<body class="bg-img">
    <div class="container">
        <div class="row justify-content-between align-content-center h100">
            <div class="col-12 col-md-5 col-lg-5 col-xl-4 d-none d-md-flex flex-column justify-content-center">
                <h1 class="text-white text-shadow-logo">CCIMA IT</h1>
                <hr class="border border-white">
                <span class="fs-5"> Estas listo para Empezar</span>
                <div class="mt-5">
                    <p class="fs-5 text-start">para Agendar el Mantenimiento de tu Equipo, solo necesitas seleccionar la fecha en que te gustaria.</p>
                    <a class="btn btn-primary bg-trasparent text-shadow mt-3 px-5 fw-bold d-none" href="../calendariousu/index.php">Soporte Tecnico</a>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-5 col-xl-4 bg-gassdoor ">
                <div class="mt-3">
                    <h3 class="text-white text-uppercase text-center pb-3">Registrar</h3>
                    <!-- Formulario de Registro -->
                    <form action="./registro.php" method="post" class="m-3" id="registroForm">
                        <div class="mb-3 mt-3">
                            <label for="nombre" class="text-white form-label">Nombre:</label>
                            <input class="form-control" type="text" id="nombre" name="nombre" placeholder="Nombre" required>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="usuario" class="text-white form-label">Usuario:</label>
                            <input class="form-control" id="usuario" name="usuario" placeholder="Usuario" required>
                       <div class="mb-3 mt-3">
    <label for="telefono" class="text-white form-label">Tel&eacute;fono:</label>
    <input class="form-control" type="tel" id="telefono" name="telefono" placeholder="Tel&eacute;fono:" oninput="validarTelefono(this)" required>
    <div class="invalid-feedback">
        Por favor, ingresa un n&uacute;mero de tel&eacute;fono v&aacute;lido con 10 d&iacute;gitos.
    </div>
</div>

<script>
    function validarTelefono(input) {
        // Elimina cualquier caracter que no sea un n���mero
        input.value = input.value.replace(/\D/g, '');

        // Limita la longitud del n���mero de tel���fono a 10 d���gitos
        if (input.value.length > 10) {
            input.value = input.value.slice(0, 10); // Recorta a 10 d���gitos si es m���s largo
        }

        // Actualiza la validez del formulario
        input.setCustomValidity("");
        if (input.value.length !== 10) {
            input.setCustomValidity("Por favor, ingresa exactamente 10 d���gitos.");
        }
    }
</script>

                        <div class="mb-3 mt-3">
                            <label for="correo" class="text-white form-label">Correo:</label>
                            <input class="form-control" type="text"  id="correo" name="correo" placeholder="Correo" required>
                        </div>
<?php
// Mapeo de ���reas con correcciones ortogr���ficas en ASCII
$correccionesOrtograficas = array(
    "comercializacion" => "Comercializaci&oacute;n",
    "juridico" => "Jur&iacute;dico",
    "admon compras" => "Admon compras",
    "admon navetec" => "Admon navetec",
    "admon habitta" => "Admon habitta",
    "proyectos" => "Proyectos",
    "construccion" => "Construcci&oacute;n",
    "rentas" => "Rentas",
    "recursos humanos" => "Recursos humanos",
    "nuevos negocios" => "Nuevos negocios"
);

$sel = "SELECT * FROM area WHERE 1";
$res = mysqli_query($conexion, $sel);
?>

<div class="mb-3 mt-3">
    <label for="area" class="text-white form-label">Area:</label>
    <select class="form-control" id="area" name="area" onclick="mostrarOpciones()">
        <option disabled selected></option>
        <?php 
        while ($mos = mysqli_fetch_row($res)) {
            $nombreArea = $mos[1];

            // Verificar si hay una correcci���n ortogr���fica para esta ���rea
            if (isset($correccionesOrtograficas[$nombreArea])) {
                $nombreCorregido = $correccionesOrtograficas[$nombreArea];
            } else {
                $nombreCorregido = $nombreArea;
            }
            ?>
            <option value="<?php echo $nombreArea; ?>"> <?php echo $nombreCorregido; ?> </option>
        <?php } ?>
    </select>
</div>



                        <div class="mb-3">
                            <label for="pass" class="text-white form-label">Contrase&ntilde;a:</label>
                            <div class="input-group mb-3">
                                <input class="form-control" type="password" id="pass" name="password"
                                    placeholder="Password">
                                    <div class="bg-light p-2 border rounded-end">
                                    <img id="icono" class="w20px" src="../img/icons/eye.svg" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center pt-3">
                            <button type="submit" class="btn btn-primary bg-pri px-5">Registrar</button>
                        </div>
                        <div class="d-flex justify-content-between pt-5">
                            <!-- Redireccionamiento  -->
                            <a href="../rpassword.php" class="text-white text-decoration-none">Recuperar
                                Contraseña</a>
                            <a href="../index.php" class="text-white text-decoration-none">Login </a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <script>
            const form = document.getElementById('registroForm');
            form.addEventListener('submit', function(event) {
                const telefonoInput = document.getElementById('telefono');
                const telefonoValue = telefonoInput.value;
                if (!/^\d+$/.test(telefonoValue)) {
                    telefonoInput.classList.add('is-invalid');
                    event.preventDefault();
                }
            });
        </script>
        <!-- <div class="footer" > 
            <span class="text-white text-uppercase">todos los derechos reservados <a class="text-white text-decoration-none" href="https://grupoccima.com" target="_blanck">Grupoccima.com</a></span>
        </div> -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script src="./../js/main.js"></script>
     <script>
    var inactivityPeriod = 300; // 1 minuto

    function redirectLogout() {
      window.location.href = 'https://ti.grupoccima.com/index.php';
    }

    function resetInactivityTimer() {
      clearTimeout(inactivityTimer);
      inactivityTimer = setTimeout(redirectLogout, inactivityPeriod * 1000);
    }

    document.addEventListener('mousemove', resetInactivityTimer);
    document.addEventListener('keydown', resetInactivityTimer);

    // Iniciar el temporizador de inactividad al cargar la p���gina
    var inactivityTimer = setTimeout(redirectLogout, inactivityPeriod * 1000);
  </script>
</body>
 
</html>