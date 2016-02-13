<?php  
    function Conectarse()  
    { if (!($link=mysql_connect("localhost","admin","admin")))  
    { echo "Error conectando a la base de datos.";  
      exit(); }  
    if (!mysql_select_db("escuela",$link))  
    {  echo "Error seleccionando la base de datos.";  
      exit(); }  
    return $link;  
    }  
  
  if(isset($_POST['enviar'])){

   $nombreCon = $_POST["nombreCon"];  
   $apellidoCon = $_POST["apellidoCon"];
   $cedulaCon = $_POST["cedulaCon"]; 
   $tipoLicencia = $_POST["tipoLicencia"];
   $telefonoCon = $_POST["telefonoCon"]; 
   $modelo = $_POST["modelo"]; 
   $placa = $_POST["placa"]; 
   $anno = $_POST["anno"]; ; 
   $ruta = $_POST["ruta"];  
   $unidaAsignada = $_POST["unidaAsignada"]; 
   
   $link = Conectarse();  

    
   $reg = mysql_query("INSERT INTO conductor   
   (nombreCon, apellidoCon, cedulaCon, tipoLicencia, telefonoCon, modelo, placa, anno, ruta)    
    VALUES ('$nombreCon', '$apellidoCon', '$cedulaCon', '$tipoLicencia', '$telefonoCon', '$modelo', '$placa', '$anno', '$ruta')",$link); 
   if($reg) 
        //{die('ERROR AL guaardar EL REGISTRO'. mysql_error());}
        {header("Location:../notificaciones/1.php");}
  else 
        //{die('ERROR AL ELIMINAR EL REGISTRO'. mysql_error());}
      {header("Location:../notificaciones/00.php");} 
  }
  ?>  

