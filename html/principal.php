<?php

session_start();
//print_r($_SESSION["liga"]);
$result = mysql_query("SET NAMES utf8");
require("auxiliares.php");
require("generaCalendario.php");



if (!isset($_POST["btnEntrar"]) && !isset($_POST["generarLiga"]) && !isset($_GET["op"]) && !isset($_POST["guardarLiga"]) && !isset($_POST["jornadaElegida"])) {
    if (!isset($_SESSION["usuario"])) {
        $smarty->assign('estado', 'Bienvenido');
        $smarty->assign('info', 'Procede a Identificarte');
        $smarty->assign('clase', 'bienvenido');
        $smarty->display('inicio.html');
        exit(0);
    } else if (isset($_SESSION["usuario"])) {
        $smarty->assign('usuarioIdentif', $_SESSION["usuario"]);
        $smarty->display('inicio.html');
    }
}

if (isset($_POST["btnEntrar"]) && isset($_POST["inputUser"]) && isset($_POST["inputPwd"])) {
    /* Extraccion las variables de entrada */
    $usuario = $_POST['inputUser'];
    $password = $_POST['inputPwd'];
    if (existeUser($usuario, $password)) {
        $_SESSION["usuario"] = $usuario;
        $_SESSION["tipoLigaConsulta"] = "Futbol 1";
        $smarty->assign('usuarioIdentif', $usuario);
        $smarty->display('inicio.html');
    } else {
        $smarty->assign('estado', 'Error identificacion');
        $smarty->assign('info', 'Usuario o Contraseña introducidos no son validos');
        $smarty->assign('clase', 'error');
        $smarty->display('inicio.html');
    }
}

if (isset($_POST["jornadaElegida"])) {//tratar peticion ajax
    $nJornada = $_POST["jornadaElegida"];
    $tipoLiga = $_SESSION["tipoLigaConsulta"];
    $consultaJornada = "SELECT jornada.id_partido,jornada.fecha,jornada.equipoCasa,jornada.equipoFuera,jornada.goles_equipoCasa,jornada.goles_equipoFuera from liga join jornada 
					on jornada.id_liga=liga.id_liga where liga.nombre_competicion='$tipoLiga' and jornada.id_jornada='$nJornada'";
    $result = mysql_query($consultaJornada);
    echo mysql_error();
    $arrJornada = array(); //array de partidos
    while ($fila = mysql_fetch_assoc($result)) {
        array_push($arrJornada, $fila);
    }
    echo json_encode($arrJornada, JSON_FORCE_OBJECT);
}
if (isset($_GET["op"])) {
    if ($_GET["op"] == "crear") {
        //si ha seleccionado este enlace es xq esta logueado
        $smarty->assign('usuarioIdentif', $_SESSION["usuario"]);
        $smarty->assign('crear', true);
        $smarty->display('inicio.html');
    }
    if ($_GET["op"] == "logout") {
        session_destroy();
        $smarty->assign('clase', 'bienvenido');
        $smarty->assign('estado', 'Bienvenido');
        $smarty->assign('info', 'Procede a Identificarte');
        $smarty->display('inicio.html');
    } else if ($_GET["op"] == "jornada" && isset($_SESSION["tipoLigaConsulta"])) {
        //si no esta logeado mostrar partidos de la jornada seleccionada
        //consulta liga seleccionada
        $tipoLiga = $_SESSION["tipoLigaConsulta"];
        $consultaNumJornadas = "SELECT (equipos_competicion-1)*2 as jornadas from liga where nombre_competicion='$tipoLiga'";
        $result = mysql_query($consultaNumJornadas);
        $fila = mysql_fetch_assoc($result);
        $numJornadas = $fila['jornadas'];

        for ($i = 0; $i < $numJornadas; $i++)
            $aux[$i] = "Jornada " . ($i + 1);

        $smarty->assign('misJornadas', $aux);
        $smarty->assign('jornadaSelec', 0);

        if (!isset($_SESSION["usuario"])) {
            $smarty->assign('estado', 'Bienvenido');
            $smarty->assign('info', 'Procede a Identificarte');
            $smarty->assign('clase', 'bienvenido');
        }
        else
            $smarty->assign('usuarioIdentif', $_SESSION["usuario"]);
        $smarty->assign('verJornadas', true);
        $smarty->display('inicio.html');
    }
}
if (isset($_GET["tipoLiga"])) {
    $tipo = $_GET["tipoLiga"];
    if ($tipo == "futbol1")
        $_SESSION["tipoLigaConsulta"] = "Futbol 1";
    elseif ($tipo == "futbol2")
        $_SESSION["tipoLigaConsulta"] = "Futbol 2";
    elseif ($tipo == "baloncesto")
        $_SESSION["tipoLigaConsulta"] = "Baloncesto";
    elseif ($tipo == "futbolSala")
        $_SESSION["tipoLigaConsulta"] = "Futbol Sala";
    elseif ($tipo == "balonmano")
        $_SESSION["tipoLigaConsulta"] = "Balonmano";

    //consultar id de esa liga
    $tipo = $_SESSION["tipoLigaConsulta"];
    $consultaId = "SELECT id_liga FROM `liga` where nombre_competicion='$tipo'";
    $result = mysql_query($consultaId);
    $fila = mysql_fetch_assoc($result);
    $_SESSION["idLiga"] = $fila['id_liga'];
}
if (isset($_POST['generarLiga']) && isset($_POST['numEquip']) && isset($_POST['names']) && isset($_SESSION["usuario"]) && isset($_SESSION["tipoLigaConsulta"])) {
    $tipoLiga = "";
    $arrayNombre = explode("\n", trim($_POST['names']));
    $tipoLiga = $_SESSION["tipoLigaConsulta"];
    if ($tipoLiga != "" && sizeof($arrayNombre) > 2 && sizeof($arrayNombre) % 2 == 0) {
        $jornadasV1 = devolverEnfrentamientos(explode("\n", trim($_POST['names'])));
        //print_r($jornadasV1);
        //print "<p>Segunda vuelta es un espejo de la primera</p>";
        for ($i = sizeof($jornadasV1) - 1; $i >= 0; $i--) {
            foreach ($jornadasV1[$i] as $j => $r) {
                //darVuelta: funcion declarada en generaCalendario
                $jornadasV2[$i][$j] = darVuelta($r);
            }
        }
        $_SESSION["liga"] = array_merge($jornadasV1, $jornadasV2);
        $_SESSION["nombreEquipos"] = $arrayNombre;

        $smarty->assign('usuarioIdentif', $_SESSION["usuario"]);
        $smarty->assign('ligaGenerada', true);
        $smarty->assign('jornadasV1CompCreada', $jornadasV1);
        $smarty->assign('jornadasV2CompCreada', $jornadasV2);
        $smarty->display('inicio.html');
    } else {
        $smarty->assign('info', 'Introduce min. de 4 equipos y elige nombre de la liga');
        $smarty->assign('clase', 'error2');
        $smarty->assign('usuarioIdentif', $_SESSION["usuario"]);
        $smarty->assign('crear', true);
        $smarty->display('inicio.html');
    }
}


if (isset($_POST["guardarLiga"]) && isset($_SESSION["usuario"]) && isset($_SESSION["liga"]) && isset($_SESSION["tipoLigaConsulta"]) && isset($_SESSION["nombreEquipos"])) {
    /* insertar en base de datos */

    //buscar ultima clasificacion insertada
    $consultaUltmId = "SELECT max( id_clasificacion ) as ultimo FROM `clasificacion` ORDER BY id_clasificacion";
    $result = mysql_query($consultaUltmId);
    $fila = mysql_fetch_assoc($result);
    $ultmId = $fila['ultimo'];
    $nuevoIdClas = $ultmId + 1;

    //crear clasificacion
    $arrayEquipos = $_SESSION["nombreEquipos"];
    $numEquipos = sizeof($arrayEquipos);
    for ($i = 0; $i < $numEquipos; $i++) {
        $nombreEquipo = $arrayEquipos[$i];
        $posicion = $i + 1;
        $consultaIns = "INSERT INTO clasificacion (id_clasificacion,posicion_equipo,nombre_equipo, puntosEquipo) VALUES ('$nuevoIdClas','$posicion','$nombreEquipo',0)";
        $result = mysql_query($consultaIns);
    }

    //buscar ultima liga. ID es autoimcremental xo luego necesitaria una consulta para saber el ultimo id insertado (xa jornadas) 
    $consultaUltmId = "SELECT max( id_liga ) as ultima FROM `liga` ORDER BY id_liga";
    $result = mysql_query($consultaUltmId);
    $fila = mysql_fetch_assoc($result);
    $ultmIdLiga = $fila['ultima'];
    $nuevoIdLiga = $ultmIdLiga + 1;

    //crear liga
    $nombreLiga = $_SESSION["tipoLigaConsulta"];
    $consultaIns = "INSERT INTO liga(id_liga,id_clasificacion,nombre_competicion,equipos_competicion) VALUES ('$nuevoIdLiga','$nuevoIdClas','$nombreLiga','$numEquipos')";
    $result = mysql_query($consultaIns);

    //crear jornadas
    $jornadas = $_SESSION["liga"];
    $fechaJornada = date("Y-m-d");
    for ($i = 0; $i < sizeof($jornadas); $i++) {
        $nJornada = $i + 1;
        for ($j = 0; $j < sizeof($jornadas[$i]); $j++) {
            $componentes = explode(' vs ', $jornadas[$i][$j]);
            $casa = $componentes[0];
            $fuera = $componentes[1];
            $nPartido = $j + 1;
            $consultaInsJ = "INSERT INTO jornada (id_liga,id_jornada,fecha,equipoCasa,equipoFuera,goles_equipoCasa,goles_equipoFuera) 
											VALUES ('$nuevoIdLiga','$nJornada','$fechaJornada','$casa','$fuera',NULL,NULL)";
            $result = mysql_query($consultaInsJ);
            echo mysql_error();
        }
        $fechaJornada = date("Y-m-d", mktime(0, 0, 0, date("m"), date("d") + ($nJornada * 7), date("Y")));
    }
    $smarty->assign('usuarioIdentif', $_SESSION["usuario"]);
    $smarty->assign('crear', true);
    $smarty->display('inicio.html');
}

function comienzaPartido($idPartido) {
    //ponemos los marcadores 0 - 0 
    $consultaIniciaPartido = "UPDATE jornada SET goles_equipoCasa = 0, goles_equipoFuera = 0 WHERE id_partido='$idPartido'";
    $result = mysql_query($consultaIniciaPartido);
    $textoComentario = "Empieza el partido. 0-0 en el marcador.";
    insertarComentario($idPartido, $textoComentario);
}

function insertarGol($idPartido, $nomEquipoCasa, $nomEquipoFuera, $equipoMarcaGol) {
    //equipoMarca 0 gol de local
    //equipoMarca 1 gol de visitante
    if ($equipoMarcaGol == 0) {
        //como el partido ya ha empezado los campos a null ya se ahn puesto a 0
        $consultaInsGol = "UPDATE jornada SET goles_equipoCasa = goles_equipoCasa+1 WHERE id_partido='$idPartido'";
        $textoComentario = "Gol del " + $nomEquipoCasa . ".";
    } else if ($equipoMarcaGol == 1) {
        $consultaInsGol = "UPDATE jornada SET goles_equipoFuera = goles_equipoFuera+1 WHERE id_partido='$idPartido'";
        $textoComentario = "Gol del " + $nomEquipoFuera . ".";
    }
    $result = mysql_query($consultaInsGol);

    //cada gol inserta un comentario
    //consulta resultado
    $consultaResPartido = "select goles_equipoCasa,goles_equipoFuera from jornada where id_partido='$idPartido'";
    $result = mysql_query($consultaIdPartido);
    $fila = mysql_fetch_assoc($result);
    $golesEquipoCasa = $fila['goles_equipoCasa'];
    $golesEquipoFuera = $fila['goles_equipoFuera'];

    $textoComentario.=" Ya van " + $golesEquipoCasa . " - " . $golesEquipoFuera . ".";
    insertarComentario($idPartido, $textoComentario);
}

function insertarComentario($idPartido, $textoComentario) {
    $consultaIns = "INSERT INTO comentario(id_partido,textoComentario) VALUES ('$idPartido','$textoComentario')";
    $result = mysql_query($consultaIns);
}

function devuelveIdPardido($jornada, $nomEquipoCasa, $nomEquipoFuera) {
    $idLiga = $_SESSION["idLiga"];
    $consultaIdPartido = "SELECT id_partido FROM `jornada` where id_jornada='$jornada' and equipoCasa='$nomEquipoCasa' and equipoFuera='$nomEquipoFuera'";
    $result = mysql_query($consultaIdPartido);
    $fila = mysql_fetch_assoc($result);
    $idPartido = $fila['id_partido'];

    return $idPartido;
}

function existeUser($nombreUsuario, $contrasenya) {
    $contrasenyaMD5 = md5($contrasenya);
    $consultaExisteUser = "SELECT *
							FROM usuario
							where login='$nombreUsuario' and password='$contrasenyaMD5' ";
    $res = mysql_query($consultaExisteUser);
    echo mysql_error();
    if (mysql_num_rows($res) == 1)
        return true;
    else if (mysql_num_rows($res) == 0)
        return false;
}

?>