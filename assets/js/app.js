$(document).ready(function() {
    
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

});