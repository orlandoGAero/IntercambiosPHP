<?php 

    require_once 'class/Grupo.php';
    require_once 'class/Organizador.php';
    $claseGrupo = new Grupo();
    $claseOrg = new Organizador();

    $diaI = $_REQUEST['date_fecha'];
    $nomGrupo = $_REQUEST['txt_grupo'];
    $nombre = $_REQUEST['txt_nombre'];
    $apellido= $_REQUEST['txt_apellido'];
    $correo = $_REQUEST['txt_email'];

    //Método con str_shuffle() 
    function generarRandCad($length = 6) { 
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length); 
    } 
    
    $part1 = substr(trim($nomGrupo),0,1);
    $part2 = substr(trim($nombre),0,2);
    $folioGrupo = generarRandCad(2).$part1.$part2.generarRandCad(5);

    $fnFila = $claseGrupo->getFilaGrupo();
    if ($fnFila[0] == "NULL") {
        $id_grupo = 1;
    } else {
        $id_grupo = $fnFila[0]+1;
    }
    
    $claseGrupo->nuevoGrupo($id_grupo, $nomGrupo, $folioGrupo, $diaI);

    $nom = substr(trim($nombre),0,2);
    $ap = substr(trim($apellido),0,2);
    $pinOr = $nom.generarRandCad(4).$ap;

    $fnFila = $claseOrg->getFilaOrg();
    if($fnFila[0] == "NULL"){
        $id_org = 1;
    }else{
        $id_org = $fnFila[0]+1;
    }
                
    $claseOrg->nuevoOrganizador($id_org,$nombre,$apellido,$correo,$pinOr);

    $claseGrupo->relacionarGrupoOrg($id_org,$id_grupo);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Grupo</title>
    <?php include_once('head.php') ?>
</head>
<body>
    <div class="container-sm m-sm-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h3 class="h3 text-info text-center">Felicidades! <b><?=$nombre?></b> Haz creado el grupo:</h3>
                        <h4 class="h4 text-danger text-center"><?=$nomGrupo?></h4>
                        <div class="row mt-md-5 text-center">
                            <div class="col-md-4">
                                <h3 class="h3">Pin de registro:</h3>
                            </div>
                            <div class="col-md-2">
                                <h2 class="h2 text-danger"><?=$pinOr?></h2>
                            </div>
                        </div>
                        <p class="lead">Es importante recordar tu pin, para ver detalles del grupo</p>
                        <div class="bg-dark px-5 py-1 mt-5">
                            <p class="h4 text-white mt-5 font-weight-bold">Invita a los participantes, usando el enlace de registro</p>
                            <p class="lead text-white mt-5 font-italic">Comparte el siguiente enlace para invitar a unirse a tu grupo</p>
                            <div class="input-group mb-3">
                                <!-- local Ubuntu-->
                                <!-- <input type="text" value="http://localhost:81/Intercambio/registro.php?q=<?=$folioGrupo?>" class="form-control" id="copiar" readonly> -->
                                <!-- local Win7-->
                                <input type="text" value="http://localhost/orlando/Intercambio/registro.php?q=<?=$folioGrupo?>" class="form-control" id="copiar" readonly>
                                <div class="input-group-append">
                                    <button class="copy btn btn-success" type="button" 
                                            data-clipboard-target="#copiar">
                                            <img src="assets/images/clippy.svg" width="13"/>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/clipboard.min.js"></script>
    <script>
        var clipboard = new ClipboardJS('.copy');
    </script>
</body>
</html>