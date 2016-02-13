
<?php 

	$con = mysql_connect("localhost","admin","admin");
	if(! $con){ die ("ERROR CONEXION MYSQL: " . mysql_error());}
	$db= mysql_select_db("escuela",$con);
	if (! $db){die ("ERROR CONEXION BD: " . mysql_error());}
	
	
	$idAlumnos = isset($_POST['idAlumnos']) ? $_POST['idAlumnos'] : NULL;
	$nombreRep = isset($_POST['nombreRep']) ? $_POST['nombreRep'] : NULL;
	$ApellidoRep = isset($_POST['ApellidoRep']) ? $_POST['ApellidoRep'] : NULL;
	$telefonoRep = isset($_POST['telefonoRep']) ? $_POST['telefonoRep'] : NULL;
	$nombreAlum = isset($_POST['nombreAlum']) ? $_POST['nombreAlum'] : NULL;
	$apellidoAlum = isset($_POST['apellidoAlum']) ? $_POST['apellidoAlum'] : NULL;
	$cedulaDni = isset($_POST['cedulaDni']) ? $_POST['cedulaDni'] : NULL;
	$salonAsignado = isset($_POST['salonAsignado']) ? $_POST['salonAsignado'] : NULL;
	$direccion = isset($_POST['direccion']) ? $_POST['direccion'] : NULL;
	$unidaAsignada = isset($_POST['unidaAsignada']) ? $_POST['unidaAsignada'] : NULL;
	$codigo = isset($_POST['codigo']) ? $_POST['codigo'] : NULL;




	$radio=$_POST['radio'];
		
		if($_POST['radio']=='Eliminar'){

		$sql = "DELETE FROM registroalumnos WHERE cedulaRep='$_POST[cedulaRep]'";

			
		$result = mysql_query($sql);
				
		if (! $result)

		//{die ('ERROR AL ELIMINAR EL REGISTRO'. mysql_error());}
		{header("Location:../notificaciones/00.php");}
		else
		{header("Location:../notificaciones/4.php");}
		
		}



	if($_POST['radio']=='Modificar'){

		$codigo='$_POST[codigo]';

		$sql="UPDATE registroalumnos SET nombreRep='$_POST[nombreRep]',
										 apellidoRep='$_POST[apellidoRep]',
										 cedulaRep='$_POST[cedulaRep]',
										 telefonoRep='$_POST[telefonoRep]',
										 nombreAlum='$_POST[nombreAlum]',
										 apellidoAlum='$_POST[apellidoAlum]',
										 cedulaDni='$_POST[cedulaDni]',
										 salonAsignado='$_POST[salonAsignado]',
										 direccion='$_POST[direccion]',
										 unidaAsignada='$_POST[unidaAsignada]' 
										 WHERE cedulaRep='$_POST[cedulaRep]'";

		$result = mysql_query($sql);

		if (! $result)
			//{die ('ERROR AL ELIMINAR EL REGISTRO'. mysql_error());}
			
			{header("Location:../notificaciones/00.php");}

		else
		{
			//{die ('ERROR AL guardarO'. mysql_error());}
			header("Location:../notificaciones/4.php");
		}
				{header("Location:../notificaciones/5.php");}
	}
/* ***IMPRIMIR*** ***IMPRIMIR*** ***IMPRIMIR*** ***IMPRIMIR*** ***IMPRIMIR*** ***IMPRIMIR***  */

	
	if($_POST['radio']=='Imprimir'){

	
	require_once('class.ezpdf.php');
	


	$sql = "SELECT * FROM  registroalumnos WHERE cedulaRep LIKE '%" .$codigo. "%'";
	//result
	$resSql=mysql_query($sql) or die("<br>Error consulta</br>".mysql_error());

	$pdf = new Cezpdf('A4');
	$pdf->selectFont('fonts/Helvetica.afm');

	

	//$pdf->ezText('<b>Colegio </b>',20,array('justification'=>'left'));
	

	while($row=mysql_fetch_row($resSql)){
		
	$data[]=array(

			  'Nombre Representante'=>$row[1],
			  'APellido Representante'=>$row[2],
			  'Telefono'=>$row[3],
			  'Cedula de Representante'=>$row[4],
			 /* 'Nombre Alumno'=>$row[5],
			  'Apellido ALumno'=>$row[6],
			  'Nº de Carnet'=>$row[7],
			  'Salon Asignado'=>$row[8],
			  'Direccion'=>$row[9],
			  'Unidad Asignada'=>$row[10],
			  'Salon Asignado'=>$row[11]*/
			  );
	}
		$options = array(
		'shadeCol'=>array(10.20,10.20,10.20),
		'xOrientation'=>'center',
		'width'=>800,
	); 

	$titles = array('ID'=>array('justification'=>'center'),
				'NombreRep'=>array('justification'=>'center', 'width' => '30'), 
				'APellido Representante'=>array('justification'=>'center', 'width' => '30'), 
				'Cedula Representante'=>array('justification'=>'center', 'width' => '30'), 
				'Nombre Alumno'=>array('justification'=>'center', 'width' => '30'), 
				'Apellido ALumno'=>array('justification'=>'center', 'width' => '30'), 
				'Carnet'=>array('justification'=>'center', 'width' => '30'), 
				'Salon Asignado'=>array('justification'=>'center', 'width' => '30'), 
				'Direccion'=>array('justification'=>'center', 'width' => '30'), 
				'Unidad Asignada'=>array('justification'=>'center', 'width' => '30'), 
				'Salon Asignado'=>array('justification'=>'center', 'width' => '30'),
			 
				);


					

	$pdf->ezTable($data);
	$pdf->ezStream();

}	
?>