<?php
    require_once 'class/Participante.php';
    $claseParticipante = new Participante();

    $iddegrupo = $_REQUEST['txt_idG'];
    $nombreP = $_REQUEST['txt_nom'];
    $apellidoP = $_REQUEST['txt_apep'];
    $apellidoM = $_REQUEST['txt_apem'];
    $email = $_REQUEST['txt_email'];
    $organizadorNom = $_REQUEST['h_nor'];
    $organizadorAp = $_REQUEST['h_ape'];

     //Método con str_shuffle() 
    function generarRandCad($length = 6) { 
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length); 
    }
    
    $part1 = substr(trim($nombreP),0,2);
    $part2 = substr(trim($apellidoP),0,1); 
    $part3 = substr(trim($apellidoM),0,1); 

    $pinPar = $part1.$part2.generarRandCad(4).$part3;

    $fnFila = $claseParticipante->getFilaPar();
    if($fnFila[0] == "NULL"){
        $id_par = 1;
    }else{
        $id_par = $fnFila[0]+1;
    }
    
    $filas =$claseParticipante->obtenerParticipanteDuplicado($nombreP,$apellidoP,$apellidoM,$iddegrupo);

    if($filas != 0) :
        echo "
        <script>
            swal('Nombre ya registrado', 'intenta con otro', 'error')
            
            setTimeout(() => { window.location.href = location; }, 1000);
        </script>";
    else :

        $claseParticipante->nuevoParticipante($id_par,$nombreP,$apellidoP,$apellidoM,$email,$pinPar);
        $claseParticipante->relacionarGrupoPar($id_par,$iddegrupo);
?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <title>Participante</title>
            <?php include_once('head.php') ?>
        </head>
        <body>
            <div class="container-sm m-sm-5">
                <div class="mt-5 row">
                    <div class="col-md-8 offset-md-2 mt-2">
                        <div class="jumbotron" style="background-color: #a4d7db">
                            <h3 class="h3 text-center">¡Gracias! por participar en nuestro intercambio</h3>
                            <div class="row mt-md-5">
                                <div class="col-md-4">
                                    <h3 class="h3">Pin de registro:</h3>
                                </div>
                                <div class="col-md-2">
                                    <h2 class="h2 text-danger"><?=$pinPar?></h2>
                                </div>
                            </div>
                            <p class="lead">Es importante recordar tu pin</p>
                            <h3 class="h3 text-dark text-center">Tu Amigo Secreto para el intercambio es:</h3>
                            <?php if(isset($organizadorNom) && isset($organizadorAp)):?>
                                <h2 class="h2 text-center" style="color:#0b5129;">
                                    <?=$organizadorNom." ".$organizadorAp?>
                                </h2>
                            <?php endif;?>
                            <h3 class="h3 font-weight-bold text-primary text-center mt-md-5">¡DIVIERTETE!</h3>
                        </div>
                    </div>
                </div>
            </div>
        </body>
        </html>
    <?php endif; ?>