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

            $.ajax({
                url : "grupo.php",
                method : "post",
                data : $("form").serialize()
            })
            .done(function(html){
                $("#resultado").html(html)
            });

        }
    });

    $("#formRegistro").submit(function(e) {
        e.preventDefault();
        if( $("input[name='txt_nom']").val() == "") {
            swal("Ingresa tu nombre", "", "error");
        } else if( $("input[name='txt_apep']").val() == "") {
            swal("Ingresa tu apellido", "", "error");
        } else {

            $.ajax({
                url : "participante.php",
                method : "post",
                data : $("form").serialize()
            })
            .done(function(html){
                $("#mostrar").html(html)
            });

        }
    });

    $("#btnPanel").click(function(){
        let url = "login.php";
        $(location).attr('href',url);
    });

    $("#btnNuevo").click(function(){
        let url = "index.php";
        $(location).attr('href',url);
    });

    $("#btnParticipante").click(function(){
        let url = "iniciar-sesion.php";
        $(location).attr('href',url);
    });

    $("#formLogin").submit(function(e) {
        e.preventDefault();
        if( $("input[name='txt_pin']").val() == "") {
            swal("Ingresa tu pin", "", "error");
        } 
        else {
            
            $.ajax({
                url : "validar.php",
                method : "post",
                data : $("form").serialize()
            })
            .done(function(html){
                $("#resultado").html(html)
            });

        }
    });

    $("#formIniciar").submit(function(e) {
        e.preventDefault();
        if( $("input[name='txt_pin']").val() == "") {
            swal("Ingresa tu pin", "", "error");
        } 
        else {
            
            $.ajax({
                url : "validarP.php",
                method : "post",
                data : $("form").serialize()
            })
            .done(function(html){
                $("#resultado").html(html)
            });

        }
    });

    $("#btnCerrar").submit(function(e) {
        e.preventDefault();
        $.ajax({
            url : "cerrar-grupo.php",
            method : "post",
            data: $("form").serialize()
        })
        .done(function(html){
            $("#respuesta").html(html)
        });

    });

});