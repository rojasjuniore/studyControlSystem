<?php 
    include('cn/acceso_db.php'); // incluimos el archivo de conexión a la Base de Datos 
    if(isset($_POST['enviar'])) { // comprobamos que se han enviado los datos desde el formulario 
        // creamos una función que nos parmita validar el email 
        function valida_email($correo) { 
            if (preg_match('/^[A-Za-z0-9-_.+%]+@[A-Za-z0-9-.]+\.[A-Za-z]{2,4}$/', $correo)) return true; 
            else return false; 
        } 
        // Procedemos a comprobar que los campos del formulario no estén vacíos 
        $sin_espacios = count_chars($_POST['usuario_nombre'], 1); 
        if(!empty($sin_espacios[32])) { 
            // comprobamos que el campo usuario_nombre no tenga espacios en blanco 
            echo "El campo <em>usuario_nombre</em> no debe contener espacios en blanco. <a href='javascript:history.back();'>
                  Reintentar</a>"; 
        }elseif(empty($_POST['usuario_nombre'])) { // comprobamos que el campo usuario_nombre no esté vacío 
            echo "No haz ingresado tu usuario. <a href='javascript:history.back();'>Reintentar</a>"; 
        }elseif(empty($_POST['usuario_clave'])) { // comprobamos que el campo usuario_clave no esté vacío 
            echo "No haz ingresado contraseña. <a href='javascript:history.back();'>Reintentar</a>"; 
        }elseif($_POST['usuario_clave'] != $_POST['usuario_clave_conf']) { // comprobamos que las contraseñas ingresadas coincidan 
            echo "Las contraseñas ingresadas no coinciden. <a href='javascript:history.back();'>Reintentar</a>"; 
        }elseif(!valida_email($_POST['usuario_email'])) { // validamos que el email ingresado sea correcto 
            echo "El email ingresado no es válido. <a href='javascript:history.back();'>Reintentar</a>"; 
        }



        else { 
            // "limpiamos" los campos del formulario de posibles códigos maliciosos 
            $usuario_nombre = mysql_real_escape_string($_POST['usuario_nombre']); 
            $usuario_clave = mysql_real_escape_string($_POST['usuario_clave']); 
            $usuario_email = mysql_real_escape_string($_POST['usuario_email']); 
            // comprobamos que el usuario ingresado no haya sido registrado antes 
            $sql = mysql_query("SELECT usuario_nombre FROM usuarios WHERE usuario_nombre='".$usuario_nombre."'"); 
            if(mysql_num_rows($sql) > 0) { 
                echo "El nombre usuario elegido ya ha sido registrado anteriormente. <a href='javascript:history.back();'>Reintentar</a>"; 
            }else { 
                $usuario_clave = md5($usuario_clave); // encriptamos la contraseña ingresada con md5 
                // ingresamos los datos a la BD 
                $reg = mysql_query("INSERT INTO usuarios (nombre,apellido,usuario_nombre, usuario_clave, usuario_email, usuario_freg) 
                	
                	VALUES ('".$nombre."',
                			'".$apellido."', 
                			'".$usuario_nombre."', 
                			'".$usuario_clave."', 
                			'".$usuario_email."', NOW())"); 
                if($reg) { 
                    echo "Usuario ingresados correctamente.";
                      header("Location:notificaciones/6.php"); 
                }else { 
                    echo "ha ocurrido un error y no se registraron los datos."; 
                } 
            } 
        } 
    }else { 
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN">
<header>
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
	
	<TITLE>Registro de Usuarios</TITLE>
</header>
<body  class="animated fadeInDown letraFor letra">

<nav>
		
		<?php 
    	if(isset($_SESSION['usuario_nombre'])) { 
			?>
		<li class="col-md-3 inline-block mediano "><a href="principal.html">CardenalQuintero</a></li> 
       	<li > Bienvenido: <a href="perfil.php?id=<?=$_SESSION['usuario_id']?>">
       	<strong><?=$_SESSION['usuario_nombre']?></strong></a><br /></li>
        <a href="../index.php">Cerrar Sesión</a> 
	<?php 
    } 
	?>
	</ul>
	</nav>


<section>
		
		<div class="text-center">
		<h1 class="pacifico  grande colormenu titulo">Registro de Usuarios</h1>

<div class="col-md-3 inline-block quitar-float">
		
	<article>
			
		<form action="<?=$_SERVER['PHP_SELF']?>" method="post"> 
		     	
		     	<label for="nombre" class="espacio-arriba2">Nombre</label>
				<input      type="text" 
							class="form-control" 
							name="nombre"	
							required pattern="[a-z ]+" 
							placeholder=" Nombre" >

				<label for="apellido" class="espacio-arriba2">Apellido</label>
				<input 	    type="apellido" 
							class="form-control" 
							name="apellido"
							required pattern="[a-z ]+"
							placeholder=" Apellido 	">
		        
		        <label 	for="user" class="espacio-arriba2">Usuario</label>
	   			<input  type="text" 
	   					class="form-control" 
	   					name="usuario_nombre"
	   					required
	          			placeholder="Introduce tu Usuario" > 
		        
		        <label for="password" class="espacio-arriba2">Contraseña</label>
	   			<input 	type="password" 
	   					class="form-control" 
	   			 		name="usuario_clave"
	   					required
	   					placeholder="Contraseña" >
		        
		        <label for="password" class="espacio-arriba2">Repita Contraseña</label>
	   			<input 	type="password" 
	   					class="form-control" 
	   			 		name="usuario_clave_conf"
	   					required
	   					placeholder="Contraseña" >
		    
		        <label 	for="email" class="espacio-arriba2">Email</label>
	   			<input  type="email" 
	   					class="form-control" 
	   					name="usuario_email"
	   					required
	          			placeholder="Ej: ejemplo@dominio.com"/>  
		    
	<div class="espacio-arriba">
				<a href="principal.php"><button type="button" class="btn btn-info">Atras</button></a>
				<button type="reset" value="Borrar" class="btn btn-info" >Limpiar</button>
				<button type="submit" name="enviar" value="Registrar" class="btn btn-info" >Guardar</button>
	</div>
	   		 </form> 
	 
		</article>	
	</div>
</form>
</div>
		
</section>

</BODY>
</HTML>
<?php 
    } 
?>
