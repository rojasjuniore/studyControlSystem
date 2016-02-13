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


	 	<title>Registro Alumnos</title>
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
	<h1 class="pacifico  grande colormenu titulo">Registro de Alumnos</h1>
	
	<form action="php/registroAlum.php" method="post"> 
        
    <div class="col-xs-3 inline-block quitar-float">
		<article>
				
				<h3>Representante</h3>
				<label  for="cedula" class="espacio-arriba2">Nº de Cedula</label>
				<input  type="cedula" 
						class="form-control"
						name="cedulaRep"
						pattern="[0-9]{6,9}" required="" id="cedula"
						placeholder="Ej: 12345678">

				<label  for="nombre" class="espacio-arriba2">Nombre</label>
				<input  type="text" 
						class="form-control" 
						name="nombreRep"	
						required pattern="[a-z ]+" 
						placeholder=" Nombre del Representante" >
				
				<label  for="apellido" class="espacio-arriba2">Apellido</label>
				<input 	type="text" 
						class="form-control" 
						name="apellidoRep"
						required pattern="[a-z ]+"
						placeholder=" Apellido del Representante">
					
				<label for="telefono" class="espacio-arriba2">Nº de Telefono</label>
				<input  type="text" 
						class="form-control"
						name="telefonoRep"
						required  pattern="\d{4}[\-]\d{7}"
						placeholder="Ej: 0416-1234567">
		</article>
	</div>
	<div class="col-xs-3 inline-block quitar-arriba quitar-float">
		
		<article >
				<h3>Alumno</h3>

					<label for="nombreAlumno" class="espacio-arriba2">Nombre</label>
					<input type="text" 
							class="form-control" 
							name="nombreAlum"
							required pattern="[a-z ]+" 
							placeholder="Nombre del Alumno">
					
					<label for="apellidoAlumno" class="espacio-arriba2">Apellido</label>
					<input  type="text" 
							class="form-control" 
							name="apellidoAlum"
							required pattern="[a-z ]+" 
							placeholder="Apellido del Alumno">

					<label for="cedulaDni" class="espacio-arriba2">Nº de Carnet</label>
					<input type="text" 
						   class="form-control" 
						   name="cedulaDni"
						   required pattern="[0-9]{4}" 
						   placeholder="Ej: 1234">

					<label for="cedulaDni" class="espacio-arriba2">Salon Asignado</label>
					<select multiple class="form-control" name="salonAsignado"  required>
						  <option>Seleccione..</option>
						  <option>1A123</option>
						  <option>1B456</option>
						  <option>1B789</option>
						  <option>2C123</option>
						  <option>2C456</option>
						  <option>2C789</option>
						  <option>3D123</option>
						  <option>3D456</option>
						  <option>3D789</option>
					</select>
  		</article>
	</div>
			
		
	<div class="col-xs-6 inline-block espacio-arriba">
		
		<article>
				<h3>Direccion de casa</h3>
				<textarea class="form-control" name="direccion" rows="3" required></textarea>
		</article>
	</div>
		
	<div class="col-xs-6 inline-block espacio-arriba">
			
		<article>
			
			<h3>Unidad Asignada</h3>
				<select multiple class="form-control" name="unidaAsignada">
						  <option>Seleccione..</option>
						  <option>Unidad 1 (Catia)</option>
						  <option>Unidad 2 (Propatria)</option>
						  <option>Unidad 3 (Boqueron)</option>
						  <option>Unidad 4 (EL Junquito)</option>
						  <option>Unidad 5 (Parque Central)</option>
				</select>
  		</article>
	</div>
		
	<div class="espacio-arriba1">
		<a href="principal.php"><button type="button" class="btn btn-default espacio-derecha">Atras</button></a>
        <input type="submit" name="enviar" value="Registrar" class="btn btn-default espacio-derecha" /> 
        <input type="reset" value="Borrar" class="btn btn-default espacio-derecha  espacio-derecha" /> 
    </div>
    
    </form>
 </body>
 </html> 





