
<?php 
    session_start(); 
    include('cn/acceso_db.php'); 
?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset = "utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- Librerias CSS-->
	 <link rel="stylesheet" href="lib/bootstrap.min.css">
    <link rel="stylesheet" href="lib/bootstrap-theme.min.css">
	
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<link rel="stylesheet" href="themes/alertify.core.css" />
	<link rel="stylesheet" href="themes/alertify.default.css" />
	<!-- ***FIN*** Librerias CSS-->
	
	<!-- Librerias JavaScript-->
	<script type="text/javascript" src="lib/alertify.js"></script>
	<script type="text/javascript" src="lib/validaciones.js"></script>
	<!-- FIn Librerias JavaScript-->
	
	<!-- Librerias Letras google Font-->
	<link href='https://fonts.googleapis.com/css?family=Amaranth:700' rel='stylesheet' type='text/css'>	
	<link href='https://fonts.googleapis.com/css?family=Gentium+Basic:700' rel='stylesheet' type='text/css'>
	<!-- fin letras Letras google Font-->


 	<title>Registro Vehiculo</title>
 </head>
 <body  class="animated fadeInDown letraFor letra">

	<nav class="se-gris padding-largo text-center">
		<ul class="no-lista">
			<li class="col-md-3 inline-block mediano pacifico"><a href="principal.php">Inicio</a></li> 
			
			<?php 
    			if(isset($_SESSION['usuario_nombre'])) { 
			?>
			<li> Usuario: <a href="perfil.php?id=<?=$_SESSION['usuario_id']?>">
       	<strong><?=$_SESSION['usuario_nombre']?></strong></a><br /></li>
        <a href="../index.php">Cerrar Sesión</a> 
        		<?php 
    } 
?>
	</nav>

<section>
<div class="text-center">
		<h1 class="pacifico  grande colormenu titulo">Registro de Vehiculo</h1>
		
<form action="php/registroVehiculos.php" method="post"> 

	<div class="col-xs-4 inline-block quitar-float">
		
		<article>
				<h3>Unidad de Trasponte</h3>
					
				<label for="Modelo">Modelo</label>
				<input type="text" class="form-control" name="modelo"
					placeholder="Introduce modelo del vehiculo" required>
			
				<label for="Año" class="espacio-arriba2">Año</label>
				<input type="text" class="form-control" name="anno"
							pattern="[0-9]{4}" required=""
							placeholder="Ej; 1900" >
					
				<label for="placa" class="espacio-arriba2">placa</label>
				<input type="text" class="form-control" name="placa"
							placeholder="Introduce placa del vehiculo" 
							pattern="[0-9]{10}" required="">
					
				<h3>Unidad Asignada</h3>
				<select multiple class="form-control" name="ruta" required="">
						  <option>Seleccione..</option>
						  <option>Unidad 1 (Catia)</option>
						  <option>Unidad 2 (Propatria)</option>
						  <option>Unidad 3 (Boqueron)</option>
						  <option>Unidad 4 (EL Junquito)</option>
						  <option>Unidad 5 (Parque Central)</option>
				</select>
		</article>
	
	</div>
			
			<div align ='center'>
						
					<a href="../principal.php"><button type="button" class="btn btn-default espacio-derecha">Atras</button></a>
							
					<input type="submit" name="radio" value="Modificar"  class="btn btn-info  espacio-derecha">
 			  
 			 		<input type="submit" name="radio" value="Imprimir"   class="btn btn-info espacio-derecha">

 			 		<input type="submit" name="radio" value="Eliminar"   class="btn btn-danger espacio-derecha">
		      </div>	
 </form>
</div>
		
</section>

</BODY>
</HTML>