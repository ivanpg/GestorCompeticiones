<?php
/* Ruta hasta el fichero Smarty.class.php */
define('SDIR','../smarty/');
require SDIR.'libs/Smarty.class.php';

/* Crea Objeto */
$smarty = new Smarty;

/* Directorios necesarios para smarty */
$smarty->template_dir ='../html/';
$smarty->compile_dir = SDIR.'templates_c';
$smarty->config_dir = SDIR.'configs';
$smarty->cache_dir = SDIR.'cache';


$conexion = mysql_connect("localhost", "root", "");
if (!$conexion) {
	echo "No pudo conectarse a la BD: " . mysql_error();
	exit;
}
if (!mysql_select_db("gestorCompeticiones")) {
	echo "No ha sido posible seleccionar la BD: " . mysql_error();
	exit;
}
$result = mysql_query("SET NAMES utf8"); 
?>