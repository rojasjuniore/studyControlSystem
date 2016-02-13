<?php 
    session_start(); 
    include('cn/acceso_db.php'); 
    if(empty($_SESSION['usuario_nombre'])) { // comprobamos que las variables de sesión estén vacías         
?> 
    <!DOCTYPE html>
    

    <html>
    <head>
        
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login: Colegio Cardenal J.H. Quintero</title>

    <link rel="stylesheet" href="lib/bootstrap.min.css">
    <link rel="stylesheet" href="lib/bootstrap-theme.min.css">
    <link rel="stylesheet" href="lib/styles.css">
    <link rel="stylesheet" type="text/css" href="css/animate.css">

    <title>Login</title>
   
    </head>
    

    <body class="animated fadeInDown letraFor letra">
        <div class="container">
            <div class="col-md-12">
                <div class="col-md-4"></div>
                   <div class="col-md-4" id="login">
    

        <form action="cn/comprobar.php" method="post"> 
            <div class="text-center">
                <img id="avatar" src="img/imgIndex/nadie.jpg" alt="avatar">
             </div>

            <input  type="text"     name="usuario_nombre" class="form-control"     placeholder="Usuario" required> 
            <input  type="password" name="usuario_clave"  class="form-control" placeholder="Contraseña"  required>
            <button type="submit" name="enviar" value="Ingresar" class="btn btn-lg btn-primary btn-block" >Iniciar sesión</button>
       
        </form>
                    </div>
                </div>
            </div>
   
    </body>

    <script src="lib/http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="lib/jquery.md5.min.js"></script>
    <script src="lib/bootstrap.min.js"></script>
    <script src="lib/script.js"></script>
</html>                     
<?php 
    }else { 
?> 
        <p>Hola <strong><?=$_SESSION['usuario_nombre']?></strong> | <a href="cn/logout.php">Salir</a></p> 
<?php 
    } 
?>