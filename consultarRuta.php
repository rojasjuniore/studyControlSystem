<?php 
    session_start(); 
    include('cn/acceso_db.php'); 
?>
<html>
<header>
	
	<meta charset = "utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut" href="favicon.ico" type="img/favicon.ico" />
	
	<link rel="stylesheet" href="lib/bootstrap.min.css">
    <link  rel="stylesheet" href="lib/bootstrap-theme.min.css">
	
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/animate.css">

	<link href='https://fonts.googleapis.com/css?family=Amaranth:700' rel='stylesheet' type='text/css'>	
	<title>Consultar de Ruta Escolar</title>

</header>

<body class="letra animated fadeInDown letraFor letra">

	<nav class="se-gris padding-largo text-center">
		<ul class="no-lista">
			 <?php 
			    	if(isset($_SESSION['usuario_nombre'])) { 
			?>
						<li class="col-md-3 inline-block mediano "><a href="principal.html">
						CardenalQuintero</a></li> 
				       	<li > Usuario: <a href="perfil.php?id=<?=$_SESSION['usuario_id']?>">
				       	<strong><?=$_SESSION['usuario_nombre']?></strong></a><br />
				       </li>
				        <a href="../index.php">Cerrar Sesión</a>
			<?php 
			    } 
			?>
		</ul>
	</nav>

<form name="consulta1" method="post" action="consultasphp/consulta_1.php">

	<div class="col-xs-3 col-md-3 col-sm-6 center-block quitar-float text-center espacio-arriba">
		
		
		<h2>Consultar de Ruta Escolar</h2>
		<label class=" espacio-arriba">Introduzca Cedula</label>
		<input 	type="text" name="codigo"  class="form-control"  placeholder="Ej: 20123456">
	</div>
	<div class="col-xs-3 col-md-3 col-sm-6 center-block quitar-float text-center espacio-arriba">
		
		<a href="principal.php"><button type="button" class="btn btn-info espacio-derecha1">Atras</button></a>
		<input  type="submit" value="Aceptar" class="btn btn-info ">
	</div>
<!--
	<button type="submit" value="Aceptar">class="btn btn-link"  Ver todos los Registros
	</div>


		<div class="col-md-3 center-block quitar-float text-center espacio-arriba">
		
		<button  type="reset" 
				 value="Borrar" 
				 class="btn btn-default espacio-derecha">Limpiar
		</button>
		
		<button  type="submit" 
				 name="enviar" 
				 value="boton2"
				 onClick="envia('imp.php?id2')" 
				 class="btn btn-default" >Consultar
		</button>	</button>
	</div>	
	Codigo del producto:
	<input type="text" name="codigo" maxlength="10">
	<input type="submit" value="Aceptar">
-->

</form>
</body>
</html>
