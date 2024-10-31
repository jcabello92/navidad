<?php session_start();
include("conexion.php");?>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Insertar Datos Del menor</title>
<link href="estilos/css-menu.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="css/estilo_galeria.css"/>
<style type="text/css">
#apDiv3 {
	position:absolute;
	width:700px;
	height:301px;
	z-index:2;
	left: 550px;
	top: 355px;
}
</style>
</head>
<body>
<div id="espectro">
<div id="apDiv1">
  <?php include("marquesina/marquesina.php");?>
  </div>
<?php include ("div/header.php"); ?> 
 <?php include ("menu/menu.php"); ?>
<div id="main_content">	
<?php  include("cale.php"); ?>

<div id="apDiv3"><ul id="movieposters">
			<li>
				<img src="imagenes/01_iron_man_2.jpg" alt="Iron Man 2" />
			</li>
			<li>
				<img src="imagenes/02_the_last_airbender.jpg" alt="The Last Airbender" />
			</li>
			<li>
				<img src="imagenes/03_tron_legacy.jpg" alt="Tron Legacy" />
			</li>
            
</ul></div>

</div>			          
<div id="footer"><a href="">© 2013 Municipalidad de Curicó - Todos los derechos reservados</a></div>
</div>
</body>
</html>