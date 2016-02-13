<?php 
    session_start(); 
    include('../cn/acceso_db.php'); 
?>
<html>
<head>

	<meta charset = "utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut" href="favicon.ico" type="img/favicon.ico" />
	<link rel="stylesheet" href="../lib/bootstrap.min.css">
    <link rel="stylesheet" href="../lib/bootstrap-theme.min.css">

    <link rel="stylesheet" type="text/css" href="../css/main.css">
	<link rel="stylesheet" type="text/css" href="../css/animate.css">

	<link href='https://fonts.googleapis.com/css?family=Amaranth:700' rel='stylesheet' type='text/css'>	
	<link href='https://fonts.googleapis.com/css?family=Amaranth:700' rel='stylesheet' type='text/css'>	
	<title>Datos de Alumnos</title>
</head>

<body class="animated fadeInDown retraso-1 letra">
	
	<nav class="se-gris padding-largo text-center ">
			<ul class="no-lista ">
			<?php 
	    	if(isset($_SESSION['usuario_nombre'])) { 
				?>
			<li><a href="principal.html">CardenalQuintero</a></li> 
	       	<li> Bienvenido:<a href="perfil.php?id=<?=$_SESSION['usuario_id']?>">
	       	<li><?=$_SESSION['usuario_nombre']?></a></li>
	        <li><a href="cn/logout.php">Cerrar Sesión</a></li> 
			<?php 
	    	} 
			?>
			</ul>
	</nav>
	<?php 
	error_reporting(E_ALL ^ E_DEPRECATED);
	$con = mysql_connect("localhost","admin","admin");
	$db= mysql_select_db("escuela",$con);
	if(! $con){header("Location:../notificaciones/00.php");}
	if (! $db){die ("ERROR CONEXION BD: " . mysql_error());}
	error_reporting(E_ALL ^ E_NOTICE);
	$sql = "SELECT * FROM  registroalumnos WHERE cedulaRep LIKE '%" .$codigo. "%'";
	$result = mysql_query ($sql);
	//Verificamos que se haya ejecutado correctamente la consulta
	if (! $result)
	{echo "La consulta SQL contiene errores.".mysql_error();exit();}
	else {echo "<form name='ejecuta' method='post' action='ejecuta.php'>";
	$i=0;
	$row = mysql_fetch_row($result);
	
	echo"<div class='row center-block'>
			<h1 class='text-center colormenu' >Datos de Alumnos</h1>
			<table  class='table table-hover espacio-arriba table-hover'>
			<tbody>
				<tr><td>Id</td><td>".$row[0]."</td></tr><tr><td>Nombre</td><td> 
				<input class='col-xs-5'  type='text'name='nombreRep' value='".$row[1]."'/></td></tr><tr><td>Apellido</td><td>
				<input class='col-xs-5' type='text'name='apellidoRep' value='".$row[2]."'/></td></tr><tr><td>Cedula</td><td> 
				<input class='col-xs-5' type='text'name='cedulaRep' value='".$row[3]."'/></td></tr><tr><td>Telefono del Representante</td><td>
				<input class='col-xs-5' type='text'name='telefonoRep' value='".$row[4]."'/></td></tr><tr><td>nombre del Alumno</td><td>
				<input class='col-xs-5' type='text'name='nombreAlum' value='".$row[5]."'/></td></tr><tr><td>apellido Alumno</td><td>
				<input class='col-xs-5' type='text'name='apellidoAlum' value='".$row[6]."'/></td></tr><tr><td>Carnet del Alumno</td><td>
				<input class='col-xs-5' type='text'name='cedulaDni' value='".$row[7]."'/></td></tr><tr><td>Salon Asignado</td><td>
				<input class='col-xs-5' type='text'name='salonAsignado' value='".$row[8]."'/></td></tr><tr><td>Direccion de Habitacion</td><td>
				<input class='col-xs-5' type='text'name='direccion' value='".$row[8]."'/></td></tr><tr><td>unidad Asignada</td><td>
				<input class='col-xs-5' type='text' name='unidaAsignada' value='".$row[10]."'/></td></tr>
			</tbody>
			</table>
		</div>
		<div align ='center'>
			<a href='../principal.php'><button type='button' class='btn btn-default espacio-derecha''>Atras</button></a>
			<input type='submit' name='radio' value='Modificar'  class='btn btn-info  espacio-derecha'>
 			<input type='submit' name='radio' value='Imprimir'   class='btn btn-info espacio-derecha'>
			<input type='submit' name='radio' value='Eliminar'   class='btn btn-danger espacio-derecha'>
		</div>
	</form>
	</div>		
	</div>";

}
?>
</body>
</html>