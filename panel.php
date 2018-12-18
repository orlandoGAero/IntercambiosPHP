<?php 
    session_start();
    require_once 'class/Grupo.php';
    require_once 'class/Participante.php';
    require_once 'class/Organizador.php';

    $claseGrupo = new Grupo();
    $claseParticipante = new Participante();
    $claseOrganizador = new Organizador();

    $pinO = $_SESSION['pin'];
    
    $grupo = $claseGrupo->obtenerGrupoxPin($pinO);

    $idGrupo = $grupo['idgrupo'];

    $codigoGrupo = $claseGrupo->obtenerCodigo($idGrupo);
    $codigo = $codigoGrupo['codigo'];

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
                <?php if($codigo != ""): ?>
                    <div class="row mt-5" id="divBoton">
                        <div class="col d-flex justify-content-end">
                                <form method="post" id="btnCerrar">
                                    <input type="hidden" name="txt_pinO" value="<?=$pinO?>" readonly>
                                    <button type="submit" class="btn btn-danger">Cerrar Grupo</button>
                                </form>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-md-6 p-5" style="background-color: #f8f8f8">
                <div id="respuesta"></div>
                <?php if ($codigo == ""): 
                    $organizador = $claseOrganizador->obtenerOrganizadorxPin($pinO);
                    $idO = $organizador['idorganizador'];

                    $amigoOrg = $claseOrganizador->obtenerPinAmigo($idO);
                    $pinAmigo = $amigoOrg['pin_amigo'];     

                    $amigoSecreto = $claseParticipante->obtenerAmigoxPinAmigo($pinAmigo);
                ?>
                    <div class="row">
                        <div class="col">
                            <p class="font-italic" style="font-size: 1.2rem">Ya ha sido cerrado el grupo</p>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col">
                            <h4 class="h4 text-dark text-center">Tu Amigo Secreto para el intercambio es:</h4>
                        
                            <h2 class="h2 text-center" style="color:#0b5129;">
                                <?=$amigoSecreto['nombre']." ".$amigoSecreto['apellidop']." ".$amigoSecreto['apellidom']?>
                            </h2>
                        </div>
                    </div>
                <?php endif; ?>
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
