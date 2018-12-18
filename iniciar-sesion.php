<!DOCTYPE html>
<html lang="en">
<head>
    <title>Iniciar Sesión</title>
    <?php include_once('head.php') ?>
</head>
<body>
    <div class="container-sm m-sm-5">
        <div id="resultado">
            <div class="row bg-dark p-3 mb-4 d-flex justify-content-center text-center">
                <div class="col-md-4">
                    <img class="img-fluid" src="assets/images/logoDigitalMind.png" alt="logo digitalmind"/>
                </div>
                <div class="col-md-4 mt-3 mt-md-0 d-flex justify-content-center align-items-center">
                    <p class="textoFiestas text-center">¡Te desea Felices Fiestas!</p>
                </div>
            </div>
            <div class="row d-flex my-3 p-md-0 p-3 justify-content-center">
                <div class="col-md-2 mb-2">
                    <button class="btn btn-outline-info" id="btnNuevo">Crear Grupo</button>
                </div>
                <div class="col-md-2 mb-2">
                    <button class="btn btn-outline-danger" id="btnPanel">Ver Grupo</button>
                </div>
                <div class="col-md-2 mb-2">
                    <button class="btn btn-outline-primary" id="btnParticipante">Ver Participante</button>
                </div>
            </div>

            <div class="mt-5">
                <p class="lead text-center">Ingresa tu pin, para consultar detalles del grupo o tu amigo secreto</p>
                    
                <form method="post" class="form-inline d-flex justify-content-center" id="formIniciar">
                    <div class="form-group mb-2">
                        <input type="text" class="form-control" name="txt_pin" placeholder="Pin">
                    </div>
                    <div class="form-group mx-3 mt-3 mt-md-0">
                        <button type="submit" name="btnEntrar" class="btn btn-primary mb-2">Entrar</button>
                    </div>
                </form>
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
