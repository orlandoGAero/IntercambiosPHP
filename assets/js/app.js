$(document).ready(function() {
     
    $("#formCrear").submit(function(e) {
        e.preventDefault();
        if( $("input[name='date_fecha']").val() == "") {
            swal("Ingresa una fecha", "", "error");
        } else if( $("input[name='txt_grupo']").val() == "") {
            swal("Ingresa el nombre del grupo", "", "error");
        } else if( $("input[name='txt_nombre']").val() == "") {
            swal("Ingresa tu nombre", "", "error");
        } else if( $("input[name='txt_apellido']").val() == "") {
            swal("Ingresa tu apellido", "", "error");
        } else {
            // $("#btnCrear").click(function(){
                // e.preventDefault();

                $.ajax({
                    url : "grupo.php",
                    method : "post",
                    data : $("form").serialize()
                })
                .done(function(html){
                    $("#resultado").html(html)
                });

            // });
        }
    });

    $("#formRegistro").submit(function(e) {
        e.preventDefault();
        if( $("input[name='txt_nom']").val() == "") {
            swal("Ingresa tu nombre", "", "error");
        } else if( $("input[name='txt_apep']").val() == "") {
            swal("Ingresa tu apellido", "", "error");
        } else {
            // $("#btnParticipar").click(function(){

                $.ajax({
                    url : "participante.php",
                    method : "post",
                    data : $("form").serialize()
                })
                .done(function(html){
                    $("#mostrar").html(html)
                });

            // });
        }
    });

});