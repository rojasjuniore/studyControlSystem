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
	<title>Consultar de Ruta Escolar</title>
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
	$sql = "SELECT * FROM  conductor WHERE cedulaCon LIKE '%" .$codigo. "%'";
	$result = mysql_query ($sql);
	if (! $result){echo "La consulta SQL contiene errores.".mysql_error();exit();}


else {

  echo "<form name='ejecuta' method='post' action='ejecuta_1.php'>";
			$i=0;
  $row = mysql_fetch_row($result);
  echo "<div class='row center-block'>
		<h1 class='text-center colormenu' >Datos de Conductor</h1>
		<table   class='table table-hover espacio-arriba table-hover''>
		<tbody>
				<tr><td>Id</td><td>".$row[0]."</td></tr>
				<tr><td>Nombre</td><td><input class='col-xs-5' type='text'name='nombreCon' value='".$row[1]."'/></td></tr>
				<tr><td>Apellido</td><td><input class='col-xs-5' type='text'name='apellidoCon' value='".$row[2]."'/></td></tr>
				<tr><td>Cedula</td><td><input  class='col-xs-5'type='text'name='cedulaCon' value='".$row[3]."'/></td></tr
				<tr><td>Tipo Licencia</td><td><input class='col-xs-5'type='text'name='tipoLicencia' value='".$row[4]."'/></td></tr>
				<tr><td>Telefono</td><td><input class='col-xs-5'type='text'name='telefonoCon' value='".$row[5]."'/></td></tr>
				<tr><td>Modelo del Vehiculo</td><td><input class='col-xs-5'type='text'name='modelo' value='".$row[6]."'/></td></tr>
				<tr><td>Placa del Vehiculo</td><td><input class='col-xs-5'type='text'name='placa' value='".$row[7]."'/></td></tr>
				<tr><td>Año del Vehiculo</td><td><input class='col-xs-5'type='text'name='anno' value='".$row[8]."'/></td></tr>
				<tr><td>Ruta Asignada</td><td><input class='col-xs-5'type='text'name='ruta' value='".$row[8]."'/></td></tr>
		</tbody>
		</table>
		</div>
			<div align ='center'>
					<a href='../principal.php'><button type='button' class='btn btn-default espacio-derecha''>Atras</button></a>
					<input type='submit' name='radio' value='Modificar'  class='btn btn-info  espacio-derecha'>
		 			<input type='submit' name='radio' value='Imprimir'   class='btn btn-info espacio-derecha' target='_blank'>
					<input type='submit' name='radio' value='Eliminar'   class='btn btn-danger espacio-derecha' >
			</div>
		</form>
			</div>		
		</div>";
	}
?>
</body>
</html>