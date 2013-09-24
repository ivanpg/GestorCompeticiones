<?php /* Smarty version Smarty 3.1.4, created on 2013-09-24 13:07:18
         compiled from "../html/inicio.html" */ ?>
<?php /*%%SmartyHeaderCode:1855599076524159fee59615-97934048%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cc2a058ecdf22ce3465220aa9143ff699a7c36ad' => 
    array (
      0 => '../html/inicio.html',
      1 => 1380020830,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1855599076524159fee59615-97934048',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_524159ff10949',
  'variables' => 
  array (
    'usuarioIdentif' => 0,
    'clase' => 0,
    'estado' => 0,
    'info' => 0,
    'ligaGenerada' => 0,
    'jornadasV1CompCreada' => 0,
    'jornadasV2CompCreada' => 0,
    'crear' => 0,
    'verJornadas' => 0,
    'misJornadas' => 0,
    'jornadaSelec' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_524159ff10949')) {function content_524159ff10949($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/home/ivan/public_html/gestorCompeticiones/smarty/libs/plugins/function.html_options.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title>Inicio</title> 
<link rel="stylesheet" type="text/css" href="css/principal.css" title="style" />
<link rel="stylesheet" type="text/css" href="css/registro.css" title="style" />
</head>
<body>
	<div id="contenedor">
		<div id="cabecera">
			<div id="acceso">
				<?php if (!isset($_smarty_tpl->tpl_vars['usuarioIdentif']->value)){?>
					<a id="acceder" href="#">Zona Privada</a>
					<div id="panel">
						<div id="login">	
							
							<div id="mensaje" class=<?php echo $_smarty_tpl->tpl_vars['clase']->value;?>
>
								<p><?php echo $_smarty_tpl->tpl_vars['estado']->value;?>
</p>
								<p><?php echo $_smarty_tpl->tpl_vars['info']->value;?>
</p>
							</div>
							<form name="generaLiga" action="principal.php" method="post">
							<ul>
								<li>
									<label for="inputUser">Usuario</label>
									<input id="inputUser" name="inputUser" type="text" />
								</li>
								<li>
									<label for="inputPwd">Pwd</label>
									<input id="inputPwd" name="inputPwd" type="password" />
								</li>
								<li>
									<input type="submit" name="btnEntrar" id="btnEntrar" value="acceso"/>
								</li>
								<!--<li class="panel_button"><img src="images/collapse.png" alt="collapse" /> <a id="esconder" href="#">Esconder</a></li>-->
							</ul>
							</form>
						</div>	
					</div>
				<?php }else{ ?>
					<a id="accederOpciones" href="#"><?php echo $_smarty_tpl->tpl_vars['usuarioIdentif']->value;?>
</a>
					<div id="config">	
						<div id="opciones">
							<ul>
								<li>
									<a href="#">Configuración</a>
								</li>
								<li>
									<a href="#">Ayuda</a>
								</li>
								<li>
									<a href="principal.php?op=logout">Cerrar Sesión</a>
								</li>
							</ul>	
						</div>
					</div>	
				<?php }?>					
			</div>
		</div>	
		<div class="clear"></div>
		<div id="logotipo_seccion" >
			<div id="logo">
				<img src="images/logo.png" alt=""/>
			</div>
			<div id="seccion_titulo">
				<h1>Resultados y estadisticas</h1>
			</div>
		</div>	
		<div id="info">
			
			<div id="tabsE">
				<ul id="menu">
					<li><a href="principal.php?tipoLiga=futbol1"><span>Futbol 1ª</span></a></li>
					<li><a href="principal.php?tipoLiga=futbol2"><span>Futbol 2ª</span></a></li>
					<li><a href="principal.php?tipoLiga=baloncesto"><span>Baloncesto</span></a></li>
					<li><a href="principal.php?tipoLiga=futbolSala"><span>Futbol Sala</span></a></li>
					<li><a href="principal.php?tipoLiga=balonmano"><span>Balonmano</span></a></li>
				</ul>
			</div> 
			<div>
				<ul id="submenu">
					<li><a href="principal.php?op=clasificacion" title="Clasificacion">Clasificacion</a></li>
					<li><a href="principal.php?op=jornada" title="La Jornada">La Jornada</a></li>
					<?php if (isset($_smarty_tpl->tpl_vars['usuarioIdentif']->value)){?><li><a href="principal.php?op=crear" title="Crear Competición">Crear Competición</a></li><?php }?>
					<?php if (isset($_smarty_tpl->tpl_vars['usuarioIdentif']->value)){?><li><a href="principal.php?op=borrar" title="Borrar Competición">Borrar Competición</a></li><?php }?>
				</ul>
			</div>
			<div id="datos">	
				<?php if (isset($_smarty_tpl->tpl_vars['usuarioIdentif']->value)&&isset($_smarty_tpl->tpl_vars['ligaGenerada']->value)&&isset($_smarty_tpl->tpl_vars['jornadasV1CompCreada']->value)&&isset($_smarty_tpl->tpl_vars['jornadasV2CompCreada']->value)){?>					
					<!--<div id="campeonato">-->
						<div class="vueltaCampeonato">
						<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['jornada'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['name'] = 'jornada';
$_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['jornadasV1CompCreada']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['total']);
?>
							<p>Jornada <?php echo $_smarty_tpl->getVariable('smarty')->value['section']['jornada']['iteration'];?>
</p>
							<ul class="jornada">
							<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['partido'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['partido']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['name'] = 'partido';
$_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['jornadasV1CompCreada']->value[$_smarty_tpl->getVariable('smarty')->value['section']['jornada']['index']]) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['total']);
?>
								<li><?php echo $_smarty_tpl->tpl_vars['jornadasV1CompCreada']->value[$_smarty_tpl->getVariable('smarty')->value['section']['jornada']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['partido']['index']];?>
</li> 
							<?php endfor; endif; ?>	
							</ul>					
						<?php endfor; endif; ?>
						</div>
						
						<div  class="vueltaCampeonato">	
							<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['jornada'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['name'] = 'jornada';
$_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['jornadasV2CompCreada']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['total']);
?>
								<p>Jornada <?php echo $_smarty_tpl->getVariable('smarty')->value['section']['jornada']['iteration']+count($_smarty_tpl->tpl_vars['jornadasV2CompCreada']->value);?>
</p>
								<ul class="jornada">
								<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['partido'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['partido']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['name'] = 'partido';
$_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['jornadasV2CompCreada']->value[$_smarty_tpl->getVariable('smarty')->value['section']['jornada']['index']]) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['partido']['total']);
?>
									<li><?php echo $_smarty_tpl->tpl_vars['jornadasV2CompCreada']->value[$_smarty_tpl->getVariable('smarty')->value['section']['jornada']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['partido']['index']];?>
</li> 
								<?php endfor; endif; ?>	
								</ul>					
							<?php endfor; endif; ?>
						</div>	
					<!--</div>-->
				<form action="principal.php" method="post">
					<input type="submit" name="guardarLiga" id="guardarLiga" value="Guardar" />
				</form>
				
				<?php }elseif(isset($_smarty_tpl->tpl_vars['usuarioIdentif']->value)&&isset($_smarty_tpl->tpl_vars['crear']->value)){?>
					<?php if (isset($_smarty_tpl->tpl_vars['info']->value)){?><p class=<?php echo $_smarty_tpl->tpl_vars['clase']->value;?>
><?php echo $_smarty_tpl->tpl_vars['info']->value;?>
</p><?php }?>
					<div id="numEquip">
						<form name="generaLiga" action="principal.php" method="post">
						<ul >
							<li>
								<label for="numEquip">Numero de equipos</label>
								<input type="text" name="numEquip"/>
							</li>
							<li>
								<label for="names">Nombre de los equipos (uno por linea)</label>
								<textarea  name="names" id="names" /></textarea>
								
							</li>
							<li>
								<input type="submit" name="generarLiga" value="Generar"/>
							</li>
						</ul>
						<!--<ul id="tipoLiga">
							<li>
								<label>Elige el tipo de Liga a crear</label>
								<input type="checkbox" name="option1" value="liga1" checked>Futbol 1ª
							</li> 
							<li><input type="checkbox" name="option2" value="liga2" > Futbol 2ª</li>
							<li><input type="checkbox" name="option3" value="baloncesto"> Baloncesto</li>
							<li><input type="checkbox" name="option4" value="futbolSala"> Futbol Sala</li>
							<li><input type="checkbox" name="option5" value="balonMano"> BalonMano</li>
						</ul>-->
						</form>
					</div>
				<?php }elseif(isset($_smarty_tpl->tpl_vars['verJornadas']->value)){?>
					  <!--<?php echo smarty_function_html_options(array('name'=>'eligeJornada','id'=>'eligeJornada','options'=>$_smarty_tpl->tpl_vars['misJornadas']->value,'selected'=>$_smarty_tpl->tpl_vars['jornadaSelec']->value),$_smarty_tpl);?>
-->
					  <SELECT NAME=eligeJornada id=eligeJornada>
						<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['jornada'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['name'] = 'jornada';
$_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['misJornadas']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['jornada']['total']);
?>
							<OPTION value="<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['jornada']['iteration'];?>
"><?php echo $_smarty_tpl->tpl_vars['misJornadas']->value[$_smarty_tpl->getVariable('smarty')->value['section']['jornada']['index']];?>
</OPTION>
						<?php endfor; endif; ?>
						</SELECT>					
				<?php }?>
			</div>		
		</div>
	</div>
<script src="libs/jquery-1.5.0.js"></script>
<script src="js/principal.js"></script>
</body>
</html><?php }} ?>