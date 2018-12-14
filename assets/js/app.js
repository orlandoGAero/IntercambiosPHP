$(document).ready(function() {
     
    $("#formCrear").submit(function(e) {
        e.preventDefault();
        if( $("input[name='date_fecha']").val() == "") {
            alert("Ingresa una fecha");
        } else if( $("input[name='txt_grupo']").val() == "") {
            alert("Ingresa el nombre del grupo");
        } else if( $("input[name='txt_nombre']").val() == "") {
            alert("Ingresa tu nombre");
        } else if( $("input[name='txt_apellido']").val() == "") {
            alert("Ingresa tu apellido");
        } else {
            $("#btnCrear").click(function(e){
                e.preventDefault();

                $.ajax({
                    url : "grupo.php",
                    method : "post",
                    data : $("form").serialize()
                })
                .done(function(html){
                    $("#resultado").html(html)
                });

            });
        }
    });

    $("#formRegistro").submit(function(e) {
        e.preventDefault();
        if( $("input[name='txt_nom']").val() == "") {
            alert("Ingresa tu nombre");
        } else if( $("input[name='txt_apep']").val() == "") {
            alert("Ingresa tu apellido");
        } else {
            $("#btnParticipar").click(function(e){
                e.preventDefault();

                $.ajax({
                    url : "participante.php",
                    method : "post",
                    data : $("form").serialize()
                })
                .done(function(html){
                    $("#mostrar").html(html)
                });

            });
        }
    });

});