<?php
    $codigo = $_GET['q'];
    
    require_once 'class/Grupo.php';
    require_once 'class/Participante.php';
    require_once 'class/Organizador.php';

    $claseGrupo = new Grupo();
    $claseParticipante = new Participante();
    $claseOrga = new Organizador();

    $grupo = $claseGrupo->obtenerGrupo($codigo);
    $idGrup = $grupo['idgrupo'];

    $codigoBD = $claseGrupo->obtenerCodigo($idGrup);
    $codigoGrupoBd = $codigoBD['codigo'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registro</title>
    <?php include_once('head.php') ?>
</head>
<body>
    <div class="container-sm m-sm-5">
        <div id="mostrar">
        
            <div class="mt-sm-5 row d-flex justify-content-center ">
                <div class="col-md-9 mt-2">
                    <div class="jumbotron" style="background-color: #a4d7db">
                        <?php if($codigoGrupoBd != "" && $codigo == $codigoGrupoBd ) : ?>
                            <h3 class="h3">¡Bienvenido! al grupo de intercambio</h3>
                            <h1 class="h1 text-danger"><?=$grupo['nombre']?></h1>
                            <div class="row">
                                <div class="col-md-1">
                                    <p><strong>Fecha:</strong></p>
                                </div>
                                <div class="col-md-4">
                                    <p class="text-monospace"><?=$grupo['fecha']?></p>
                                </div>
                            </div>
                            <p class="lead">Registrate para unirte a nuestro intercambio de regalos</p>
                            <hr class="my-4">
                            <form method="post" id="formRegistro">
                                <input type="hidden" name="txt_idG" value="<?=$grupo['idgrupo']?>" readonly/>
                                <div class="form-group row mt-3">
                                    <div class="col-md-4">
                                        <input type="text" name="txt_nom" class="form-control" placeholder="Nombre (obligatorio)">
                                    </div>
                                    <div class="col-md-4 mt-3 mt-md-0">
                                        <input type="text" name="txt_apep" class="form-control" placeholder="Apellido Paterno (obligatorio)">
                                    </div>
                                    <div class="col-md-4 mt-3 mt-md-0">
                                        <input type="text" name="txt_apem" class="form-control" placeholder="Apellido Materno (opcional)">
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-md-6">
                                        <input type="email" name="txt_email" class="form-control" placeholder="Correo electrónico (opcional)">
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-md-2 offset-md-5">
                                        <button type="submit" id="btnParticipar" class="btn btn-success">Participar</button>
                                    </div>
                                </div>
                            </form>
                            <?php else:?>
                            <div class="row">
                                <div class="col">
                                    <h1 class="h2 text-dark text-center">Grupo de Intercambio ya ha sido cerrado o no existe</h1>
                                </div>
                            </div>
                        <?php endif;?>
                    </div>
                </div>
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