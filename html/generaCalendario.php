<?php

function devolverEnfrentamientos($nombresEq) { 
    $equipos = sizeof($nombresEq);
	
    // si hay num equipos impar añadimos uno 'ligaImpar'.
   $ligaImpar = false;
    if ($equipos % 2 == 1) {
        //$equipos++;
        //$ligaImpar = true;
		print "<p>es necesario liga par</p>";
		return;
    }
    
    // enfrentamientos  mediante algoritmo ciclico.
    $totalJornadas = $equipos - 1;
    $partidosPorJornada = $equipos / 2;
    $jornadas = array();
    for ($i = 0; $i < $totalJornadas; $i++) {
        $jornadas[$i] = array();
    }
   
    for ($jornada = 0; $jornada < $totalJornadas; $jornada++) {
        for ($partido = 0; $partido < $partidosPorJornada; $partido++) {
            $equipoCasa = ($jornada + $partido) % ($equipos - 1);
            $equipoFuera = ($equipos - 1 - $partido + $jornada) % ($equipos - 1);
            //ultimo equipo se queda en el mismo sitio mientras otros rotan sobre el
            if ($partido == 0) {
                $equipoFuera = $equipos - 1;
            }
            $jornadas[$jornada][$partido] = nombreEquipo($equipoCasa + 1, $nombresEq). " vs " .nombreEquipo($equipoFuera + 1, $nombresEq);
        }
    }

	
    // intercalamos partidos de casa y fuera
    $intercalados = array();
    for ($i = 0; $i < $totalJornadas; $i++) {
        $intercalados[$i] = array();
    }
  
    $evn = 0;
    $odd = ($equipos / 2);
    for ($i = 0; $i < sizeof($jornadas); $i++) {
        if ($i % 2 == 0) {
            $intercalados[$i] = $jornadas[$evn++];
        } else {
            $intercalados[$i] = $jornadas[$odd++];
        }
    }

    $jornadas = $intercalados;

    // como el ultimo (usado de pivote) no puede  jugar fuera siempre se pone en casa en las jornadas impares
    for ($jornada = 0; $jornada < sizeof($jornadas); $jornada++) {
        if ($jornada % 2 == 1) {
            $jornadas[$jornada][0] = darVuelta($jornadas[$jornada][0]);
        }
    }
     /*if ($ligaImpar) {
        print "partidos contra " . $equipos . " are byes.";
    }*/
	return $jornadas;
   
}

function darVuelta($partido) {
    $componentes = explode(' vs ', $partido);
    return $componentes[1] . " vs " . $componentes[0];
}

function nombreEquipo($num, $nombresEq) {
    $i = $num - 1;
    if (sizeof($nombresEq) > $i && strlen(trim($nombresEq[$i])) > 0) {
        return trim($nombresEq[$i]);
    } else {
        return $num;
    }
}

?>