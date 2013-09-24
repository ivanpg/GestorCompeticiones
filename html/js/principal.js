$(document).ready(function() {
    $divAcceso = $('#panel');
    $divConfig = $('#config');

    $divAcceso.hide();
    $divConfig.hide();

    $('#acceder').click(function() {
        $divAcceso.slideToggle(400);
    });

    $('#accederOpciones').click(function() {
        $divConfig.slideToggle(400);
    });
    
    consultaAjax($('#eligeJornada').val()); //mostrar primera jornada

    $('#eligeJornada').change(function() {
        var valorSelect = $(this).val();
        consultaAjax(valorSelect);

    });


    function consultaAjax(valorSelect) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            data: 'jornadaElegida=' + valorSelect,
            url: 'principal.php',
            cache: false,
            success: function(respuesta) {
                console.log("tratando respuesta");
                tratarRespuesta(respuesta, valorSelect);
            }
        });
    }

    var tratarRespuesta = function(respuesta, nJornada) {
        $(".titJornada").remove();
        $(".partido").remove();
        $titJornada = $('<p class="titJornada"/>');
        $titJornada.appendTo($('#datos'));
        $titJornada.html("Jornada num " + nJornada + ". " + respuesta[0].fecha);
        for (i in respuesta) {
            $divPartido = $('<div class="partido"/>');
            $divResultado = $('<div class="resultado"/>');

            $enlaceComentarios = $('<a class="comentariosPartido" href="#">Comentarios</a>');
            $enlaceComentarios.appendTo($divPartido);

            $divResultado.appendTo($divPartido);

            $spanEscudoCasa = $('<span class="escudo"/>');
            $imagenEqLocal = $('<img alt="" src="images/shield_homeP.png" />');
            $imagenEqLocal.appendTo($spanEscudoCasa);

            $spanEquipoCasa = $('<span class="textoEquipo"/>');
            $spanResEquipoCasa = $('<span class="resEquipo"/>');
            $spanEquipoFuera = $('<span class="textoEquipo"/>');
            $spanResEquipoFuera = $('<span class="resEquipo"/>');

            $spanEscudoFuera = $('<span class="escudo"/>');
            $imagenEqVisit = $('<img alt="" src="images/shield_visitantP.png" />');
            $imagenEqVisit.appendTo($spanEscudoFuera);

            $spanEscudoCasa.appendTo($divResultado);
            $spanEquipoCasa.appendTo($divResultado);
            $spanResEquipoCasa.appendTo($divResultado);

            $spanResEquipoFuera.appendTo($divResultado);
            $spanEquipoFuera.appendTo($divResultado);
            $spanEscudoFuera.appendTo($divResultado);


            $divPartido.appendTo($('#datos'));

            $spanEquipoCasa.html(respuesta[i].equipoCasa);
            if (respuesta[i].goles_equipoCasa != null)
                $spanResEquipoCasa.html(respuesta[i].goles_equipoCasa);
            else
                $spanResEquipoCasa.html("-");

            if (respuesta[i].goles_equipoFuera != null)
                $spanResEquipoFuera.html(respuesta[i].goles_equipoFuera);
            else
                $spanResEquipoFuera.html("-");
            $spanEquipoFuera.html(respuesta[i].equipoFuera);

            crearEditorComentario($divResultado);

            $enlaceComentarios.click(function() {
                $(this).parent().find('.contenedorTotalInsertar').slideToggle(300);
            });

        }
    };

    var crearEditorComentario = function(padre) {
        $divContenedorComent = $('<div class="contenedorTotalInsertar"/>');
        $divComentarios = $('<div  class="contendorComentarios"/>');
        $textAreaComentario = $('<textarea  class="areaComentario"/>');
        $botonInsGolLocal = $('<input type="button"  class="botonInsGolLocal" value="Gol Local"/>');
        $botonInsComentario = $('<input type="button"  class="botonInsComentario" value="Insertar Comentario"/>');
        $botonInsGolVisitante = $('<input type="button"  class="botonInsGolVisitante" value="Gol Visitante"/>');


        $divComentarios.appendTo($divContenedorComent);
        $textAreaComentario.appendTo($divContenedorComent);
        $botonInsGolLocal.appendTo($divContenedorComent);
        $botonInsComentario.appendTo($divContenedorComent);
        $botonInsGolVisitante.appendTo($divContenedorComent);

        $divContenedorComent.insertAfter(padre);
        $divContenedorComent.hide();

    }
});