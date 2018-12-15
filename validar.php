
<?php
    require_once 'class/Organizador.php';
    $claseOrga = new Organizador();

    $pin = $_REQUEST['txt_pin'];

    $result = $claseOrga->iniciarPanel($pin);

    if($datosO = $result) {
        if($datosO['pin'] == $pin) {
            session_start();
            $_SESSION['nombre'] = $datosO['nombre']." ".$datosO['apellido'];
            $_SESSION['pin'] = $pin;
            echo "
            <script>
                window.location.href = 'panel.php';
            </script>";
        } 
    } else {
        echo "
        <script>
            swal('Pin incorrecto', 'Ingresa un pin valido', 'error')
            
            setTimeout(() => { window.location.href = 'login.php'; }, 1500);
        </script>";
    }
?>