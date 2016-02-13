<?php
SetFillColor(62,102,60); // fondo de celda 
$this->SetTextColor(255); // color del texto 
$this->SetDrawColor(0,0,0); // color de linea 
$this->SetLineWidth(.3); // ancho de linea 
$this->SetFont('Arial','', 7); 
$w=array(20,100,15,10,15,15,15); // en este arreglo definiremos el ancho de cada columna 
for($i=0;$iCell($w[$i],4,$header[$i],1,0,'C',1); //por cada encabezado existente, crea una celda 

//Colores, ancho de línea y fuente en negrita de CONTENIDO 
$this->SetFillColor(244,244,244); // 
$this->SetTextColor(0); 
$this->SetFont(''); 
//Datos 
$fill=false; // variable para alternar relleno 
foreach($data as $row) 
{ 
$columna = explode(";",$row); //separar los datos en posiciones de arreglo 
$this->Cell($w[0],6,$columna[0],'LR',0,'L',$fill); //celda(ancho,alto,salto de linea,border,alineacion,relleno) 
$this->Cell($w[1],6,$columna[1],'LR',0,'L',$fill); 
$this->Cell($w[2],6,$columna[2],'LR',0,'L',$fill); 
$this->Cell($w[3],6,$columna[3],'LR',0,'L',$fill); 
$this->Cell($w[4],6,$columna[4],'LR',0,'L',$fill);
$this->Cell($w[5],6,$columna[5],'LR',0,'L',$fill); 
$this->Cell($w[6],6,$columna[6],'LR',0,'L',$fill);
$this->Ln(); 
$fill=!$fill; //se alterna el valor del boolean $fill para cambiar relleno 
} 
$this->Cell(array_sum($w),0,'','T'); 
} 
function tabla1($header1,$data1) 
{ 
//Colores, ancho de línea y fuente en negrita de CABECERA 
$this->SetFillColor(62,102,60); // fondo de celda 
$this->SetTextColor(255); // color del texto 
$this->SetDrawColor(0,0,0); // color de linea 
$this->SetLineWidth(.3); // ancho de linea 
$this->SetFont('Arial','', 6); // negrita 
$w=array(70); // en este arreglo definiremos el ancho de cada columna 
for($i=0;$iCell($w[$i],4,$header1[$i],1,0,'C',1); //por cada encabezado existente, crea una celda 
$this->Ln(); 
//Colores, ancho de línea y fuente en negrita de CONTENIDO 
$this->SetFillColor(244,244,244); // 
$this->SetTextColor(0); 
$this->SetFont(''); 
//Datos 
$fill=false; // variable para alternar relleno 
foreach($data1 as $row) 
{ 
$columna = explode(";",$row); //separar los datos en posiciones de arreglo 

// validación a mano para que respete el limite de la celda

if ($columna[0]>$w[0]){
$this->Cell($w[0],20,$columna[0],'LR',1,'L',$fill); //celda(ancho,alto,salto de linea,border,alineacion,relleno) 
}
else{
$this->Cell($w[0],5,substr($columna[0],0, 45),'LR',1,'L',$fill); 
$this->Cell($w[0],5,substr($columna[0],45,53),'LR',1,'L',$fill); 
$this->Cell($w[0],5,substr($columna[0],99,150),'LR',1,'L',$fill); 
$this->Ln(0); 
}
$fill=!$fill; //se alterna el valor del boolean $fill para cambiar relleno 
} 
$this->Cell(array_sum($w),0,'','T'); 
} 
function Footer() 
{ 
//Pie de página 
$this->SetY(-15); 
$this->SetFont('Arial','I',10); 
$this->SetTextColor(128); 
$this->Cell(0,10,'Pagina '.$this->PageNo().' de {nb}',0,0,'C'); // el parametro {nb} es generado por una funcion llamada AliasNbPages 
} 
} 
$pdf = new PDF(); 
$pdf->AliasNbPages(); //funcion que calcula el numero de paginas
$sql1 = "SELECT informacion FROM empresa"; 
$modificar11 = mysql_query($sql1, $conex) or die(mysql_error());
$head1 = array("VENEZOLANA DE RIEGO, C.A"); // cabecera 
$i=0; 
while ($fila=mysql_fetch_array($modificar11)){ //llenar variable dat con los campos de una fila unidos por ; 
$dat1[$i]=$fila[0]; //concatenar para luego ser separado por explode() 
$i++; 
} 
$sql = "SELECT codigo, descripcion, unidad, cantidad, precio_uni, descuento, total FROM orden_articulos where orden='10733'"; 
$modificar1 = mysql_query($sql, $conex) or die(mysql_error());
$head = array("Codigo","Descripcion","Unidad","Cant","Precio","Dcto","Total"); // cabecera 
$i=0; 
while ($fila=mysql_fetch_array($modificar1)){ //llenar variable dat con los campos de una fila unidos por ; 
$dat[$i]=$fila[0].";".($fila[1]).";".$fila[2].";".$fila[3].";".$fila[4].";".$fila[5].";".$fila[6]; //concatenar para luego ser separado por explode() 
$i++; 
} 
$pdf->AddPage(); //crear documento 
$pdf->Image('images/logo.jpg',10,8,30,30); //añadir imagen 
$pdf->Cell(50); 
$pdf->SetFont('Arial','',12); 
$pdf->Cell(120,15,"ORDEN DE COMPRA",0,0,'C'); 
$pdf->Ln(35); 
$pdf->SetFont('Arial','',12); 
$pdf->Ln(10); 
$pdf->tabla1($head1,$dat1); 
$pdf->Ln(30); 
$pdf->tabla($head,$dat);
$pdf->Output(); //el resto es historia 
?>