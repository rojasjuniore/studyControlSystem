<?php 
    session_start(); 
    include('cn/acceso_db.php'); 
?>

<HTML>
<HTML>
<HEADER>
	<meta charset = "utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut" href="favicon.ico" type="img/favicon.ico" />
	
	<link rel="stylesheet" href="lib/bootstrap.min.css">
    <link rel="stylesheet" href="lib/bootstrap-theme.min.css">
	
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/animate.css">

	<script type="text/javascript" src="lib/alertify.js"></script>
	<link rel="stylesheet" href="themes/alertify.core.css" />
	<link rel="stylesheet" href="themes/alertify.default.css" />

	<link href='https://fonts.googleapis.com/css?family=Amaranth:700' rel='stylesheet' type='text/css'>	
	
	<title>Menu: Colegio: Cardenal J.H. Quintero</title>
</HEADER>
<body  class="animated fadeInDown  letra">
		
	<nav class="se-gris padding-largo text-center">

		<ul class="no-lista">
		
		
		<?php 
    	if(isset($_SESSION['usuario_nombre'])) { 
			?>
		<li class="col-md-3 inline-block mediano "><a href="principal.html">CardenalQuintero</a></li> 
       	<li > Bienvenido: <a href="perfil.php?id=<?=$_SESSION['usuario_id']?>">
       	<strong><?=$_SESSION['usuario_nombre']?></strong></a><br /></li><a href="index.php">
        Cerrar Sesión</a> 
	<?php 
    } 
?>
		</ul>
	</nav>

	<section>
		
		<div class="text-center">
			<h1 class="  grande colormenu">Colegio Cardenal J.H. Quintero</h1>
			
			
			
		<div class="col-xs-4 col-md-4 col-sm-6 inline-block ">
			<article>
				<h3>Registro de Alumno</h3>
				<a href="registrarAlumnos.php">
				<img src="img/imgPricipal/alumnos.png"></a>
			</article>
		</div>
			
		<!--<div class="col-xs-3 col-md-3 col-sm-6 inline-block ">
			<article>
				<h3>Registro de Usuario</h3>
				<a href="registrarUsuario.php">
				<img src="img/imgPricipal/usuario.png"></a>
			</article>
		</div>-->
		<div class="col-xs-4 col-md-4 col-sm-6 inline-block espacio-arriba ">
			<article>
				<h3>Registro de Chofer</h3>
				<a href="registroChofer.php">
				<img src="img/imgPricipal/chofer.png"></a>
			</article>
			</article>
		</div>		
		
		<div class="col-xs-4 col-md-4 col-sm-6 inline-block ">
			<article>
				<h3>Consultar Alumno</h3>
				<a href="consultarAlumno.php">
				<img src="img/imgPricipal/consulta.png"></a>
			</article>
			</article>
		</div>
		
		<!--<div class="col-xs-3 col-md-3 col-sm-6 inline-block espacio-arriba">
			<article>
			<h3>Registrar Bus</h3>
			<a href="registrarVehiculos.php">
			<img src="img/imgPricipal/busRes.png"></a>
			</article>
			</article>
		</div>-->
	
		<div class="col-xs-4 col-md-4 col-sm-6 inline-block espacio-arriba ">
			<article>
				<h3>Consultar Ruta</h3>
				<a href="consultarRuta.php">
				<img src="img/imgPricipal/busCon.png"></a>
			</article>
		</div>

					
	    </div>
	    
		
	</section>

</BODY>
</HTML>