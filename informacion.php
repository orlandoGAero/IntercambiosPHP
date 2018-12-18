<?php 
    session_start();
    require_once 'class/Grupo.php';
    require_once 'class/Participante.php';
    require_once 'class/Organizador.php';

    $claseGrupo = new Grupo();
    $claseParticipante = new Participante();
    $claseOrganizador = new Organizador();

    $pinP = $_SESSION['pin'];
    $idPar = $_SESSION['id'];
    
    $grupo = $claseGrupo->obtenerGrupoxPinPart($pinP);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Participante</title>
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
                        <h3 class="h3 text-warning"><?=$pinP?></h3>
                    </div>
                </div>
                <h5 class="h5 text-white mb-3"><?=$grupo['nombre']?></h5>
                <h5 class="h5 text-white mb-2"><?=$grupo['fecha']?></h5>
            </div>
            <div class="col-md-6 p-5 d-flex align-items-center justify-content-center" style="background-color: #f8f8f8">
                <?php
                    // $organizador = $claseOrganizador->obtenerOrganizadorxPin($pinO);
                    // $idO = $organizador['idorganizador'];

                    $amigoPar = $claseParticipante->obtenerPinAmigoPart($idPar);
                    $pinAmigo = $amigoPar['pin_amigo'];
                    
                    $amigoSecreto = $claseParticipante->obtenerAmigoxPinAmigo($pinAmigo);

                    if(empty($amigoSecreto)) {
                        $amigo = $claseOrganizador->obtenerOrganizadorxPin($pinAmigo);
                    }
                    
                ?>
                    <div class="row">
                        <div class="col">
                            <h4 class="h4 text-dark text-center">Tu Amigo Secreto para el intercambio es:</h4>
                        
                            <h2 class="h2 text-center" style="color:#0b5129;">
                                <?=$amigoSecreto['nombre']." ".$amigoSecreto['apellidop']." ".$amigoSecreto['apellidom']?>
                                <?php 
                                    if(empty($amigoSecreto)) {
                                        print $amigo['nombre']." ".$amigo['apellido'];    
                                    } 
                                ?>
                            </h2>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</body>
</html>
