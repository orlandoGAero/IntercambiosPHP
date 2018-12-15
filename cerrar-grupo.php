<?php
    require_once 'class/Participante.php';
    require_once 'class/Grupo.php';
    require_once 'class/Organizador.php';

    $claseParticipante = new Participante();
    $claseGrupo = new Grupo();
    $claseOrganizador = new Organizador();

    $pinO = $_REQUEST['txt_pinO'];
    
    $grupo = $claseGrupo->obtenerGrupoxPin($pinO);
    $idGrupo = $grupo['idgrupo']; 

    $participantes = $claseParticipante->obtenerParticipantes($idGrupo);
    
    $organizador = $claseOrganizador->obtenerOrganizadorCerrar($idGrupo);

    $numOrgan = count($organizador);

    $numParti = count($participantes);

    $numParticipantes = $numOrgan + $numParti;

    if($numParticipantes <= 2) :?>
        <script>
            swal('No se puede cerrar el grupo', 'al menos deben existir 3 participantes', 'error');
        </script>
    <?php else :
        $amigo = $claseParticipante->obtenerAmigo($idGrupo);

        $claseGrupo->cerrarGrupo($idGrupo);
    ?>
        <script>
            swal('Se ha cerrado el grupo', 'nadie más puede registrarse', 'success');
        </script>

        <div class="row mt-5">
            <div class="col">
                <h4 class="h4 text-dark text-center">Tu Amigo Secreto para el intercambio es:</h4>
            
                <h2 class="h2 text-center" style="color:#0b5129;">
                    <?=$amigo['nombre']." ".$amigo['apellidop']." ".$amigo['apellidom']?>
                </h2>
            </div>
        </div>

    <?php endif; ?>