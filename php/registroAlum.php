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

   $cedulaRep = $_POST["cedulaRep"];  
   $nombreRep = $_POST["nombreRep"];
   $apellidoRep = $_POST["apellidoRep"]; 
   $telefonoRep = $_POST["telefonoRep"];
   $nombreAlum = $_POST["nombreAlum"]; 
   $apellidoAlum = $_POST["apellidoAlum"]; 
   $cedulaDni = $_POST["cedulaDni"]; 
   $salonAsignado = $_POST["salonAsignado"]; ; 
   $direccion = substr($_POST["direccion"], 0, 500);   $direccion = $_POST["direccion"];  
   $unidaAsignada = $_POST["unidaAsignada"]; 
   
   $link = Conectarse();  

    
   $reg = mysql_query("INSERT INTO registroalumnos   
   (cedulaRep, nombreRep, apellidoRep, telefonoRep, nombreAlum, apellidoAlum, cedulaDni, salonAsignado, direccion, unidaAsignada)    
   VALUES ('$cedulaRep', '$nombreRep', '$apellidoRep', '$telefonoRep', '$nombreAlum', '$apellidoAlum', '$cedulaDni', '$salonAsignado', '$direccion', '$unidaAsignada')",  
   $link); 
   if($reg) { 
            
                header("Location:../notificaciones/1.php"); 
                }else { 
                    header("Location:../notificaciones/00.php");
                }  }
     
   ?>  