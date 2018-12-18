
<?php
    require_once 'class/Participante.php';
    $clasePar = new Participante();

    $pin = $_REQUEST['txt_pin'];

    $result = $clasePar->verInfo($pin);

    if($datosP = $result) {
        if($datosP['pin'] == $pin) {
            session_start();
            $_SESSION['nombre'] = $datosP['nombre']." ".$datosP['apellidop']." ".$datosP['apellidom'];
            $_SESSION['pin'] = $pin;
            $_SESSION['id'] = $datosP['idparticipante'];
            echo "
            <script>
                window.location.href = 'informacion.php';
            </script>";
        } 
    } else {
        echo "
        <script>
            swal('Pin incorrecto', 'Ingresa un pin valido', 'error')
            
            setTimeout(() => { window.location.href = 'iniciar-sesion.php'; }, 1500);
        </script>";
    }
?>