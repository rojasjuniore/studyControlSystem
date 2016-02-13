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

   $modelo = $_POST["modelo"];  
   $Anno = $_POST["anno"];
   $placa = $_POST["placa"]; 
   $ruta = $_POST["ruta"];
   
   
   $link = Conectarse();  
  
   
   $link = Conectarse();  

    
   $reg = mysql_query("INSERT INTO registrovehiculos(modelo, anno, placa, ruta)  VALUES ('$modelo', '$anno', '$placa', '$ruta')",$link); 
   if($reg) { 
                   header("Location:notificaciones/3.php"); 

                }else { 
                    header("Location:../notificaciones/00.php"); 
                }  }
     
   ?>  