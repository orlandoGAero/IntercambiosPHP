<!DOCTYPE html>
<html lang="en">
<head>
    <title>Crear Intercambio</title>
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
            <div class="row d-flex my-3 justify-content-center">
                <div class="col-md-2">
                    <button class="btn btn-outline-info" id="btnNuevo">Crear Grupo</button>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-outline-danger" id="btnPanel">Panel Grupo</button>
                </div>
            </div>

            <div class="row">
                <div class="col-12 d-md-flex justify-content-md-center">
                    <p class="h1 text-center text-danger">
                        Crear Grupo de Intercambio
                    </p>
                </div>
            </div>
        
            <div class="mt-5 p-sm-0 p-3 row">
                <div class="col-md-4 offset-md-3">
                    <p class="h3 text-primary">Organizador</p>
                </div>
                <div class="col-md-6 offset-md-3 mt-2">
                    <form method="post" id="formCrear">
                        <div class="form-group row align-items-center">
                            <label for="fecha" class="col-md-4">Fecha de Intercambio</label>
                            <div class="col-md-4">
                                <input type="date" name="date_fecha" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row align-items-center">
                            <div class="col-md-12">
                                <input type="text" name="txt_grupo" class="form-control" placeholder="Nombre del Grupo (obligatorio)">
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <div class="col-md-6">
                                <input type="text" name="txt_nombre" class="form-control" placeholder="Nombre (obligatorio)">
                            </div>
                            <div class="col-md-6 mt-3 mt-md-0">
                                <input type="text" name="txt_apellido" class="form-control" placeholder="Apellido (obligatorio)">
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <div class="col-md-6">
                                <input type="email" name="txt_email" class="form-control" placeholder="Correo electrónico (opcional)">
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <div class="col-md-2 offset-md-10">
                                <button type="submit" id="btnCrear" class="btn btn-primary">Crear</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center fixed-bottom" style="color: #ccc;">
        <p>Derechos Reservados &copy;</p>
    </div>
    <script
			  src="https://code.jquery.com/jquery-3.3.1.js"
			  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
			  crossorigin="anonymous"></script>
    <script src="assets/js/app.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>