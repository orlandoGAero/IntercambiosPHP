<?php 
    session_start();
    require_once 'class/Grupo.php';

    $claseGrupo = new Grupo();

    $pinO = $_SESSION['pin'];
    
    $grupo = $claseGrupo->obtenerGrupoxPin($pinO);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Detalles Grupo</title>
    <?php include_once('head.php') ?>
</head>
<body>
    <div class="container-sm m-sm-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-3 p-5" style="background-color: #1e3953">
                <h3 class="h3 mb-3" style="color: #4fdeb5"><?=$_SESSION['nombre'];?></h3>
                <div class="row mb-5">
                    <div class="col-md-3">
                        <h4 class="h4 text-white">Pin:</h4>
                    </div>
                    <div class="col">
                        <h3 class="h3 text-warning"><?=$pinO?></h3>
                    </div>
                </div>
                <h5 class="h5 text-white mb-3"><?=$grupo['nombre']?></h5>
                <h5 class="h5 text-white mb-2"><?=$grupo['fecha']?></h5>
            </div>
            <div class="col-md-6 p-5" style="background-color: #f8f8f8">
                <form method="post" id="btnCerrar">
                    <input type="hidden" name="txt_pinO" value="<?=$pinO?>" readonly>
                    <button type="submit" class="btn btn-danger">Cerrar Grupo</button>
                </form>
                <div id="respuesta"></div>
            </div>
        </div>
    </div>
    <script
			  src="https://code.jquery.com/jquery-3.3.1.js"
			  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
			  crossorigin="anonymous"></script>
<script src="assets/js/app.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>
