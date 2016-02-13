<?php 

	$con = mysql_connect("localhost","admin","admin");
	if(! $con){ die ("ERROR CONEXION MYSQL: " . mysql_error());}
	$db= mysql_select_db("escuela",$con);
	if (! $db){die ("ERROR CONEXION BD: " . mysql_error());}
	
	$nombreCon = isset($_POST['nombreCon']) ? $_POST['nombreCon'] : NULL;
	$apellidoCon = isset($_POST['nombreRep']) ? $_POST['nombreRep'] : NULL;
	$cedulaCon = isset($_POST['cedulaCon']) ? $_POST['cedulaCon'] : NULL;
	$tipoLicencia = isset($_POST['tipoLicencia']) ? $_POST['tipoLicencia'] : NULL;
	$telefonoCon = isset($_POST['telefonoCon']) ? $_POST['telefonoCon'] : NULL;
	$modelo = isset($_POST['modelo']) ? $_POST['modelo'] : NULL;
	$placa = isset($_POST['placa']) ? $_POST['placa'] : NULL;
	$anno = isset($_POST['anno']) ? $_POST['anno'] : NULL;
	$ruta = isset($_POST['ruta']) ? $_POST['ruta'] : NULL;
	$codigo = isset($_POST['codigo']) ? $_POST['codigo'] : NULL;
	
/* ***eLIMINAR*** ***eLIMINAR*** ***eLIMINAR*** ***eLIMINAR*** ***eLIMINAR*** ***eLIMINAR***  */
	$radio=$_POST['radio'];
		if($_POST['radio']=='Eliminar'){
		$sql = "DELETE FROM conductor WHERE cedulaCon='$_POST[cedulaCon]'";
		$result = mysql_query($sql);
		if (! $result)
		//{die ('ERROR AL ELIMINAR EL REGISTRO'. mysql_error());}
		{header("Location:../notificaciones/00.php");}
		else
		{header("Location:../notificaciones/4.php");}
		
		}


/* ***MODIFICAR*** ***MODIFICAR*** ***MODIFICAR*** ***MODIFICAR*** ***MODIFICAR*** ***MODIFICAR***  */

	if($_POST['radio']=='Modificar'){
		$codigo='$_POST[codigo]';
		$sql="UPDATE conductor SET nombreCon='$_POST[nombreCon]',
										 apellidoCon='$_POST[apellidoCon]',
										 cedulaCon='$_POST[cedulaCon]',
										 tipoLicencia='$_POST[tipoLicencia]',
										 telefonoCon='$_POST[telefonoCon]',
										 modelo='$_POST[modelo]',
										 placa='$_POST[placa]',
										 anno='$_POST[anno]',
										 ruta='$_POST[ruta]',
									 WHERE cedulaCon='$_POST[cedulaCon]'";
		$result = mysql_query($sql);
					if (! $result)
					//{die ('ERROR AL ELIMINAR EL REGISTRO'. mysql_error());}
					{header("Location:../notificaciones/00.php");}
					else{
					//{die ('ERROR AL guardarO'. mysql_error());}
					header("Location:../notificaciones/4.php");
						}
					{header("Location:../notificaciones/5.php");}
			}

/* ***IMPRIMIR*** ***IMPRIMIR*** ***IMPRIMIR*** ***IMPRIMIR*** ***IMPRIMIR*** ***IMPRIMIR***  */

	if($_POST['radio']=='Imprimir'){
	
	require_once('lib/ezpdf.php');
	


	$sql = "SELECT * FROM  conductor WHERE cedulaCon='$_POST[cedulaCon]'";
	//result
	$resSql=mysql_query($sql) or die("<br>Error consulta</br>".mysql_error());

	$pdf = new Cezpdf('A3');
	$pdf->selectFont('fonts/Helvetica.afm');
	//$pdf->ezText('<b>Colegio </b>',20,array('justification'=>'left'));
	while($row=mysql_fetch_row($resSql)){
	$data[]=array(

			 'Nombre'=>$row[1],
			 'Apellido'=>$row[2],
			 'C.I'=>$row[3],
			 'Tipo de Licencia'=>$row[4],
			 'Telefono'=>$row[5],
			 'Modelo de Veh'=>$row[6],
			 'Placa de Veh'=>$row[7],
			 'Año'=>$row[8],
			 'Ruta Asiganada'=>$row[9]
			 );
	}
		$options = array(
		'shadeCol'=>array(10.20,10.20,10.20),
		'xOrientation'=>'center',
		'width'=>800,); 

	$titles = array('ID'=>array('justification'=>'center'),
				'Nombre'=>array('justification'=>'center', 'width' => '30'), 
				'Apellido'=>array('justification'=>'center', 'width' => '30'), 
				'C.I'=>array('justification'=>'center', 'width' => '30'), 
				'Tipo de Licencia'=>array('justification'=>'center', 'width' => '30'), 
				'Modelo de Veh'=>array('justification'=>'center', 'width' => '30'), 
				'Placa del Veh'=>array('justification'=>'center', 'width' => '30'), 
				'Año'=>array('justification'=>'center', 'width' => '30'), 
				'Ruta Asignada'=>array('justification'=>'center', 'width' => '30'), 
				
				);

	$txttitle = "Colegio Cardenal JH Quintero"."\n";
	//$pdf->ezImage($image="../img/logo.png", $pad = 0,$width = 200,$resize = 'none',$just = 'left',$border = '');
	//$pdf->addImage($img="logo.png",$x=80,$y=0,$w=200,$h=0,$quality=75);
	$pdf->ezImage("logo.png", 0, 420, 'none', 'left');
	$pdf->ezText($txttitle, 20);
	$pdf->ezText('Fecha: '.date('d/m/Y')."\n", 10);
    $pdf->ezText('Hora: '.date('H:i:s')."\n\n", 10);

	$pdf-> addImage($img,120,300,400,400);				
	ob_end_clean();
	$pdf->ezTable($data);
	$pdf->ezStream();

}	
?>