



<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" type="text/css" href="Presentacion/css/log.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

	<title></title>


<style>
  

body{

background-image: url(Presentacion/Imagenes/FONDO.png);
background-repeat: no-repeat;
background-position: -110px 0px;
background-size: 1670px;



}




</style>

</head>
<body>

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="Presentacion/Imagenes/cnch.png" id="icon" alt="User Icon" />
      <h1>Inventario Innovación CNCH</h1>
    </div>

    <!-- Login Form -->
    <form method="post">
      <input type="text" id="Usuario" class="fadeIn second" name="Usuario" placeholder="Usuario">
      <input type="password"  id="Password" class="fadeIn third" name="Password" placeholder="Contraseña">
     
      <br>
      <input type="submit" name="btnLogin" class="fadeIn fourth" value="Entrar">
       
    </form>

 

  </div>
</div>

<?php 

if (isset($_REQUEST['btnLogin'])) {

include "Conexion/Conexion.php";
$conexion=mysqli_connect($db_host,$db_usuario,$db_pw,$db_nombre);

$USUARIO=$_POST['Usuario'];
$PASSWORD=$_POST['Password'];

$consulta ="SELECT * FROM login WHERE Usuario='$USUARIO' AND Password='$PASSWORD' ";


    $resultado=mysqli_query($conexion,$consulta);

    $filas= mysqli_num_rows($resultado);

    if($filas>0){

   header("location:Inventario.php");


    }  else{
         echo '<div class="alert alert-danger">';
    echo '<Strong>---------Usuario o contraseña incorrecta!</Strong> ...';
    echo '</div>';

     


    }
 
     mysqli_close($conexion);
   }


 ?>

</body>
</html>
</body>
</html>