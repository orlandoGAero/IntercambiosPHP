<!DOCTYPE html>
<html lang="en">
<head>
    <title>Crear Intercambio</title>
    <?php include_once('head.php') ?>
</head>
<body>
    <div class="container m-5">
        <div id="resultado">
            <div class="row">
                <div class="col-12 d-md-flex justify-content-md-center">
                    <p class="display-4 text-danger">
                        Crear Grupo de Intercambio
                    </p>
                </div>
            </div>
        
            <div class="mt-5 row">
                <div class="col-md-4 offset-md-3">
                    <p class="h3 text-primary">Organizador</p>
                </div>
                <div class="col-md-6 offset-md-3 mt-2">
                    <form method="post">
                        <div class="form-group row align-items-center">
                            <label for="fecha" class="col-md-4">Fecha de Intercambio</label>
                            <div class="col-md-4">
                                <input type="date" name="date_fecha" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row align-items-center">
                            <div class="col-md-12">
                                <input type="text" name="txt_grupo" class="form-control" placeholder="Nombre del Grupo">
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <div class="col-md-6">
                                <input type="text" name="txt_nombre" class="form-control" placeholder="Nombre">
                            </div>
                            <div class="col-md-6 mt-3 mt-sm-0">
                                <input type="text" name="txt_apellido" class="form-control" placeholder="Apellido">
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <div class="col-md-6">
                                <input type="email" name="txt_email" class="form-control" placeholder="Correo electrónico">
                            </div>
                            <div class="col-md-6 mt-3 mt-sm-0">
                                <input type="password" name="pwd_contrasena" class="form-control" placeholder="Contrase&ntilde;a">
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
    <script
			  src="https://code.jquery.com/jquery-3.3.1.js"
			  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
			  crossorigin="anonymous"></script>
    <script src="assets/js/app.js"></script>
</body>
</html>